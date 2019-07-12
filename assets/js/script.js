$(function() {
	var formData = {};
	var purchaseCurrency = function() {
		$.ajax({
			type: 'post',  
			url: './AjaxController',  
			contentType: false,
			processData: false,
			dataType:'JSON',
			data: formData,
			success: function(value) {
			    if (value.msg == 'true') {
			          //your action
			    }else{
			          //your action
			    }
			}
		});
	}

	var calculateData = {};
	
	$(".action_button").click(function() {
		$('.message_box_background_wrapper').removeClass('hidden');
		calculateData['id']        = $(this).attr('btn-data-id');
		calculateData['name']      = $(this).attr('btn-data-name');
		calculateData['amount']	   = 0;
		calculateData['rate']      = Number($(this).attr('btn-data-rate'));
		calculateData['surcharge'] = Number($(this).attr('btn-data-surcharge'));
		calculateData['discount']  = Number($(this).attr('btn-data-discount'));
	});

	// Prevent window to close on click
	$('.message_box_window').click(function(event) {
		event.preventDefault();
		event.stopPropagation();
	});
	$('.message_box_window').children().click(function(event) {
		event.preventDefault();
		event.stopPropagation();
	});

	// Click on message box background will close it, something like click on Cancel button
	$('.message_box_background_wrapper').click(function() {
		$(this).addClass('hidden');
	});

	$('.cancel_button').click(function() {
		$('.message_box_background_wrapper').addClass('hidden');
	});

	$('.calculate_button').click(function(){
		
	});
});