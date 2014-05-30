<?php

class Article extends AppModel {
    
    public $hasMany = 'Tag';

    public $validate = array(
        'Title' => array(
            'rule' => 'notEmpty'
        ),
        'Message' => array(
            'rule' => 'notEmpty'
        )
    );

}
