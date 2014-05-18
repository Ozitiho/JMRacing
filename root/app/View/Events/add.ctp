<?php
$this->start('bannerImage');
?>
<img src="/images/inner_banner2.jpg" alt="">
<?php
$this->end();
?>
<div class="box users form cms">
    <fieldset>
        <?php echo $this->Session->flash(); ?>
        <legend class="legend">
            <h1>Add Event</h1>
        </legend>
        <?php
        echo $this->Form->create('Event');
        echo $this->Form->input('Country');
        echo $this->Form->input('City');
        echo $this->Form->input('Photo');
        echo $this->Form->input('Latitude');
        echo $this->Form->input('Longitude');
        echo $this->Form->input('Date');
        echo $this->Form->end('Add Event');
        ?>
    </fieldset>
</div>