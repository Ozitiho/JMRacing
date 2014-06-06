<?php

class ProductsController extends AppController {
	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('getProducts', 'index');
    }
	
    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session');

    public function index() {
        $this->set('products', $this->Product->find('all'));
    }

    public function cms() {
        $this->set('products', $this->Product->find('all'));
    }

    public function getProducts() {
        return $this->Product->find('all');
    }

    public function add() {
        
        if ($this->request->is('post')) {
            $this->Product->create();
            if ($this->Product->save($this->request->data)) {
                $this->Session->setFlash(__('Your product has been saved.'));
                return $this->redirect(array('action' => 'cms'));
            }
            $this->Session->setFlash(
                    'Unable to add your product.', 'default', array('class' => 'flashError')
            );
        }
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid product'));
        }

        $product = $this->Product->findById($id);
        if (!$product) {
            throw new NotFoundException(__('Invalid product'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Product->id = $id;
            if ($this->Product->save($this->request->data)) {
                $this->Session->setFlash(__('Your product has been updated.'));
                return $this->redirect(array('action' => 'cms'));
            }
            $this->Session->setFlash(
                    'Unable to update your product.', 'default', array('class' => 'flashError')
            );
        }

        if (!$this->request->data) {
            $this->request->data = $product;
        }
    }

    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Product->delete($id)) {
            $this->Session->setFlash(
                    __('The product has been deleted.', h($id))
            );
            return $this->redirect(array('action' => 'cms'));
        }
    }
}
