<?php

class Racer extends AppModel {

    public $actsAs = array('Containable');
    public $hasMany = 'Result';
    public $validate = array(
        'Name' => array(
            'required' => 'notEmpty'
        ),
        'Biography' => array(
            'rule' => 'notEmpty'
        ),
        'DateOfBirth' => array(
            'rule' => 'notEmpty'
        ),
        'PlaceOfBirth' => array(
            'rule' => 'notEmpty'
        ),
        'Nationality' => array(
            'rule' => 'notEmpty'
        ),
        'Residence' => array(
            'rule' => 'notEmpty'
        ),
        'Height' => array(
            'rule' => array('numeric', 'notEmpty'),
            'message' => 'Height can only contain digits.'
        ),
        'Weight' => array(
            'rule' => array('numeric', 'notEmpty'),
            'message' => 'Weight can only contain digits.'
        ),
        'Hardware' => array(
            'rule' => 'notEmpty'
        ),
        'RacerNumber' => array(
            'rule' => array('numeric', 'notEmpty'),
            'message' => 'Racer Number can only contain digits.'
        )
    );

}
