<?php

class Album extends AppModel {

    public $validate = array(
        'name' => array(
            'rule' => 'notEmpty'
        )
    );

}
