
$(document).ready(function() {
	//проверим поля
	$('#date_birth').on('input', function() {
		if(!$(this).val()) {
			$(this).addClass('error_input');
			$(this).removeClass('complet_input');
		} else {
			$(this).addClass('complet_input');
			$(this).removeClass('error_input');
		}
	})
})

	// отправка формы
	$('#form_registr').on('submit', function () {
		event.preventDefault();
		form = $(this);
		data = {};

		$.each( form.serializeArray(), function(i, e) {
			data[e.name] = e.value;
		});
console.log(form.attr('action'));
		$.ajax({
		  url: form.attr('action'),
			type: "POST",
			dataType: 'json',
			data: data,
		  success: function(json) {
		    console.log(json);

		  }
		});
	})
