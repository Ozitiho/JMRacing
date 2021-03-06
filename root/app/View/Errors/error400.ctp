<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Errors
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<div class="box users form cms cmsIndex">
    <?php echo $this->Session->flash(); ?>
    <legend class="legend">
        <h1>Something went wrong!</h1>
		<h2><?php echo $name; ?></h2>
    </legend>
	<p class="error">
		<strong><?php echo __d('cake', 'Error'); ?>: </strong>
		<?php printf(
			__d('cake', 'The requested address %s could not be fetched.'),
			"<strong>'{$url}'</strong>"
		); ?>
	</p>
	<p>
		Now redirecting. Alternatively you can click on the logo at the top to return to home.
	</p>
</div>

<meta http-equiv="refresh" content="5;url=/" />
