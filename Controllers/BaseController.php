<?php
/**
 * @package ExchageOffice
 * @author  Tomislav Kukic
 *
 */
 
namespace Inc\Controllers;

use \Inc\Controllers\CurrencyController;

/** 
 * This controller is used to controll most basic stuff in application
 * Some of this stuff are Initialization, Call Other controllers as necesary
 * deal with basic security issues etc.
 * This is also API controller
 */
class BaseController
{
	public function getScripts()
	{
		echo '<script type="text/javascript" src=".\assets\js\jquery-3.4.1.min.js"></script>';
		echo '<script type="text/javascript" src=".\assets\js\script.js"></script>';
	}

	public function getStyles() 
	{
		echo '<link rel="stylesheet" type="text/css" href=".\assets\css\style.css">';
	}

	public function getHeader() 
	{
		// Print header template
		require($_SERVER['DOCUMENT_ROOT'] . '/Views/Header.php' );
	}

	public function getFooter()
	{

	}

	public function getContent() 
	{
		$currencyController = CurrencyController::getInstance();
		$exchangeRateController = ExchangeRateController::getInstance();
		$currencies = $currencyController->loadCurrencies();
		$exchangeRateController->loadExchangeRates();

		// Print content template
		require( $_SERVER['DOCUMENT_ROOT'] . '/Views/Content.php' );
		require( $_SERVER['DOCUMENT_ROOT'] . '/Helpers/MessageBox.php' );
	}
}

?>