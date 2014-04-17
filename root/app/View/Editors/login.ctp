<h1>Login</h1>

<div class="editors form">
	<?php echo $this->Session->flash('auth'); ?>
	<?php echo $this->Form->create('Editor'); ?>
		<fieldset>
			<legend>
				<?php echo __('Please enter your username and password'); ?>
			</legend>
			<?php echo $this->Form->input('Username');
			echo $this->Form->input('Password');
		?>
		</fieldset>
	<?php echo $this->Form->end(__('Login')); ?>
</div>