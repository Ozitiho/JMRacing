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
			<h2><?php echo __d('cake_dev', 'Missing Method in %s', h($controller)); ?></h2> <p class="error">
			<strong><?php echo __d('cake_dev', 'Error'); ?>: </strong>
			<?php echo __d('cake_dev', 'The action %1$s is not defined in controller %2$s', '<em>' . h($action) . '</em>', '<em>' . h($controller) . '</em>'); ?>
			</p>
			<p class="error">
				<strong><?php echo __d('cake_dev', 'Error'); ?>: </strong>
				<?php echo __d('cake_dev', 'Create %1$s%2$s in file: %3$s.', '<em>' . h($controller) . '::</em>', '<em>' . h($action) . '()</em>', APP_DIR . DS . 'Controller' . DS . h($controller) . '.php'); ?>
			</p>
			<pre>
			&lt;?php
			class <?php echo h($controller); ?> extends AppController {

			<strong>
				public function <?php echo h($action); ?>() {

				}
			</strong>
			}
			</pre>
			<p class="notice">
				<strong><?php echo __d('cake_dev', 'Notice'); ?>: </strong>
				<?php echo __d('cake_dev', 'If you want to customize this error message, create %s', APP_DIR . DS . 'View' . DS . 'Errors' . DS . 'missing_action.ctp'); ?>
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