<!-- File: /app/View/Event/edit.ctp -->
<?php
$this->start('bannerImage');
?>
<img src="/images/inner_banner3.jpg" alt="">
<?php
$this->end();
?>
<div class="box users form cms">
    <fieldset>
        <?php echo $this->Session->flash(); ?>
        <legend class="legend">
            <h1>Edit Event</h1>
        </legend>
        <?php
        echo $this->Form->create('Event');
        echo $this->Form->input('Country');
        echo $this->Form->input('City');
        echo $this->Form->input('Photo');
        echo $this->Form->input('Latitude');
        echo $this->Form->input('Longitude');
        echo $this->Form->input('Date');
        echo $this->Form->input('id', array('type' => 'hidden'));
        echo $this->Form->end('Edit Event');
        ?>
    </fieldset>
</div>