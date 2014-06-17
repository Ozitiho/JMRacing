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
	A fatal error has occurred.<br>
	<br>
	<?php
	  if (Configure::read('debug') > 0):
		?>
		<h2><?php echo __d('cake_dev', 'Fatal Error'); ?></h2>
		<p class="error">
			<strong><?php echo __d('cake_dev', 'Error'); ?>: </strong>
			<?php echo h($error->getMessage()); ?>
			<br>

			<strong><?php echo __d('cake_dev', 'File'); ?>: </strong>
			<?php echo h($error->getFile()); ?>
			<br>

			<strong><?php echo __d('cake_dev', 'Line'); ?>: </strong>
			<?php echo h($error->getLine()); ?>
		</p>
		<p class="notice">
			<strong><?php echo __d('cake_dev', 'Notice'); ?>: </strong>
			<?php echo __d('cake_dev', 'If you want to customize this error message, create %s', APP_DIR . DS . 'View' . DS . 'Errors' . DS . 'fatal_error.ctp'); ?>
		</p>
		<?php
	  endif;
	?>
</div>