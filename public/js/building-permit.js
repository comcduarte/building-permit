$(document).ready(function() { 
	$('#ESTIMATED_COSTS').on('input', function() {
		$estimated_costs = accounting.unformat($(this).val());
		$permit_fee = 15.26 + (Math.ceil($estimated_costs / 1000) - 1) * 14.26;
		$('#PERMIT_FEE').val($permit_fee);
	});
});