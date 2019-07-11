<?php
/**
 * @package ExchangeOffice
 * @author  Tomislav Kukic
 *
 */
namespace Inc\Controllers;

use Inc\Controllers\DatabaseController;
use \Inc\Models\DiscountModel;

/**
 * This controller is used to manage discounts
 */
class DiscountController
{
	private static $instance = null;
	public static function getInstance() 
	{
		if(self::$instance == null) {
			self::$instance = new DiscountController();
		}

		return self::$instance;
	}
	// All discounts from DB
	private $discounts = array();

	private function __construct()
	{

	}

	/**
	 * Load all discounts from DB
	 * @return Array Discounts loaded from DB
	 */
	public function loadDiscounts() 
	{
		$dbController = DatabaseController::getInstance();
		$dbController->connect();
		$this->discounts = $dbController->load( DiscountModel::class );

		return $this->discounts;
	}

	/**
	 * Find discount by given ID
	 * @param  int        $discountID   Surcharge ID
	 * @return class/null DiscountModel Populated class with DB data / null if there is no disount
	 */
	public function getDiscountByCurrencyID( $discountID ) {
		$result = null;

		foreach ($this->discounts as $discount) {
			if($discount->data['currency_id'] == $discountID) {
				$result = $discount;
				break;
			}
		}

		return $result;
	}
}

?>