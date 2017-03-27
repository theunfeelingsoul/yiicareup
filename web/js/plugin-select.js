$( document ).ready(function() {



	$('select').multipleSelect();

	$('#multiple-date-pick').datepick({ 
    multiSelect: 999, monthsToShow: 1, 
    showTrigger: '#calImg'});

}); // end