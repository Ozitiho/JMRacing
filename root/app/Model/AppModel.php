<?php

/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {

    // This method checks if input only contains letters
    public function lettersOnly($input) {
        foreach ($input as $in) {
            if (ctype_alpha(str_replace(' ', '', $in))) {
                return true;
            }

            return false;
        }
    }

    public function checkIfPhotoExists() {
        $arrayKey = current(array_keys($this->data));

        $this->Photo = ClassRegistry::init('Photo');
        $photo = $this->Photo->find('first', array(
            'conditions' => array(
                'Photo.id' => $this->data[$arrayKey]["photo_id"]
            )
        ));

        if ($photo) {
            return true;
        } else {
            return "This photo does not exist, please choose an existing ID.";
        }
    }

    public function getLastInsertedId() {
        $db = & ConnectionManager::getDataSource($this->useDbConfig);
        return $db->lastInsertId();
    }

}
