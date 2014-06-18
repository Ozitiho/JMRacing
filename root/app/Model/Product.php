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
        'photo_id' => array(
            'photoCheck' => array(
                'rule' => 'checkIfPhotoExists'
            )
        )
    );

}
