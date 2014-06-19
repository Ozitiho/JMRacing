<?php
$this->start('map');

// Get events
$date = date("Y");
$events = $this->requestAction("events/getEventsByYear/$date");

if ($events) {
    ?>
    <!-- Losail Qatar id = 1 -->
    <div class='flag' style='left:66%;top:46%;'>
        <a onclick="showEventPopup('<?php print($events[0]['Event']['Country']); ?>', '<?php print($events[0]['Event']['City']); ?>', '<?php print($events[0]['Event']['Date']); ?>')"><img src='/images/flag.png' alt=''></a>
    </div>

    <!-- Si Racha Thailand id = 2 -->
    <div class='flag' style='left:82.2%;top:52%;'>
        <a onclick="showEventPopup('<?php print($events[1]['Event']['Country']); ?>', '<?php print($events[1]['Event']['City']); ?>', '<?php print($events[1]['Event']['Date']); ?>')"><img src='/images/flag.png' alt=''></a>
    </div>

    <!-- Beto Carrero Brazil id = 3 -->
    <div class='flag' style='left:33.2%;top:82.5%;'>
        <a onclick="showEventPopup('<?php print($events[2]['Event']['Country']); ?>', '<?php print($events[2]['Event']['City']); ?>', '<?php print($events[2]['Event']['Date']); ?>')"><img src='/images/flag.png' alt=''></a>
    </div>

    <!-- Arco Di Trento Trentino id = 4 -->
    <div class='flag' style='left:52%;top:31.5%;'>
        <a onclick="showEventPopup('<?php print($events[3]['Event']['Country']); ?>', '<?php print($events[3]['Event']['City']); ?>', '<?php print($events[3]['Event']['Date']); ?>')"><img src='/images/flag.png' alt=''></a>
    </div>

    <!-- Sevlievo Bulgaria id = 5 -->
    <div class='flag' style='left:56.7%;top:33%;'>
        <a onclick="showEventPopup('<?php print($events[4]['Event']['Country']); ?>', '<?php print($events[4]['Event']['City']); ?>', '<?php print($events[4]['Event']['Date']); ?>')"><img src='/images/flag.png' alt=''></a>
    </div>

    <!-- Valkenswaard Netherlands id = 6 -->
    <div class='flag' style='left:50.5%;top:28.5%;'>
        <a onclick="showEventPopup('<?php print($events[5]['Event']['Country']); ?>', '<?php print($events[5]['Event']['City']); ?>', '<?php print($events[5]['Event']['Date']); ?>')"><img src='/images/flag.png' alt=''></a>
    </div>

    <!-- Talavera de la Reina Spain id = 7 -->
    <div class='flag' style='left:47%;top:35.8%;'>
        <a onclick="showEventPopup('<?php print($events[6]['Event']['Country']); ?>', '<?php print($events[6]['Event']['City']); ?>', '<?php print($events[6]['Event']['Date']); ?>')"><img src='/images/flag.png' alt=''></a>
    </div>

    <!-- Matterly Basin, Winchester Great Britain id = 8 -->
    <div class='flag' style='left:48.3%;top:28%;'>
        <a onclick="showEventPopup('<?php print($events[7]['Event']['Country']); ?>', '<?php print($events[7]['Event']['City']); ?>', '<?php print($events[7]['Event']['Date']); ?>')"><img src='/images/flag.png' alt=''></a>
    </div>

    <!-- Saint Jean d'Angely France id = 9 -->
    <div class='flag' style='left:48.9%;top:32.3%;'>
        <a onclick="showEventPopup('<?php print($events[8]['Event']['Country']); ?>', '<?php print(addslashes($events[8]['Event']['City'])); ?>', '<?php print($events[8]['Event']['Date']); ?>')"><img src='/images/flag.png' alt=''></a>
    </div>

    <!-- Maggiora Italy id = 10 -->
    <div class='flag' style='left:51.3%;top:31.2%;'>
        <a onclick="showEventPopup('<?php print($events[9]['Event']['Country']); ?>', '<?php print($events[9]['Event']['City']); ?>', '<?php print($events[9]['Event']['Date']); ?>')"><img src='/images/flag.png' alt=''></a>
    </div>

    <!-- Teutschenthal Germany id = 11 -->
    <div class='flag' style='left:52.3%;top:28%;'>
        <a onclick="showEventPopup('<?php print($events[10]['Event']['Country']); ?>', '<?php print($events[10]['Event']['City']); ?>', '<?php print($events[10]['Event']['Date']); ?>')"><img src='/images/flag.png' alt=''></a>
    </div>

    <!-- Uddevalla Sweden id = 12 -->
    <div class='flag' style='left:53.1%;top:23%;'>
        <a onclick="showEventPopup('<?php print($events[11]['Event']['Country']); ?>', '<?php print($events[11]['Event']['City']); ?>', '<?php print($events[11]['Event']['Date']); ?>')"><img src='/images/flag.png' alt=''></a>
    </div>

    <!-- Hyvinkää Finland id = 13 -->
    <div class='flag' style='left:56.8%;top:20%;'>
        <a onclick="showEventPopup('<?php print($events[12]['Event']['Country']); ?>', '<?php print($events[12]['Event']['City']); ?>', '<?php print($events[12]['Event']['Date']); ?>')"><img src='/images/flag.png' alt=''></a>
    </div>

    <!-- Loket Czech Republic id = 14 -->
    <div class='flag' style='left:52.5%;top:29.3%;'>
        <a onclick="showEventPopup('<?php print($events[13]['Event']['Country']); ?>', '<?php print($events[13]['Event']['City']); ?>', '<?php print($events[13]['Event']['Date']); ?>')"><img src='/images/flag.png' alt=''></a>
    </div>

    <!-- TBA Belgium id = 15 -->
    <div class='flag' style='left:50%;top:29.5%;'>
        <a onclick="showEventPopup('<?php print($events[14]['Event']['Country']); ?>', '<?php print($events[14]['Event']['City']); ?>', '<?php print($events[14]['Event']['Date']); ?>')"><img src='/images/flag.png' alt=''></a>
    </div>

    <!-- Dimotrov, Donetssk Ukrain id = 16 -->
    <div class='flag' style='left:61%;top:29.8%;'>
        <a onclick="showEventPopup('<?php print($events[15]['Event']['Country']); ?>', '<?php print($events[15]['Event']['City']); ?>', '<?php print($events[15]['Event']['Date']); ?>')"><img src='/images/flag.png' alt=''></a>
    </div>

    <!-- Goiania, State of Goias id = 17 -->
    <div class='flag' style='left:33.3%;top:75.8%;'>
        <a onclick="showEventPopup('<?php print($events[16]['Event']['Country']); ?>', '<?php print($events[16]['Event']['City']); ?>', '<?php print($events[16]['Event']['Date']); ?>')"><img src='/images/flag.png' alt=''></a>
    </div>

    <!-- Leon Mexico id = 18 -->
    <div class='flag' style='left:18%;top:51.5%;'>
        <a onclick="showEventPopup('<?php print($events[17]['Event']['Country']); ?>', '<?php print($events[17]['Event']['City']); ?>', '<?php print($events[17]['Event']['Date']); ?>')"><img src='/images/flag.png' alt=''></a>
    </div>

    <div id="merchandisePopup" title="Click to close this information">

    </div>

    <?php
}
$this->end();
?>