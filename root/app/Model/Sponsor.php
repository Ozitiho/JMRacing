<?php

class Sponsor extends AppModel {

    public $validate = array(
        'Name' => array(
            'rule' => 'notEmpty'
        ),
        'Image' => array(
            'rule' => array('notEmpty')
        ),
        'URL' => array(
            'rule' => array('notEmpty')
        )
    );

}
