<!DOCTYPE html>
<html>
<head>
<?php  
	/**
	 * Lets do some basic initializations...
	 */
	require_once $_SERVER['DOCUMENT_ROOT'] . 'vendor/autoload.php';

	use Inc\Controllers\BaseController;
	use Inc\Controllers\DatabaseController;
	use Inc\Controllers\SettingsController;

	$baseController = new BaseController();
	$databaseController = DatabaseController::getInstance();
	$settingsController = SettingsController::getInstance();

	// Add some custom css files
	$baseController->getStyles();
?>
</head>
<body>

<?php
	$baseController->getHeader();

	if(key_exists('LOCAL_DIRECTION', $GLOBALS)) {
		switch ( $GLOBALS['LOCAL_DIRECTION'] ) {
			case 'settings':
				$settingsController->getContent();
				break;
			
			default:
				$baseController->getContent();
				break;
		}
	}else{
		$baseController->getContent();
	}
	$baseController->getFooter();

?>

</body>
<?php
	// Add some custom scripts
	$baseController->getScripts();
?>
</html>