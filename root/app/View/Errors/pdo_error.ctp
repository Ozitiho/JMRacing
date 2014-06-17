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
	PDO error in the database.<br>
	<br>	
	<?php
	
		if (Configure::read('debug') > 0):
			?>
			<h2><?php echo __d('cake_dev', 'Database Error'); ?></h2>
			<p class="error">
				<strong><?php echo __d('cake_dev', 'Error'); ?>: </strong>
				<?php echo $name; ?>
			</p>
			<?php if (!empty($error->queryString)) : ?>
				<p class="notice">
					<strong><?php echo __d('cake_dev', 'SQL Query'); ?>: </strong>
					<?php echo h($error->queryString); ?>
				</p>
			<?php endif; ?>
			<?php if (!empty($error->params)) : ?>
					<strong><?php echo __d('cake_dev', 'SQL Query Params'); ?>: </strong>
					<?php echo Debugger::dump($error->params); ?>
			<?php endif; ?>
			<p class="notice">
				<strong><?php echo __d('cake_dev', 'Notice'); ?>: </strong>
				<?php echo __d('cake_dev', 'If you want to customize this error message, create %s', APP_DIR . DS . 'View' . DS . 'Errors' . DS . 'pdo_error.ctp'); ?>
			</p>
			<?php echo $this->element('exception_stack_trace'); 
		endif;
	?>
</div>