<?php

class OrdersController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login', 'logout');
    }

    public function cms() {
        $this->set('orders', $this->Order->find('all'));
    }

    public function view($id = null) {
        $this->Order->id = $id;
        if (!$this->Order->exists()) {
            throw new NotFoundException(__('Invalid order'));
        }
        $this->set('order', $this->Order->read(null, $id));
    }
	
	//Checkout is basically just add
    public function checkout() {
        if ($this->request->is('post')) {
            $this->Order->create();
            if ($this->Order->save($this->request->data)) {
                $this->Session->setFlash(__('The order has been saved'));
                return $this->redirect(array('action' => 'cms'));
            }
            $this->Session->setFlash(
                    'Unable to add your order.', 'default', array('class' => 'flashError')
            );
        }
    }

    public function edit($id = null) {
        if ($id === null) {
            $id = $this->Auth->order('id');
        }
        $this->Order->id = $id;
        if (!$this->Order->exists()) {
            throw new NotFoundException(__('Invalid order'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Order->save($this->request->data)) {
                $this->Session->setFlash(__('The order has been saved'));
                return $this->redirect(array('action' => 'cms'));
            }
            $this->Session->setFlash(
                    'Unable to update your order.', 'default', array('class' => 'flashError')
            );
        } else {
            $this->request->data = $this->Order->read(null, $id);
            unset($this->request->data['Order']['password']);
        }
    }

    public function delete($id = null) {
        $this->request->onlyAllow('post');

        $this->Order->id = $id;
        if (!$this->Order->exists()) {
            throw new NotFoundException(__('Invalid order'));
        }
        if ($this->Order->delete()) {
            $this->Session->setFlash(
                    __('The order has been deleted.', h($id))
            );
            return $this->redirect(array('action' => 'cms'));
        }
    }
}
