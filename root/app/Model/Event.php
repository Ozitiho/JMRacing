<?php

class Event extends AppModel {

    public $actsAs = array('Containable');
    public $hasMany = array('Result');
    public $hasManyAndBelongsTo = 'Sponsor';
    public $validate = array(
        'photo_id' => array(
            'photoCheck' => array(
                'rule' => 'checkIfPhotoExists'
            )
        ),
        'Country' => array(
            'rule' => array('lettersOnly', 'notEmpty'),
            'message' => 'Only letters are allowed.'
        ),
        'City' => array(
            'rule' => array('lettersOnly', 'notEmpty'),
            'message' => 'Only letters are allowed.'
        )
    );

}
