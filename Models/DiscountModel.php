<?php
/**
 * @package ExchangeOffice
 * @author  Tomislav Kukic
 *
 */
namespace Inc\Models;

class DiscountModel
{
	public const _TABLE_NAME_ = 'discounts';
	public const _QUERY_CONFIG_ = array();
	public $data = array(
		'id'          => '',
		'currency_id' => '',
		'amount' 	  => ''
	);
}

?>