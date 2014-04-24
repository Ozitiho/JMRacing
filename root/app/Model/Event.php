<?php

class Event extends AppModel {

    public $actsAs = array('Containable');
    public $hasMany = 'Result';
    public $validate = array(
        'Country' => array(
            'rule' => array('lettersOnly', 'notEmpty'),
            'message' => 'Only letters are allowed.'
        ),
        'City' => array(
            'rule' => array('lettersOnly', 'notEmpty'),
            'message' => 'Only letters are allowed.'
        ),
        'Photo' => array(
            'rule' => 'url',
            'message' => 'This is no valid URL.',
            'allowEmpty' => true
        )
    );

}
