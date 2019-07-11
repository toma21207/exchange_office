
<div class="message_box_background_wrapper hidden">
	<div class="message_box_window">
		<div class="message_box_title">
			<span>Purchace details</span>
		</div>
		<div class="message_box_content">
			<div class="currency_amount_box">
				<input id="currency_amount" type="number" value="" placeholder="Currency amount" />
				<div class="message_box_button calculate_button">Calculate</div>
			</div>
			<div class="currency_amount_calculation hidden">
				<p>Purchase calculation</p>
				<table>
					<thead>
						<th>Currency</th>
						<th>Amount</th>
						<th>Discount</th>
						<th>Sum</th>
					</thead>
					<tbody>
						<tr>
							<td id="currency_name"></td>
							<td id="currency_amount"></td>
							<td id="currency_discount"></td>
							<td id="invoice_summary"></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="message_box_button_bar">
			<div class="message_box_button ok_button hidden">Confirm</div>
			<div class="message_box_button cancel_button hidden">Cancel</div>
			<div class="message_box_button yes_button hidden">Yes</div>
			<div class="message_box_button no_button hidden">No</div>
		</div>
	</div>
</div>