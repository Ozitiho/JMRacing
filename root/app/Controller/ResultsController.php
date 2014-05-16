<?php

class ResultsController extends AppController {

    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session');

    public function index() {
        $this->set('results', $this->Result->find('all'));
    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid result'));
        }

        $result = $this->Result->findById($id);
        if (!$result) {
            throw new NotFoundException(__('Invalid result'));
        }
        $this->set('result', $result);
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Result->create();
            if ($this->Result->save($this->request->data)) {
                $this->Session->setFlash(__('Your result has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your result.'));
        }
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid result'));
        }

        $result = $this->Result->findById($id);
        if (!$result) {
            throw new NotFoundException(__('Invalid result'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Result->id = $id;
            if ($this->Result->save($this->request->data)) {
                $this->Session->setFlash(__('Your result has been updated.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to update your result.'));
        }

        if (!$this->request->data) {
            $this->request->data = $result;
        }
    }

    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Result->delete($id)) {
            $this->Session->setFlash(
                    __('The result with id: %s has been deleted.', h($id))
            );
            return $this->redirect(array('action' => 'index'));
        }
    }

}
