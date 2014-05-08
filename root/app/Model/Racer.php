<?php

class Racer extends AppModel {

    public $actsAs = array('Containable');
    public $hasMany = 'Result';
    public $validate = array(
        'Name' => array(
            'rule' => array('lettersOnly', 'notEmpty'),
            'message' => 'Only letters are allowed.'
        ),
        'RacerNumber' => array(
            'rule' => array('numeric', 'notEmpty'),
            'message' => 'Racer number can only contain digits.'
        )
    );

}
