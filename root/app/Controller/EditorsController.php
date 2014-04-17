<?php

class EditorsController extends AppController {
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add', 'login', 'edit', 'logout');
    }

    public function index() {
		$this->redirect(
        array('controller' => 'editors', 'action' => 'login'));   
	}
	
	public function add() {
        if ($this->request->is('post')) {
            $this->Editor->create();
            if ($this->Editor->save($this->request->data)) {
                $this->Session->setFlash(__('The editor has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('The editor could not be saved. Please, try again.')
            );
        }
    }

    public function edit($id = null) {
        $this->Editor->id = $id;
        if (!$this->Editor->exists()) {
            throw new NotFoundException(__('Invalid editor'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Editor->save($this->request->data)) {
                $this->Session->setFlash(__('The editor has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('The editor could not be saved. Please, try again.')
            );
        } else {
            $this->request->data = $this->Editor->read(null, $id);
            unset($this->request->data['Editor']['password']);
        }
    }

    public function delete($id = null) {
        $this->request->onlyAllow('post');

        $this->Editor->id = $id;
        if (!$this->Editor->exists()) {
            throw new NotFoundException(__('Invalid editor'));
        }
        if ($this->Editor->delete()) {
            $this->Session->setFlash(__('Editor deleted'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Editor was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }
	
	public function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				return $this->redirect($this->Auth->redirect());
			}
			$this->Session->setFlash(__('Invalid username or password, try again'));
		}
	}

	public function logout() {
		return $this->redirect($this->Auth->logout());
	}
}