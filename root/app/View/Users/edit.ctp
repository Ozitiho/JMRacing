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
            <h1>Edit User</h1>
        </legend>
        <?php
        echo $this->Form->create('User');
        echo $this->Form->input('username');
        print("If you don't want to edit the password, simply leave it empty.");
        echo $this->Form->input('newPassword');
        echo $this->Form->input('role', array(
            'type' => 'select', 'options' => array('admin' => 'Admin', 'author' => 'Author')
        ));
        echo $this->Form->end('Edit User');
        ?>
    </fieldset>
</div>