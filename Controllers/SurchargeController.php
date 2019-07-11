<?php
/**
 * @package ExchangeOffice
 * @author  Tomislav Kukic
 *
 */
namespace Inc\Controllers;

use Inc\Controllers\DatabaseController;
use \Inc\Models\SurchargeModel;

/**
 * This controller is used to manage surcharges
 */
class SurchargeController
{
	private static $instance = null;
	public static function getInstance() 
	{
		if(self::$instance == null) {
			self::$instance = new SurchargeController();
		}

		return self::$instance;
	}
	// All surcharges from DB
	private $surcharges = array();

	private function __construct()
	{

	}

	/**
	 * Load all surcharges from DB
	 * @return Array Surcharges loaded from DB
	 */
	public function loadSurcharges() 
	{
		$dbController = DatabaseController::getInstance();
		$dbController->connect();
		$this->surcharges = $dbController->load( SurchargeModel::class );

		return $this->surcharges;
	}

	/**
	 * Find surcharge by given ID
	 * @param  int        $surchargeID   Surcharge ID
	 * @return class/null SurchargeModel Populated class with DB data
	 */
	public function getSurchargeByCurrencyID( $surchargeID ) {
		$result = null;

		foreach ($this->surcharges as $surcharge) {
			if($surcharge->data['currency_id'] == $surchargeID) {
				$result = $surcharge;
				break;
			}
		}

		return $result;
	}
}

?>