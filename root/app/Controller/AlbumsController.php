<?php

class AlbumsController extends AppController {

    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session');

    public function index() {
        $this->set('albums', $this->Album->find('all'));
    }

    public function cms() {
        $this->set('albums', $this->Album->find('all', array('order' => array('id DESC'))));
    }

    public function view($id = null) {
        if ($this->request->is('post')) {
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
                    mkdir('images/albums/' . $this->Album->getInsertID(), 0777, true);
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
        if (!$id) {
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

                // Check if the directory exists, if so, delete the images inside it
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

        if (file_exists('images/albums/' . $id)) {
            $files = scandir("images/albums/" . $id, 1);

            // If files[0] equals .. the folder does not contain any files
            if ($files[0] != "..") {
                $albumImage = "/images/albums/$id/$files[0]";
            }
        }

        return $albumImage;
    }

    public function getSpecificAlbumImages($id) {
        $albumImages = null;

        if (file_exists('images/albums/' . $id)) {
            $files = scandir("images/albums/" . $id, 1);

            // If files[0] equals .. the folder does not contain any files
            if ($files[0] != "..") {
                $albumImages = $files;

                /* Remove the . and .. elements that scandir adds to the array so only the 
                 * actual images remain in the array
                 */
                $albumImages = array_diff($albumImages, array('.', '..'));
            }
        }

        return $albumImages;
    }

    public function uploadImages($albumID) {
        $errorMessages = array();
        $valid_mime_types = array("image/png", "image/jpeg", "image/gif", "image/bmp");
        $max_file_size = 1024 * 10000; //100 kb
        $path = "images/albums/$albumID/"; // Upload directory
        $count = 0;

        if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
            // Check if any files are set
            if (isset($_FILES) && $_FILES) {
                // Loop $_FILES to execute all files
                foreach ($_FILES['files']['name'] as $f => $name) {
                    // This checks if the upload button hasn't been pressed without selecting a file
                    if ($_FILES['files']['name'][$f] != null) {
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
            unlink("images/albums/$albumID/$image");
        }
    }

}
