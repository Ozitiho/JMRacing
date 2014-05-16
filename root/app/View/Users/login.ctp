<?php
$this->start('bannerImage');
?>
<img src="/images/inner_banner2.jpg" alt="">
<?php
$this->end();
?>
<div class="box users form cms">
    <?php echo $this->Session->flash(); ?>
    <?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend class="legend">
            <h1><?php echo __('Please enter your username and password'); ?></h1>
        </legend>
        <?php
        echo $this->Form->input('username');
        echo $this->Form->input('password');
        ?>
        <?php echo $this->Form->end(__('Login')); ?>
    </fieldset>
</div>