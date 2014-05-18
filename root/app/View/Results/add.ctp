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
        <legend class="legend">
            <h1>Add Results</h1>
        </legend>
        <?php
        echo $this->Form->create('Result');
        echo $this->Form->input('R1');
        echo $this->Form->input('R2');
        echo $this->Form->input('GP');
        echo $this->Form->input('event_id', array('type' => 'hidden', 'default' => $_GET["event"]));
        echo $this->Form->input('racer_id', array('type' => 'hidden', 'default' => $_GET["racer"]));
        echo $this->Form->end('Add Results');
        ?>
    </fieldset>
</div>