<?php
/**
 * @package ExchangeOffice
 * @author  Tomislav Kukic
 *
 */
namespace Inc\Models;

class CurrencyModel
{
	public const _TABLE_NAME_ = 'currencies';
	public const _QUERY_CONFIG_ = array();
	public $data = array(
		'id'         => '',
		'name'       => '',
		'short_name' => ''
	);
}

?>