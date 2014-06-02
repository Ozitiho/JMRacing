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
            <h1>Edit Event</h1>
        </legend>
        <?php
        echo $this->Form->create('Event');
        echo $this->Form->input('Country');
        echo $this->Form->input('City');
        echo $this->Form->input('Description', array('rows' => '5'));
        echo $this->Form->input('photo_id', array('label' => 'Photo ID (<a href="/albums/cms" target="_blank">browse through albums</a>)', 'type' => 'number'));
        echo $this->Form->input('Latitude');
        echo $this->Form->input('Longitude');
        echo $this->Form->input('Date');
        echo $this->Form->input('id', array('type' => 'hidden'));
        echo $this->Form->end('Edit Event');
        ?>
    </fieldset>
</div>