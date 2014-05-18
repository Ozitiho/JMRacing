<?php

class SponsorsController extends AppController {

    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session');

    public function index() {
        if (isset($this->params['requested']) && $this->params['requested'] == 1) {
            return $this->Sponsor->find('all');
        } else {
            $this->set('sponsors', $this->Sponsor->find('all'));
        }
    }
    
    public function cms() {
        $this->set('sponsors', $this->Sponsor->find('all'));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Sponsor->create();
            if ($this->Sponsor->save($this->request->data)) {
                $this->Session->setFlash(__('Your sponsor has been saved.'));
                return $this->redirect(array('action' => 'cms'));
            }
            $this->Session->setFlash(
                    'Unable to add your sponsor.', 'default', array('class' => 'flashError')
            );
        }
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid sponsor'));
        }

        $sponsor = $this->Sponsor->findById($id);
        if (!$sponsor) {
            throw new NotFoundException(__('Invalid sponsor'));
        }

        if ($this->request->is(array('sponsor', 'put'))) {
            $this->Sponsor->id = $id;
            if ($this->Sponsor->save($this->request->data)) {
                $this->Session->setFlash(__('Your sponsor has been updated.'));
                return $this->redirect(array('action' => 'cms'));
            }
            $this->Session->setFlash(
                    'Unable to update your sponsor.', 'default', array('class' => 'flashError')
            );
        }

        if (!$this->request->data) {
            $this->request->data = $sponsor;
        }
    }

    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Sponsor->delete($id)) {
            $this->Session->setFlash(
                    __('The sponsor has been deleted.', h($id))
            );
            return $this->redirect(array('action' => 'cms'));
        }
    }

}
