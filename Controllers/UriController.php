<?php 
namespace Inc\Controllers\UriController;

require_once $_SERVER['DOCUMENT_ROOT'] . 'vendor/autoload.php';

$LOCAL_DIRECTION = 'index';

use \Inc\Controllers\SettingsController;
/**
 * @package ExchangeOffice
 * @author  Tomislav Kukic
 *
 * This controller is used to handle pretty uris
 */
class UriController 
{
	private static $instance = null;
	private function __construct()
	{

	}

	public static function getInstance()
	{
		if(self::$instance == null) {
			self::$instance = new UriController();
		}

		return self::$instance;
	}

	private $requestUri = "";

	public function initialize() {
		$this->requestUri = str_replace( '/', '', $_SERVER['REQUEST_URI'] );

		$this->redirect();
	}

	protected function redirect() {
		switch ($this->requestUri) {
			case 'settings':
				$GLOBALS['LOCAL_DIRECTION'] = 'settings';
				break;
			
			default:
				$GLOBALS['LOCAL_DIRECTION'] = 'index';
				break;
		}

		include '../index.php';
	}
}

// Lets do some paths...
UriController::getInstance()->initialize();

?>