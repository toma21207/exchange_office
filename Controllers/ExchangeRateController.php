<?php
/**
 * @package ExchageOffice
 * @author  Tomislav Kukic
 *
 */
 
namespace Inc\Controllers;

use \Inc\Models\ExchangeRateModel;

/**
 * 
 */
class ExchangeRateController
{
	private static $instance = null;
	public static function getInstance() 
	{
		if(self::$instance == null) {
			self::$instance = new ExchangeRateController();
		}

		return self::$instance;
	}
	// All currencies from DB
	private $exchangeRates = array();

	private function __construct()
	{

	}

	function loadExchangeRates() 
	{
		$dbController = DatabaseController::getInstance();
		$dbController->connect();
		$this->exchangeRates = $dbController->load(ExchangeRateModel::class);

		return $this->exchangeRates;
	}

	function saveExchangeRate( $exchangeRate )
	{

	}

	/**
	 * Function will return latest exchange rate for given IDs
	 * 
	 * @param  int $baseCurrencyID    Base currency id
	 * @param  int $foreignCurrencyID Foreign currency id
	 * @return ExchangeCurrencyModel  null / Model filled with data
	 */
	function getExchangeRateById( $baseCurrencyID, $foreignCurrencyID )
	{
		$result = null;
		foreach ( $this->exchangeRates as $key => $exchangeRate )
		{
			if( $exchangeRate->data['base_currency_id'] == $baseCurrencyID &&
				$exchangeRate->data['exchange_currency_id'] == $foreignCurrencyID ) {
				$result = $exchangeRate;
				break;
			}
		}

		return $result;
	}
}

?>