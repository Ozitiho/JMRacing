<?php

class Article extends AppModel {

    public $hasMany = 'Tag';
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

    public function isOwnedBy($articleID, $userID) {
        return $this->field('id', array('id' => $articleID, 'user_id' => $userID)) !== false;
    }

}
