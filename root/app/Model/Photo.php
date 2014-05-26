<?php

class Photo extends AppModel {

    public $actsAs = array('Containable');
    public $belongsTo = 'Album';

}
