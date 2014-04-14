<?php

class Racer extends AppModel {
    public $validate = array(
        'Name' => array(
            'rule' => 'notEmpty'
        ),
        'Biography' => array(
            'rule' => 'notEmpty'
        )
    );
}