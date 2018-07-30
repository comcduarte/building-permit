$(document).ready(function() { 
	$('#ESTIMATED_COSTS').on('keyup', function() {
		$permit_fee = 15.26 + (Math.ceil($(this).val() / 1000) - 1) * 14.26;
		$('#PERMIT_FEE').val($permit_fee);
	});
});