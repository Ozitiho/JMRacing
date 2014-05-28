<?php

class Article extends AppModel {

    public $validate = array(
        'Title' => array(
            'rule' => 'notEmpty'
        ),
        'Message' => array(
            'rule' => 'notEmpty'
        ),
		'priority' => array(
			'rule' => array('between', 0, 5)
		)
    );

}
