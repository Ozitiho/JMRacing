<?php

class Result extends AppModel {
	public $belongsTo = array(
        'Event' => array(
            'className' => 'Event',
        ),
		'Racer' => array(
            'className' => 'Racer',
        )
	);
}