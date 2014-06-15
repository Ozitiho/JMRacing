<?php

class AlbumsController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('getDetailsFromPhotoID');
    }

    public function isAuthorized($user = null) {
        // Check if user is a photographer
        if (isset($user['role'])) {

            if ($user['role'] == 'author') {
                // An editor can access the albums CMS page
                if (in_array($this->action, array('cms', 'returnAlbumImage',
                            'getSpecificAlbumImages', 'isOwnedBy'))) {
                    return true;
                }
            } else if ($user['role'] == 'photographer') {
                // An editor can access the albums CMS page
                if (in_array($this->action, array('cms', 'add', 'edit', 'returnAlbumImage',
                            'getSpecificAlbumImages', 'isOwnedBy', 'delete'))) {
                    return true;
                }
            }
        }

        return parent::isAuthorized($user);
    }

    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session');

    public function index() {
        $this->set('albums', $this->Album->find('all'));
    }

    public function cms() {
        $this->set('albums', $this->Album->find('all', array('order' => array('id DESC'))));

        // Whether or not the visitor has the right to add/delete albums
        $this->set('canAddAlbum', $this->Album->canAddAlbums());
    }

    public function view($id = null) {
        //Load the image resize class
        require_once(APP . 'Vendor' . DS . "imageResize/smart_resize_image.function.php");

        // Whether or not the visitor has the right to upload/delete pics in this album
        $this->set('hasRights', $this->isOwnedBy($id));

        if ($this->request->is('post')) {
            if (!$_POST) {
                // In this case the post_max_size has been overschreven
            }
            // If photos are uploaded
            if (isset($_POST["uploadPhotosButton"])) {
                // Upload the images and get potential error messages
                $errorMessages = $this->uploadImages($id);
            }

            // If photos are deleted
            if (isset($_POST["deleteImagesButton"]) && isset($_POST["deleteImage"])) {
                // Delete the selected images
                $this->deleteImages($id, $_POST["deleteImage"]);
            }
        }
        // Set ID for album
        if (!$id) {
            throw new NotFoundException(__('Invalid album'));
        }

        $album = $this->Album->findById($id);
        if (!$album) {
            throw new NotFoundException(__('Invalid album'));
        }
        $this->set('album', $album);

        // If error messages are set, make them available in the view
        if (isset($errorMessages)) {
            $this->set('errorMessages', $errorMessages);
        }
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Album->create();
            if ($this->Album->save($this->request->data)) {
                /* Create a folder for the album if the folder does not yet exist (which will 
                 * never be the case, unless albums get deleted from another place than the CMS 
                 * page
                 */
                if (!file_exists('images/albums/' . $this->Album->getInsertID())) {
                    // Create an albums dir and inside that create a thumbs dir
                    mkdir('images/albums/' . $this->Album->getInsertID() . "/thumbs", 0777, true);
                }

                $this->Session->setFlash(__('Your album has been saved.'));
                return $this->redirect(array('action' => 'cms'));
            }
            $this->Session->setFlash(
                    'Unable to add your album.', 'default', array('class' => 'flashError')
            );
        }
    }

    public function edit($id = null) {
        if (!$id || !$this->isOwnedBy($id)) {
            throw new NotFoundException(__('Invalid album'));
        }

        $album = $this->Album->findById($id);
        if (!$album) {
            throw new NotFoundException(__('Invalid album'));
        }

        if ($this->request->is(array('album', 'put'))) {
            $this->Album->id = $id;
            if ($this->Album->save($this->request->data)) {
                $this->Session->setFlash(__('Your album has been updated.'));
                return $this->redirect(array('action' => 'cms'));
            }
            $this->Session->setFlash(
                    'Unable to update your album.', 'default', array('class' => 'flashError')
            );
        }

        if (!$this->request->data) {
            $this->request->data = $album;
        }
    }

    public function delete() {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        // Delete the album and if the album contains images, delete them
        if (isset($_POST["deleteAlbumsButton"]) && isset($_POST["deleteAlbum"])) {
            foreach ($_POST["deleteAlbum"] as $album) {
                $this->Album->delete($album);

                // Remove the thumbs dir and the files inside it
                if (is_dir('images/albums/' . $album . '/thumbs')) {
                    // Get the list of files
                    $images = scandir("images/albums/" . $album . '/thumbs', 1);

                    // Remove the dots that get added
                    $images = array_diff($images, array('.', '..'));

                    // Delete the images
                    $this->deleteImages($album, $images);

                    // Now remove the directory
                    rmdir('images/albums/' . $album . '/thumbs');
                }

                // Remove the main dir and the files inside it
                if (is_dir('images/albums/' . $album)) {
                    // Get the list of files
                    $images = scandir("images/albums/" . $album, 1);

                    // Remove the dots that get added
                    $images = array_diff($images, array('.', '..'));

                    // Delete the images
                    $this->deleteImages($album, $images);

                    // Now remove the directory
                    rmdir('images/albums/' . $album);
                }
            }

            if (count($_POST["deleteAlbum"]) > 1) {
                $this->Session->setFlash(
                        __('The albums have been deleted.', h($id))
                );
            } else {
                $this->Session->setFlash(
                        __('The album has been deleted.', h($id))
                );
            }
        }

        return $this->redirect(array('action' => 'cms'));
    }

    /* This method checks if an album contains images, if so the last added will be returned, 
     * otherwise the default one will be returned
     */

    public function returnAlbumImage($id) {
        $albumImage = "/images/no-photo.jpg";

        // Get the last photo
        $albumImages = $this->Album->Photo->find('first', array(
            'conditions' => array('Photo.album_id' => $id),
            'order' => 'Photo.id DESC'
        ));

        if ($albumImages) {
            $albumImage = "/images/albums/$id/thumbs/" . $albumImages["Photo"]["name"];
        }

        return $albumImage;
    }

    public function getSpecificAlbumImages($id) {
        $albumImages = $this->Album->Photo->find('all', array(
            'conditions' => array('Photo.album_id' => $id)));

        return $albumImages;
    }

    public function getDetailsFromPhotoID($id) {
        $image = $this->Album->Photo->find('first', array(
            'conditions' => array('Photo.id' => $id)));

        return $image;
    }

    public function uploadImages($albumID) {
        $errorMessages = array();
        $valid_mime_types = array("image/png", "image/jpeg", "image/gif", "image/bmp");
        $max_file_size = 1024 * 5000; // An image cannot be bigger than 5mb
        $path = "images/albums/$albumID/"; // Upload directory
        $count = 0;

        if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
            // Check if any files are set
            if (isset($_FILES) && $_FILES) {
                // Loop $_FILES to execute all files
                foreach ($_FILES['files']['name'] as $f => $name) {
                    // This checks if the upload button hasn't been pressed without selecting a file
                    if ($_FILES['files']['name'] [$f] != null) {
                        // If an error message is found
                        if ($_FILES['files']['error'][$f] != 0) {
                            // Check if the uploaded file contains an error and if so, add it to the errorMessages array
                            switch ($_FILES['files']['error'][$f]) {
                                case UPLOAD_ERR_INI_SIZE:
                                    $message = $_FILES['files']['name'][$f] . " exceeds the upload_max_filesize directive in php.ini";
                                    break;
                                case UPLOAD_ERR_FORM_SIZE:
                                    $message = $_FILES['files']['name'][$f] . " exceeds the MAX_FILE_SIZE directive that was specified in the HTML form";
                                    break;
                                case UPLOAD_ERR_PARTIAL:
                                    $message = $_FILES['files']['name'][$f] . " was only partially uploaded";
                                    break;
                                case UPLOAD_ERR_NO_FILE:
                                    $message = $_FILES['files']['name'][$f] . " was not uploaded";
                                    break;
                                case UPLOAD_ERR_NO_TMP_DIR:
                                    $message = "Missing a temporary folder";
                                    break;
                                case UPLOAD_ERR_CANT_WRITE:
                                    $message = "Failed to write file to disk";
                                    break;
                                case UPLOAD_ERR_EXTENSION:
                                    $message = $_FILES['files']['name'][$f] . " upload stopped by extension";
                                    break;

                                default:
                                    $message = "Unknown upload error";
                                    break;
                            }

                            // Add the error message to the error messages array
                            array_push($errorMessages, $message);
                            continue;
                        }

                        // If no errors are found
                        else {
                            // Skip invalid file formats
                            if (!in_array($_FILES["files"]["type"][$f], $valid_mime_types)) {
                                $message = "$name is not a valid format";
                                array_push($errorMessages, $message);
                                continue;
                            } else { // No error found! Move uploaded files 
                                if (move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path . $name)) {
                                    // Path and name for the new resized file
                                    $resizedFile = "images/albums/$albumID/thumbs/$name";

                                    //call the function (when passing path to pic)
                                    smart_resize_image("images/albums/$albumID/$name", null, 750, 750, true, $resizedFile, false, false, 50);

                                    // Check if this photo already exists in this album
                                    $imageCheck = $this->Album->Photo->find('first', array(
                                        'conditions' => array('Photo.album_id' => $albumID,
                                            'Photo.name' => $name)));

                                    // Only add the photo if it doesn't already exist in the DB
                                    if (!$imageCheck) {
                                        // Insert the photo(s) into the database
                                        $userID = AuthComponent::user('id');

                                        $data = $this->Album->Photo->saveAll(array(
                                            'name' => $name,
                                            'album_id' => $albumID,
                                            'user_id' => $userID,
                                        ));
                                    }
                                    // succes
                                }
                            }
                        }
                    }
                }
            }
        }



        return $errorMessages;
    }

    public function deleteImages($albumID, $imagesToBeDeleted) {
        foreach ($imagesToBeDeleted as $image) {
            // Delete the big pictures
            unlink("images/albums/$albumID/$image");

            // Delete the thumbs
            unlink("images/albums/$albumID/thumbs/$image");

            // Delete the image from the DB
            $this->Album->Photo->deleteAll(array('Photo.name' => $image));
        }
    }

    public function isOwnedBy($albumID) {
        // Admins can always edit/delete albums and images
        if (AuthComponent::user('role') == "admin") {
            return true;
        }

        // Photographers only their own albums
        return $this->Album->field('id', array('id' => $albumID,
                    'user_id' => AuthComponent::user('id'))) !== false;
    }

}
