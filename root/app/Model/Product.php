<?php

class Product extends AppModel {

    public $validate = array(
        'Name' => array(
            'rule' => 'notEmpty'
        ),
        'Price' => array(
            'rule' => array('numeric', 'notEmpty'),
            'message' => 'Prices can only contain digits.'
        ),
        'DiscountPrice' => array(
            'rule' => 'numeric',
            'allowEmpty' => true,
            'message' => 'Prices can only contain digits.'
        ),
        'Image' => array(
            'rule' => array('url', 'notEmpty'),
            'message' => 'This is no valid URL.'
        ),
        'Size' => array(
            'valid' => array(
                'rule' => array('inList', array('s', 'm', 'l', 'xl')),
                'allowEmpty' => false
            )
        )
    );

}
