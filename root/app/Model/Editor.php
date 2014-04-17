<?php

App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class Editor extends AppModel {
    public $validate = array(
        'Username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A username is required'
            )
        ),
        'Password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A password is required'
            )
        )
    );
	
	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['Password'])) {
			$passwordHasher = new SimplePasswordHasher();
			$this->data[$this->alias]['Password'] = $passwordHasher->hash(
				$this->data[$this->alias]['Password']
			);
		}
		return true;
	}
}