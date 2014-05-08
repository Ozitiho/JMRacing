<?php

	define('IDEAL_AQUIRER', 'Simulator'); // Use Rabobank, ABN Amro, ING Bank or Simulator
	define('IDEAL_CACHE_PATH', dirname(__FILE__) . '/cache/'); // Use FALSE for NOCACHE, make sure PATH & inner files are readable/writable
	define('IDEAL_MERCHANT_ID', '123456789'); // Your iDEAL Merchant ID
	define('IDEAL_PRIVATE_CERTIFICATE_FILE', 'private.cer'); // Name of your private certificate file (should be located in IDEAL_SECURE_PATH)
	define('IDEAL_PRIVATE_KEY', 'Password'); // Password used to generate private key file
	define('IDEAL_PRIVATE_KEY_FILE', 'private.key'); // Name of your private certificate file (should be located in IDEAL_SECURE_PATH)
	define('IDEAL_RETURN_URL', ''); // Return URL after transaction
	define('IDEAL_SECURE_PATH', dirname(__FILE__) . '/ssl/'); // Path to your private key & certificates
	define('IDEAL_SUB_ID', '0'); // Your iDEAL Sub ID
	define('IDEAL_TEST_MODE', true); // Use TEST/LIVE mode

?>