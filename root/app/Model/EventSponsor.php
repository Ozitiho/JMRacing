<?php

class EventSponsor extends AppModel {
    public $belongsTo = array(
        'Sponsor', 'Event'
    );
}