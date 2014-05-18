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
            <h1>Edit Sponsor</h1>
        </legend>
        <?php
        echo $this->Form->create('Sponsor');
        echo $this->Form->input('Name');
        echo $this->Form->input('Image');
        echo $this->Form->input('URL', array('type' => 'url'));
        echo $this->Form->end('Edit Sponsor');
        ?>
    </fieldset>
</div>