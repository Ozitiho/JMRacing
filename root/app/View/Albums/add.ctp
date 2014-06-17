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
            <h1>Add Album</h1>
        </legend>
        <?php
        echo $this->Form->create('Album');
        echo $this->Form->input('name');
        echo $this->Form->input('user_id', array('type' => 'hidden', 'default'=>AuthComponent::user('id')));
        echo $this->Form->end('Add Album');
        ?>
    </fieldset>
</div>