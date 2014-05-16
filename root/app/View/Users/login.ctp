<?php
$this->start('bannerImage');
?>
<img src="/images/inner_banner2.jpg" alt="">
<?php
$this->end();
?>
<div class="box users form">
	<?php echo $this->Session->flash(); ?>
	<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend class="legend">
			<?php echo __('Please enter your username and password'); ?>
		</legend>
		<?php
			echo "<p>";
			echo $this->Form->input('username');
			echo "</p>";
			echo $this->Form->input('password');
		?>
	</fieldset>
<?php echo $this->Form->end(__('Login')); ?>
</div>