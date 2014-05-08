<?php

	// Load iDEAL settings
	if(file_exists(dirname(__FILE__) . '/ideal.cfg.php'))
	{
		require_once(dirname(__FILE__) . '/ideal.cfg.php');
	}

	// Load iDEAL classes
	if(version_compare(PHP_VERSION, '5', '<'))
	{
		require_once(dirname(__FILE__) . '/ideal.cls.4.php');
	}
	else
	{
		require_once(dirname(__FILE__) . '/ideal.cls.5.php');
	}

?>