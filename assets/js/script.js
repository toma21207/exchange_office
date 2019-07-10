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
	
	$(".action_button").click(function() {
		$('.message_box_background_wrapper').removeClass('hidden');
	});

	// Prevent window to close on click
	$('.message_box_window').click(function(event) {
		event.preventDefault();
		event.stopPropagation();
	});

	// Click on message box background will close it, something like click on Cancel button
	$('.message_box_background_wrapper').click(function() {
		$(this).addClass('hidden');
	});
});