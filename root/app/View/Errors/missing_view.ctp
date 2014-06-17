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
	This page does not exist.<br>
	<br>
	<?php
		if (Configure::read('debug') > 0):
			<h2><?php echo __d('cake_dev', 'Missing View'); ?></h2>
			<p class="error">
				<strong><?php echo __d('cake_dev', 'Error'); ?>: </strong>
				<?php echo __d('cake_dev', 'The view for %1$s%2$s was not found.', '<em>' . h(Inflector::camelize($this->request->controller)) . 'Controller::</em>', '<em>' . h($this->request->action) . '()</em>'); ?>
			</p>
			<p class="error">
				<strong><?php echo __d('cake_dev', 'Error'); ?>: </strong>
				<?php echo __d('cake_dev', 'Confirm you have created the file: %s', h($file)); ?>
			</p>
			<p class="notice">
				<strong><?php echo __d('cake_dev', 'Notice'); ?>: </strong>
				<?php echo __d('cake_dev', 'If you want to customize this error message, create %s', APP_DIR . DS . 'View' . DS . 'Errors' . DS . 'missing_view.ctp'); ?>
			</p>

			<?php echo $this->element('exception_stack_trace'); 
		endif;
		else{
			?>
					
			<p>
				Now redirecting. Alternatively you can click on the logo at the top to return to home. 
			</p>
			<meta http-equiv="refresh" content="5;url=/" />
			<?php
		}
	?>
</div>