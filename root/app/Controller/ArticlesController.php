<?php

class ArticlesController extends AppController {

    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index', 'view', 'getShortenedArticles');
    }

    public function isAuthorized($user = null) {
        // Check if user is an editor
        if (isset($user['role']) && $user['role'] === 'author') {

            // An editor can edit and delete his own articles
            if (in_array($this->action, array('edit', 'delete', 'editTags', 'getTagsForArticle'))) {
                $articleID = (int) $this->request->params['pass'][0];
                if ($this->Article->isOwnedBy($articleID, $user['id'])) {
                    return true;
                }
            }

            // An editor can access the articles CMS and add page
            if (in_array($this->action, array('cms', 'add'))) {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }

    public function index() {
        if ($this->request->is('post') && $_POST["searchQuery"] != "") {
            $articles = $this->Article->Tag->find('all', array('conditions' => array('Tag.value' => $_POST["searchQuery"])
            ));
        } else {
            $articles = $this->Article->find('all', array('order' => array('id' => 'desc')));
        }

        foreach ($articles as $key => $article) {
            // Shorten body
            $string = $article['Article']['Message'];
            if ($key == 0) {
                if (strlen($string) > 696) {
                    $string = substr($string, 0, 693);
                    $string .= '...';
                    $articles[$key]['Article']['Message'] = $string;
                }
            } else {
                if (strlen($string) > 116) {
                    $string = substr($string, 0, 113);
                    $string .= '...';
                    $articles[$key]['Article']['Message'] = $string;
                }
            }
        }

        $this->set('articles', $articles);
    }

    public function getShortenedArticles() {
        $articles = $this->Article->find('all', array('order' => array('id' => 'desc')));

        foreach ($articles as $key => $article) {
            // Shorten body
            $string = $article['Article']['Message'];
            if (strlen($string) > 116) {
                $string = substr($string, 0, 113);
                $string .= '...';
                $articles[$key]['Article']['Message'] = $string;
            }
        }
        return $articles;
    }

    public function cms() {
        if ($this->Auth->user('role') == "admin") {
            $this->set('articles', $this->Article->find('all', array('order' => array('id DESC'))));
        } elseif ($this->Auth->user('role') == "author") {
            $this->set('articles', $this->Article->find('all', array('order' => array('id DESC'),
                        'conditions' => array('Article.user_id' => $this->Auth->user('id')))));
        }
    }

    public function view($id = null) {
        // Get article
        if (!$id) {
            throw new NotFoundException(__('Invalid article'));
        }

        $article = $this->Article->findById($id);
        if (!$article) {
            throw new NotFoundException(__('Invalid article'));
        }
        $this->set('article', $article);

        // Get other articles
        $articles = $this->Article->find('all', array('order' => array('id' => 'desc')));

        foreach ($articles as $key => $article) {
            // Shorten body
            $string = $article['Article']['Message'];
            if (strlen($string) > 116) {
                $string = substr($string, 0, 113);
                $string .= '...';
                $articles[$key]['Article']['Message'] = $string;
            }
        }

        $this->set('articles', $articles);
    }

    public function add($photoID = null) {
        $this->set('photoID', $photoID);
        if ($this->request->is('post')) {
            $this->Article->create();
            if ($this->Article->save($this->request->data)) {
                // Add tags
                $tags = explode(", ", $this->request->data["Article"]["Tags"]);
                $this->addTags($tags);
                $this->Session->setFlash(__('Your article has been saved.'));
                return $this->redirect(array('action' => 'cms'));
            }
            $this->Session->setFlash(
                    'Unable to add your article.', 'default', array('class' => 'flashError')
            );
        }
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid article'));
        }

        $article = $this->Article->findById($id);
        if (!$article) {
            throw new NotFoundException(__('Invalid article'));
        }

        $this->set('article', $article);

        if ($this->request->is(array('article', 'put'))) {
            $this->Article->id = $id;
            if ($this->Article->save($this->request->data)) {
                // Edit tags
                $tags = explode(", ", $this->request->data["Article"]["Tags"]);
                $this->editTags($tags);
                $this->Session->setFlash(__('Your article has been updated.'));
                return $this->redirect(array('action' => 'cms'));
            }
            $this->Session->setFlash(
                    'Unable to update your article.', 'default', array('class' => 'flashError')
            );
        }

        if (!$this->request->data) {
            $this->request->data = $article;
        }
    }

    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Article->delete($id)) {
            $this->Session->setFlash(
                    __('The article has been deleted.', h($id))
            );
            return $this->redirect(array('action' => 'cms'));
        }
    }

    public function editTags($tags) {
        $oldTags = $this->Article->Tag->find('all', array(
            'conditions' => array('article_id' => $this->Article->id)));

        /* Loop through the old and new tags and see which old tags still exist and
         * which new tags should be added
         */
        $oldTagsThatStillExist = array();
        $newTagsToBeAdded = array();

        foreach ($tags as $tag) {
            $alreadyExists = false;

            foreach ($oldTags as $oldTag) {
                if ($oldTag["Tag"]["value"] == $tag) {
                    $alreadyExists = true;
                    array_push($oldTagsThatStillExist, $tag);
                }
            }

            if (!$alreadyExists) {
                array_push($newTagsToBeAdded, $tag);
            }
        }

        /* Now loop through the old tags and the old tags that still exists and 
         * remove old tags that no longer exist
         */
        $tagsToBeDeleted = array();

        foreach ($oldTags as $oldTag) {
            $tagShouldRemain = false;

            foreach ($oldTagsThatStillExist as $oldTagThatStillExists) {
                if ($oldTag["Tag"]["value"] == $oldTagThatStillExists) {
                    $tagShouldRemain = true;
                }
            }

            if (!$tagShouldRemain) {
                array_push($tagsToBeDeleted, $oldTag);
            }
        }

        // Delete the tags that no longer exist
        foreach ($tagsToBeDeleted as $tag) {
            $this->Article->Tag->delete($tag["Tag"]["id"]);
        }

        $this->addTags($newTagsToBeAdded);
    }

    public function addTags($tags) {
        // Insert the newly added tags
        foreach ($tags as $tag) {
            // Add to the tag table
            $this->Article->Tag->create();
            $data = array('article_id' => $this->Article->id, 'value' => $tag);
            $this->Article->Tag->save($data);
        }
    }

    public function getTagsForArticle($articleID) {
        $tags = $this->Article->Tag->find('all', array(
            'conditions' => array('article_id' => $articleID)));

        $tagsString = "";

        // Make a string with comma's seperating them
        foreach ($tags as $tag) {
            $tagsString .= $tag["Tag"]["value"] . ", ";
        }

        // Remove the last ", "
        $tagsString = rtrim($tagsString, ", ");

        return $tagsString;
    }

}
