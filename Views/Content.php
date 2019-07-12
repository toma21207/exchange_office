<main>
	<h2 class="currency_subtitle">Select currency for purchace</h2>
	<table class="currencies_table">
		<thead class="currencies_table_header">
			<th class="currencies_table_header_data">No</th>
			<th class="currencies_table_header_data">Name</th>
			<th class="currencies_table_header_data">Rate for (1 USD)</th>
			<th class="currencies_table_header_data">Action</th>
		</thead>
		<tbody class="currencies_table_body">
			<?php 
			foreach( $currencies as $key => $currency ) { 
				if( $currency->data['short_name'] == 'USD' )
				{
					continue;
				}
			?>
			<tr class="currencies_table_row">
				<td class="currencies_table_data">
					<?php 
					echo $key;
					?>
				</td>
				<td class="currencies_table_data">
					<?php 
					echo $currency->data['short_name'];
					?>
				</td>
				<?php
				$exchangeRate = $exchangeRateController->getExchangeRateById(
							$currencyController->getBaseCurrencyID(),
							$currency->data['id']
						);
				?>
				<td class="currencies_table_data data_type_number">
					<?php 
					echo $exchangeRate->data['exchange_rate'];
					?>
				</td>
				<td class="currencies_table_data">
					<div class="action_button" 
						btn-data-id="<?php echo $currency->data['id']; ?>"
						btn-data-rate="<?php echo $exchangeRate->data['exchange_rate'] ?>" >
						Purchase
					</div>
				</td>
			</tr>
			<?php 
			} 
			?>
		</tbody>
	</table>
</main>