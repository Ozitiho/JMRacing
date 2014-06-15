<?php

class Album extends AppModel {

    public $hasMany = 'Photo';
    public $validate = array(
        'name' => array(
            'rule' => 'notEmpty'
        )
    );

    public function canAddAlbums(){
        // Admins and photographer can add albums
        if (AuthComponent::user('role') == "admin" || AuthComponent::user('role') == "photographer") {
            return true;
        }
        
        return false;
    }

}
