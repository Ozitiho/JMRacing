<?php

class Racer extends AppModel {

    public $actsAs = array('Containable');
    public $hasMany = 'Result';
    public $validate = array(
        'Name' => array(
            'rule' => array('lettersOnly', 'notEmpty'),
            'message' => 'Only letters are allowed.'
        ),
        'Biography' => array(
            'rule' => 'notEmpty'
        ),
        'DateOfBirth' => array(
            'rule' => 'notEmpty'
        ),
        'PlaceOfBirth' => array(
            'rule' => array('lettersOnly', 'notEmpty'),
            'message' => 'Only letters are allowed.'
        ),
        'Nationality' => array(
            'rule' => array('lettersOnly', 'notEmpty'),
            'message' => 'Only letters are allowed.'
        ),
        'Residence' => array(
            'rule' => array('lettersOnly', 'notEmpty'),
            'message' => 'Only letters are allowed.'
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
            'message' => 'Racer number can only contain digits.'
        ),
		'WorldCupStanding' => array(
            'rule' => array('numeric', 'notEmpty'),
            'message' => 'World cup standing can only contain digits.'
        )
    );

}
