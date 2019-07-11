<?php
/**
 * @package ExchangeOffice
 * @author  Tomislav Kukic
 *
 */
namespace Inc\Models;

class SurchargeModel
{
	public const _TABLE_NAME_ = 'surcharges';
	public const _QUERY_CONFIG_ = array();
	public $data = array(
		'id'          => '',
		'currency_id' => '',
		'amount' 	  => ''
	);
}

?>