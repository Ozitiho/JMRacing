<?php

class Product extends AppModel {

    public $validate = array(
        'Name' => array(
            'rule' => 'notEmpty'
        ),
        'Price' => array(
            'rule' => array('numeric', 'notEmpty'),
        ),
        'DiscountPrice' => array(
            'rule' => 'numeric'
        ),
        'Size' => array(
            'lettersOnly', 'notEmpty'
        ),
        'Image' => array(
            'rule' => array('url', 'notEmpty'),
            'message' => 'This is no valid URL.'
        )
    );

}
