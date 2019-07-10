<?php
/**
 * @package ExchangeOffice
 * @author  Tomislav Kukic
 *
 */
namespace Inc\Controllers;

use \Inc\Models\CurrencyModel;

/**
 * This controller is used to handle all database request
 */
final class DatabaseController
{
	private static $instance = null;
	public static function getInstance() 
	{
		if(self::$instance == null) {
			self::$instance = new DatabaseController();
		}

		return self::$instance;
	}

	private function __construct()
	{

	}

	private $dbSettings = array(
		'user'     => 'root',
		'password' => 'Pacovcina1982!',
		'host'     => 'localhost',
		'db'       => 'exchange_office',
	);

	private $dbLink = null;

	public function connect() 
	{
		$this->dbLink = mysqli_connect(
			$this->dbSettings['host'], 
			$this->dbSettings['user'], 
			$this->dbSettings['password'], 
			$this->dbSettings['db']
		);

		return ( $this->dbLink != false );
	}

	/**
	 * Function to load any model from database
	 * 
	 * @param  class $model Model to be loaded from database
	 * @return array        Array of models populated with DB data
	 */
	public function load($model) {
		$result    = array();
		$tableName = $model::_TABLE_NAME_;
		$queryCfg  = $model::_QUERY_CONFIG_;

		$query    = "SELECT * FROM `$tableName`";
		if( array_key_exists( 'order_by', $queryCfg ) ) {
			$query .= " ORDER BY " . $queryCfg['order_by'];

			if( array_key_exists( 'order_direction', $queryCfg ) ) 
			{
				$query .=  " " . $queryCfg['order_direction'];	
			} 
		}
		$dbResult = mysqli_query($this->dbLink, $query);

		while ($data = $dbResult->fetch_assoc()) {
			$newModel = new $model();
			foreach ($data as $key => $value) {
				$newModel->data[$key] = $value;
			}
			array_push($result, $newModel);
		}
		mysqli_close($this->dbLink);

		return $result;
	}

	public function save($model) {

	}
	
	/**
	 * This funcion only tests DB connection
	 * 
	 * @return bool DB connection test result
	 */
	public function testDB() 
	{
		$result = true;

		$test_query = "SELECT * FROM `currencies`";
		$dbResult = mysqli_query($link, $test_query);

		while ( $currencies = $dbResult->fetch_assoc() ) 
		{
			foreach ( $currencies as $key => $value ) 
			{
				echo "$key - $value </br>";
			}
		}
		mysqli_close( $link );

		return $result;
	}
}

?>