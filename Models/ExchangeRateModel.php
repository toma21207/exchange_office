<?php
/**
 * @package ExchangeOffice
 * @author  Tomislav Kukic
 *
 */
namespace Inc\Models;

class ExchangeRateModel
{
	public const _TABLE_NAME_   = 'exchange_rates';
	public const _QUERY_CONFIG_ = array(
		'order_by'        => 'time_stamp',
		'order_direction' => 'desc'
	);
	public $data = array(
		'id'                   => '',
		'base_currency_id'     => '',
		'exchange_currency_id' => '',
		'time_stamp'           => ''
	); 
}

?>