$( document ).ready(function() {

	$('#myTabs a').click(function (e){
		e.preventDefault()
		$(this).tab('show')
	});
	
	$('#myTabsz a').click(function (e){
		e.preventDefault()
		$(this).tab('show')
	});

	$( "#home-care-datepicker" ).datepicker();
	$( "#m-home-care-datepicker" ).datepicker();
	


	// $('select').multipleSelect();

}); // end