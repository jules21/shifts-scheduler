$(document).ready(function() {
	$('#category').on('change', function() {
		var categoryId = $(this).val();
		if (categoryId) {
			$.ajax({
				url: '/states/get/' + categoryId,
				type: 'GET',
				dataType: 'json',
				beforeSend: function() {
					$('#loader').css('visibility', 'visible');
				},

				success: function(data) {
					$('#membership').empty();

					$.each(data, function(key, value) {
						$('#membership').append('<option value="' + key + '">' + value + '</option>');
					});
				},
				complete: function() {
					$('#loader').css('visibility', 'hidden');
				}
			});
		} else {
			$('#membership').empty();
		}
	});
	$('.alert').fadeTo(2000, 500).slideUp(500, function() {
		$('.alert').slideUp(500);
	});
});
