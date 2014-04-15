<?php

class Product extends AppModel {
	public $validate = array(
        'Name' => array(
            'rule' => 'notEmpty'
        ),
        'Price' => array(
            'rule' => array('notEmpty', 'numeric')
        )
    );
}