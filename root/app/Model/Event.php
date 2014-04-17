<?php

class Event extends AppModel {
    public $actsAs = array('Containable');
	public $hasMany = 'Result';
	
	public $validate = array(
        'Country' => array(
			'rule'     => 'alphaNumeric',
			'required' => true,
			'message'  => 'Letters and digits only'
        ),
        'City' => array(
			'rule'     => 'alphaNumeric',
			'required' => true,
			'message'  => 'Letters and digits only'
        ),
        'Photo' => array(
			'rule'     => 'url',
			'required' => true,
			'message'  => 'This is no valid URL',
			'allowEmpty' => true
        )
    );
}