<?php
$this->start('bannerImage');
?>
<img src="/images/inner_banner2.jpg" alt="">
<?php
$this->end();
?>
<div class="box users form cms cmsResults">
    <fieldset>
        <?php echo $this->Session->flash(); ?>
        <?php
        if (isset($_GET["racer"]) && isset($_GET["event"])) {
            $racer = $this->requestAction('racers/getRacerById/' . $_GET["racer"]);
            $event = $this->requestAction('events/getEventById/' . $_GET["event"]);
        }

        // Only let results be added if racer and event are set
        if (isset($racer["Racer"]["Name"]) && isset($event["Event"]["City"])) {
            ?>
            <legend class="legend">
                <h1>Add <?php print($racer["Racer"]["Name"]); ?>'s <?php print($event["Event"]["City"]); ?> Results</h1>
            </legend>
            <?php
            echo $this->Form->create('Result');
            echo $this->Form->input('R1');
            echo $this->Form->input('R2');
            echo $this->Form->input('GP');
            echo $this->Form->input('event_id', array('type' => 'hidden', 'default' => $_GET["event"]));
            echo $this->Form->input('racer_id', array('type' => 'hidden', 'default' => $_GET["racer"]));
            echo $this->Form->end('Add Results');
        } else {
            ?>
            <legend class="legend">
                <h1>Results</h1>
            </legend>
            To set a user's results, please specify the racer and the event.
            <?php
        }
        ?>
    </fieldset>
</div>