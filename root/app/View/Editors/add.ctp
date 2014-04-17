<h1>Editor</h1>

<div class="editors form">
<?php echo $this->Form->create('Editor'); ?>
    <fieldset>
        <legend><?php echo __('Add Editor'); ?></legend>
        <?php echo $this->Form->input('Name');
        echo $this->Form->input('Password');
        echo $this->Form->input('Admin', array(
            'options' => array('1' => 'Admin', '0' => 'Author')
        ));
		?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>