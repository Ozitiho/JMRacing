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
	The helper was not found.<br>
	<br>
	<?php
		if (Configure::read('debug') > 0):
			$pluginDot = empty($plugin) ? null : $plugin . '.';
			?>
			<h2><?php echo __d('cake_dev', 'Missing Helper'); ?></h2>
			<p class="error">
				<strong><?php echo __d('cake_dev', 'Error'); ?>: </strong>
				<?php echo __d('cake_dev', '%s could not be found.', '<em>' . h($pluginDot . $class) . '</em>'); ?>
			</p>
			<p class="error">
				<strong><?php echo __d('cake_dev', 'Error'); ?>: </strong>
				<?php echo __d('cake_dev', 'Create the class %s below in file: %s', '<em>' . h($class) . '</em>', (empty($plugin) ? APP_DIR . DS : CakePlugin::path($plugin)) . 'View' . DS . 'Helper' . DS . h($class) . '.php'); ?>
			</p>
			<pre>
			&lt;?php
			class <?php echo h($class); ?> extends AppHelper {

			}
			</pre>
			<p class="notice">
				<strong><?php echo __d('cake_dev', 'Notice'); ?>: </strong>
				<?php echo __d('cake_dev', 'If you want to customize this error message, create %s', APP_DIR . DS . 'View' . DS . 'Errors' . DS . 'missing_helper.ctp'); ?>
			</p>

			<?php echo $this->element('exception_stack_trace'); 
		endif;
	?>
</div>