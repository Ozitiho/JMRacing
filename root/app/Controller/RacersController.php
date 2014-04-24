<?php

class RacersController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('getRacerResults');
    }

    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session');

    public function index() {
        $this->set('racers', $this->Racer->find('all'));
    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $racer = $this->Racer->findById($id);
        if (!$racer) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('racer', $racer);
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Racer->create();
            if ($this->Racer->save($this->request->data)) {
                $this->Session->setFlash(__('Your racer has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your racer.'));
        }
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $racer = $this->Racer->findById($id);
        if (!$racer) {
            throw new NotFoundException(__('Invalid post'));
        }

        if ($this->request->is(array('racer', 'put'))) {
            $this->Racer->id = $id;
            if ($this->Racer->save($this->request->data)) {
                $this->Session->setFlash(__('Your racer has been updated.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to update your post.'));
        }

        if (!$this->request->data) {
            $this->request->data = $racer;
        }
    }

    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Racer->delete($id)) {
            $this->Session->setFlash(
                    __('The racer with id: %s has been deleted.', h($id))
            );
            return $this->redirect(array('action' => 'index'));
        }
    }
    
    public function getRacerResults() {
        $results = $this->Racer->find('all', array(
            'contain' => array('Result')
        ));

        if (isset($this->params['requested']) && $this->params['requested'] == 1) {
            return $results;
        } else {
            $this->set('racerResults', $results);
        }
    }

}
