$(function(){
	// datepicker
	$( ".for_date" ).datepicker({
		changeMonth: true,
		changeYear: true,
	});
	$( ".birthday" ).datepicker({
		changeMonth: true,
		changeYear: true,
		selectors: true,
		dateFormat: "d MM yy",
		yearRange : "c-70"
	});
});