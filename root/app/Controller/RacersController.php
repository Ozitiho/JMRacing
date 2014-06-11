<?php

class RacersController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('getRacerResults');
    }

    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session');

    public function cms() {
        $this->set('racers', $this->Racer->find('all'));
    }

    public function view($id = null) {
        // Set ID for racer
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $racer = $this->Racer->findById($id);
        if (!$racer) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('racer', $racer);

        // Set results
        $results = $this->getRacerResults();

        if (isset($this->params['requested']) && $this->params['requested'] == 1) {
            return $results;
        } else {
            $this->set('results', $results);
        }
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Racer->create();
            if ($this->Racer->save($this->request->data)) {
                $this->Session->setFlash(__('Your racer has been saved.'));
                return $this->redirect(array('action' => 'cms'));
            }
            $this->Session->setFlash(
                    'Unable to add your racer.', 'default', array('class' => 'flashError')
            );
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
                return $this->redirect(array('action' => 'cms'));
            }
            $this->Session->setFlash(
                    'Unable to update your racer.', 'default', array('class' => 'flashError')
            );
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
                    __('The racer has been deleted.', h($id))
            );
            return $this->redirect(array('action' => 'cms'));
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

    public function getRacerById($id) {
        $racer = $this->Racer->findById($id);

        if (isset($this->params['requested']) && $this->params['requested'] == 1) {
            return $racer;
        } else {
            $this->set('racer', $racer);
        }
    }

}
