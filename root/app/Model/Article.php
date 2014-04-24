<?php

class Article extends AppModel {

    public $validate = array(
        'Title' => array(
            'rule' => 'notEmpty'
        ),
        'Message' => array(
            'rule' => 'notEmpty'
        )
    );

}
