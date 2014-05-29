<?php

class Sponsor extends AppModel {
	public $hasAndBelongsToMany = array(
        'Event' => array('with' => 'EventSponsor')
    );
    public $validate = array(
        'Name' => array(
            'rule' => 'notEmpty'
        ),
        'Image' => array(
            'rule' => array('notEmpty')
        ),
        'URL' => array(
            'rule' => array('url', 'notEmpty'),
            'message' => 'This is no valid URL.'
        )
    );

}
