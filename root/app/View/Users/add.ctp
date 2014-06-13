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
            <h1>Add User</h1>
        </legend>
        <?php
        echo $this->Form->create('User');
        echo $this->Form->input('username');
        echo $this->Form->input('password');
        echo $this->Form->input('role', array(
            'options' => array('admin' => 'Admin', 'author' => 'Author',
                'photographer' => 'Photographer')
        ));
        echo $this->Form->end('Add User');
        ?>
    </fieldset>
</div>