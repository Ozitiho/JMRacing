<?php

class Sponsor extends AppModel {

    public $validate = array(
        'Name' => array(
            'rule' => 'notEmpty'
        ),
        'Image' => array(
            'rule' => array('url', 'notEmpty'),
            'message' => 'This is no valid URL.'
        ),
        'URL' => array(
            'rule' => array('url', 'notEmpty'),
            'message' => 'This is no valid URL.'
        )
    );

}
