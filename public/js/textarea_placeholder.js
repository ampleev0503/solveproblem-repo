/**
 * Created by Di13 on 20.04.2018.
 */
$(document).on('input', '#full-description', function () {

	if ($('#full-description').val()) {
		$('#placeholderTextarea').hide();
	} else {
		$('#placeholderTextarea').show();
	}

});