<?php

class Result extends AppModel {

    public $actsAs = array('Containable');
    public $belongsTo = array(
        'Event' => array(
            'className' => 'Event',
        ),
        'Racer' => array(
            'className' => 'Racer',
        )
    );

}
