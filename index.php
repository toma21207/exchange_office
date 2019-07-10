<!DOCTYPE html>
<html>
<head>
<?php  
	/**
	 * Lets do some basic initializations...
	 */
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';

	use Inc\Controllers\BaseController;
	use Inc\Controllers\DatabaseController;

	$baseController = new BaseController();
	$databaseController = DatabaseController::getInstance();

	// Add some custom css files
	$baseController->getStyles();
?>
</head>
<body>

<?php
	$baseController->getHeader();
	$baseController->getContent();
	$baseController->getFooter();
?>

</body>
<?php
	// Add some custom scripts
	$baseController->getScripts();
?>
</html>