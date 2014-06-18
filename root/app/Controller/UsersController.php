<?php

class UsersController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login', 'logout');
    }

    public function cms() {
        $this->set('users', $this->User->find('all'));
    }

    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                if ($this->Auth->user('role') == 'admin' || $this->Auth->user('role') == 'author') {
                    $this->Auth->loginRedirect = array('controller' => 'pages', 'action' => 'admin');
                } elseif ($this->Auth->user('role') == 'photographer') {
                    $this->Auth->loginRedirect = array('controller' => 'albums', 'action' => 'cms');
                }
                return $this->redirect($this->Auth->loginRedirect);
            }
            $this->Session->setFlash(
                    'Invalid username or password, try again.', 'default', array('class' => 'flashError')
            );
        }
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('action' => 'cms'));
            }
            $this->Session->setFlash(
                    'Unable to add your user.', 'default', array('class' => 'flashError')
            );
        }
    }

    public function edit($id = null) {
        if ($id === null) {
            $id = $this->Auth->user('id');
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->Auth->user('role') !== 'admin' && $this->Auth->user('id') !== $id) {
            throw new UnauthorizedException(__('Not allowed to access this page'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('action' => 'cms'));
            }
            $this->Session->setFlash(
                    'Unable to update your user.', 'default', array('class' => 'flashError')
            );
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null) {
        $this->request->onlyAllow('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(
                    __('The user has been deleted.', h($id))
            );
            return $this->redirect(array('action' => 'cms'));
        }
    }

    public function getUserById($id) {
        $user = $this->User->findById($id);

        if (isset($this->params['requested']) && $this->params['requested'] == 1) {
            return $user;
        } else {
            $this->set('user', $user);
        }
    }

}
