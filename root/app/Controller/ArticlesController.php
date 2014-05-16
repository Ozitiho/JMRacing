<?php

class ArticlesController extends AppController {

    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('partial');
    }

    public function index() {
        $articles = $this->Article->find('all', array('order' => array('id' => 'desc')));

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

    public function partial() {
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
        $this->set('articles', $this->Article->find('all'));
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

    public function add() {
        if ($this->request->is('post')) {
            $this->Article->create();
            if ($this->Article->save($this->request->data)) {
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

        if ($this->request->is(array('article', 'put'))) {
            $this->Article->id = $id;
            if ($this->Article->save($this->request->data)) {
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

}
