<?php

class Album extends AppModel {
    
    public $hasMany = 'Photo';

    public $validate = array(
        'name' => array(
            'rule' => 'notEmpty'
        )
    );

}
