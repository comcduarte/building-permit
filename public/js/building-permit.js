$(document).ready(function() { 
	$('#ESTIMATED_COSTS').on('input', function() {
		$estimated_costs = accounting.unformat($(this).val());
		if ($estimated_costs < 50) {
			$('#PERMIT_FEE').val(0.00);
			$('#Q').val(0.00);
		} else {
			$permit_fee = 15.26 + (Math.ceil($estimated_costs / 1000) - 1) * 14.26;
			$('#PERMIT_FEE').val(accounting.formatNumber($permit_fee, 2, "", "."));
			$('#Q').val(accounting.formatNumber($permit_fee, 2, "", "."));
		}
	});
	
	$('#APPLICANTS_PHONE').mask('000-000-0000');
	$('#APPLICANTS_FAX').mask('000-000-0000');
	$('#APPLICANTS_ZIP').mask('00000-0000');
	$('#OWNERS_ZIP').mask('00000-0000');
});