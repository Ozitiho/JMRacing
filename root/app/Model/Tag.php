<?php

class Tag extends AppModel {
    
    public $actsAs = array('Containable');
    public $belongsTo = 'Article';

    public $validate = array(
        'value' => array(
            'rule' => 'notEmpty'
        )
    );

}
