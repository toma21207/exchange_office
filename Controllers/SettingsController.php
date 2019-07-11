<?php
/**
 * @package ExchangeOffice
 * @author  Tomislav Kukic
 *
 */
namespace Inc\Controllers;

use Inc\Controllers\DatabaseController;
use \Inc\Models\SettingsModel;

/**
 * This controller is used to manage app configurations
 */
class SettingsController
{
	private static $instance = null;
	public static function getInstance() 
	{
		if(self::$instance == null) {
			self::$instance = new SettingsController();
		}

		return self::$instance;
	}
	// All currencies from DB
	private $curencies = array();
	private $baseCurrencyID = null;

	private function __construct()
	{
		//Singleton creation...
	}

	public function getContent() {
		require( $_SERVER['DOCUMENT_ROOT'] . '/Views/SettingsContent.php' );
	}
}

?>