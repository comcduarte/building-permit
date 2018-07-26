$(document).ready(function() { 
	$('#ESTIMATED_COSTS').on('keyup', function() {
		$thousands = Math.ceil($(this).val() / 1000);
		$('#PERMIT_FEE').val($thousands*15.26);
	});
});