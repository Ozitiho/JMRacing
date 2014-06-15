<?php

// app/Model/User.php
App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {

    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A username is required'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A password is required'
            )
        ),
        'oldPassword' => array(
            'rule' => array('checkIfPasswordMatchesOldPassword'),
            'message' => 'Your old password is not correct.',
            'allowEmpty' => true
        ),
        'newPassword' => array(
            'required' => array(
                'rule' => array('checkIfNewPasswordsMatch'),
                'message' => 'Your new passwords should be the same and can not be empty.',
                'allowEmpty' => true
            )
        ),
        'newPassword2' => array(
            'required' => array(
                'rule' => array('checkIfNewPasswordsMatch'),
                'message' => '',
                'allowEmpty' => true
            )
        ),
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array('admin', 'author')),
                'message' => 'Please enter a valid role',
                'allowEmpty' => false
            )
        )
    );

    // This method checks if the two new passwords match
    public function checkIfNewPasswordsMatch() {
        // If the two passwords match, save the new password
        if ($this->data[$this->alias]['newPassword'] ==
                $this->data[$this->alias]['newPassword2']) {
            return true;
        }

        return false;
    }

    // This method checks if the entered old password matches the DB password
    public function checkIfPasswordMatchesOldPassword() {
        $passwordHasher = new SimplePasswordHasher();

        // Get the DB password
        $user = $this->requestAction('users/getUserById/' . $this->data[$this->alias]['id']);
        $dbPassword = $user["User"]["password"];
//        print($dbPassword . "<br/>");
//        print($this->data[$this->alias]['oldPassword'] . "<br/>");

        // Get the old password that has been entered
        $oldPassword = $passwordHasher->hash($this->data[$this->alias]['oldPassword']);
//        
//        print($oldPassword);
//        die;

        // Check if they match
        if ($dbPassword == $oldPassword) {
            $this->validator()->getField('newPassword')->getRule('required')->allowEmpty = false;
            $this->validator()->getField('newPassword2')->getRule('required')->allowEmpty = false;
            return true;
        }

        return false;
    }

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['newPassword'])) {
            print($this->data[$this->alias]['newPassword']);
            $this->data[$this->alias]['password'] = $this->data[$this->alias]['newPassword'];
        }

        if (isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new SimplePasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                    $this->data[$this->alias]['password']
            );
        }

        return true;
    }

}
