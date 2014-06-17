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
            <h1>Edit Album</h1>
        </legend>
        <?php
        echo $this->Form->create('Album');
        echo $this->Form->input('name');
        echo $this->Form->input('id', array('type' => 'hidden'));
        echo $this->Form->end('Edit Album');
        ?>
    </fieldset>
</div>