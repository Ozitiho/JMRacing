<?php

class Event extends AppModel {

    public $actsAs = array('Containable');
    public $hasMany = array('Result');
    public $hasManyAndBelongsTo = 'Sponsor';
    public $validate = array(
        'photo_id' => array(
            'photoCheck' => array(
                'rule' => 'checkIfPhotoExists',
                'message' => 'This photo does not exist, please choose an existing ID.'
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

    public function checkIfPhotoExists() {
        $this->Photo = ClassRegistry::init('Photo');
        $photo = $this->Photo->find('first', array(
            'conditions' => array(
                'Photo.id' => $this->data["Event"]["photo_id"]
            )
        ));
        
        if($photo){
            return true;
        }
    }

}
