<?php

class ArticlesController extends AppController {
    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session');

    public function index() {
		$articles = $this->Article->find('all');
	
		foreach($articles as $key => $article){
			$string = $article['Article']['Message'];
			if (strlen($string) > 100){
				$string = substr($string, 0, 90);
				$string .= '...';
				$articles[$key]['Article']['Message'] = $string;
			}
		}
        $this->set('articles', $articles);
    }
	
	public function cms() {
        $this->set('articles', $this->Article->find('all'));
    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid article'));
        }

        $article = $this->Article->findById($id);
        if (!$article) {
            throw new NotFoundException(__('Invalid article'));
        }
        $this->set('article', $article);
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Article->create();
            if ($this->Article->save($this->request->data)) {
                $this->Session->setFlash(__('Your article has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your article.'));
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
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash(__('Unable to update your article.'));
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
				__('The article with id: %s has been deleted.', h($id))
			);
			return $this->redirect(array('action' => 'index'));
		}
	}
	
	private function markupArticle($pic, $head, $body) {
		$html = '<div class="box">
				<img src="' + $pic + '" alt="">
				<span class="heading">NEWS</span>
				<div class="description">
					<h2>' + $head + '</h2>
					<p>' + $body + '</p>
					<div class="share">
						<ul>
							<li>SHARE &nbsp;&nbsp;</li>
							<li class="fb"><a href="#">&nbsp;</a></li>
							<li class="twitter"><a href="#">&nbsp;</a></li>
							<li class="google"><a href="#">&nbsp;</a></li>
						</ul>
						<a href="#" class="button">READ FULL ARTICLE</a>
					</div>
				</div>
			</div>';
		return $html;
	}
}