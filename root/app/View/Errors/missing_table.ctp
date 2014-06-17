<?php
$this->start('bannerImage');
?>
<img src="/images/inner_banner2.jpg" alt="">
<?php
$this->end();
?>

<div class="box users form cms cmsIndex">
    <?php echo $this->Session->flash(); ?>
    <legend class="legend">
        <h1>Something went wrong!</h1>
    </legend>
	Database table not found.<br>
	<br>
	<?php
		if (Configure::read('debug') > 0):
			<h2><?php echo __d('cake_dev', 'Missing Database Table'); ?></h2>
			<p class="error">
				<strong><?php echo __d('cake_dev', 'Error'); ?>: </strong>
				<?php echo __d('cake_dev', 'Table %1$s for model %2$s was not found in datasource %3$s.', '<em>' . h($table) . '</em>',  '<em>' . h($class) . '</em>', '<em>' . h($ds) . '</em>'); ?>
			</p>
			<p class="notice">
				<strong><?php echo __d('cake_dev', 'Notice'); ?>: </strong>
				<?php echo __d('cake_dev', 'If you want to customize this error message, create %s', APP_DIR . DS . 'View' . DS . 'Errors' . DS . 'missing_table.ctp'); ?>
			</p>

			<?php echo $this->element('exception_stack_trace'); 
		endif;
	?>
</div>