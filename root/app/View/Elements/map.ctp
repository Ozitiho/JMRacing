<?php
$this->start('map');

//Load the picture loading library
require_once(APP . 'Vendor' . DS . "functions/imageload.php");

// Get events
$date = date("Y");
$events = $this->requestAction("events/getEventsByYear/$date");

if ($events) {
    $count = 1;
    foreach ($events as $event) {
        $style = null;
        switch ($count) {
            // Losail Qatar
            case 1:
                $style = "left:66%;top:46%;";
                break;

            // Si Racha Thailand
            case 2:
                $style = "left:82.2%;top:52%;";
                break;

            // Beto Carrero Brazil
            case 3:
                $style = "left:33.2%;top:82.5%;";
                break;

            // Arco Di Trento Trentino
            case 4:
                $style = "left:52%;top:31.5%;";
                break;

            // Sevlievo Bulgaria
            case 5:
                $style = "left:56.7%;top:33%;";
                break;

            // Valkenswaard Netherlands
            case 6:
                $style = "left:50.5%;top:28.5%;";
                break;

            // Talavera de la Reina Spain
            case 7:
                $style = "left:47%;top:35.8%;";
                break;

            // Matterly Basin, Winchester Great Britain
            case 8:
                $style = "left:48.3%;top:28%;";
                break;

            // Saint Jean d'Angely France
            case 9:
                $style = "left:48.9%;top:32.3%;";
                break;

            // Maggiora Italy
            case 10:
                $style = "left:51.3%;top:31.2%;";
                break;

            // Teutschenthal Germany
            case 11:
                $style = "left:52.3%;top:28%;";
                break;

            // Uddevalla Sweden
            case 12:
                $style = "left:53.1%;top:23%;";
                break;

            // Hyvinkää Finland
            case 13:
                $style = "left:56.8%;top:20%;";
                break;

            // Loket Czech Republic
            case 14:
                $style = "left:52.5%;top:29.3%;";
                break;

            // TBA Belgium
            case 15:
                $style = "left:50%;top:29.5%;";
                break;

            // Dimotrov, Donetssk Ukrain
            case 16:
                $style = "left:61%;top:29.8%;";
                break;

            // Goiania, State of Goias
            case 17:
                $style = "left:33.3%;top:75.8%;";
                break;

            // Leon Mexico
            case 18:
                $style = "left:18%;top:51.5%;";
                break;
        }
        ?>
        <div class='flag' style='<?php print($style); ?>'>
            <?php
            $photoDetails = $this->requestAction("albums/getDetailsFromPhotoID/" . $event["Event"]["photo_id"]);
            $eventImage = loadImage($event["Event"]["photo_id"], $this);
            ?>
            <a onclick="showEventPopup('<?php print($eventImage["thumb"]); ?>', '<?php print($event['Event']['Country']); ?>', '<?php print(addslashes($event['Event']['City'])); ?>', '<?php print($event['Event']['Date']); ?>')"><img src='/images/flag.png' alt=''></a>
        </div>
        <?php
        $count++;
        ?>

        <div id="merchandisePopup" title="Click to close this information">

        </div>

        <?php
    }
}
$this->end();
?>