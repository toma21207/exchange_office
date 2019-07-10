<?php
/**
 * @package ExchangeOffice
 * @author  Tomislav Kukic
 *
 */
namespace Inc\Controllers;

use Inc\Controllers\DatabaseController;
use \Inc\Models\CurrencyModel;

/**
 * This controller is used to manage currencies
 */
class CurrencyController
{
	private static $instance = null;
	public static function getInstance() 
	{
		if(self::$instance == null) {
			self::$instance = new CurrencyController();
		}

		return self::$instance;
	}
	// All currencies from DB
	private $curencies = array();
	private $baseCurrencyID = null;

	private function __construct()
	{

	}

	/**
	 * Load all currencies from DB
	 * @return Array Currencies loaded from DB
	 */
	public function loadCurrencies() 
	{
		$dbController = DatabaseController::getInstance();
		$dbController->connect();
		$this->currencies = $dbController->load(CurrencyModel::class);
		$this->findBaseCurrencyID();

		return $this->currencies;
	}

	private function findBaseCurrencyID()
	{
		foreach( $this->currencies as $currency) 
		{
			if( $currency->data['short_name'] == "USD" )
			{
				$this->baseCurrencyID = $currency->data['id'];
			}
		}
	}

	public function getBaseCurrencyID() 
	{
		return $this->baseCurrencyID;
	}

	// Save currency to DB
	public function saveCurrency($newCurrency)
	{

	}

	public function getCurrencyByID($id)
	{

	}

	public function getCurrencyByShortName($shortName)
	{

	}
}

?>