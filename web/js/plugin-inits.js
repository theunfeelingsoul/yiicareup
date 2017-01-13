// preloader circle
$(window).load(function() {
	console.log("cows");
	$("#preloader").fadeOut("slow");
	// $(".preloader-wrapper").fadeOut("slow");
})

//---------------------------------------------------------------------------------

$( document ).ready(function() {

	// materialize side nav
	$('.button-collapse').sideNav({
		  menuWidth: 240, // Default is 240
		  // edge: 'right', // Choose the horizontal origin
		  closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
		  draggable: true // Choose whether you can drag to open on touch screens
	});
	// -------------------------------------------------------------------------//

	// materialize select 
	$('select').material_select();
	// -------------------------------------------------------------------------//

	// materialize modal
	$('.modal').modal();
	// -------------------------------------------------------------------------//

	// materialize modal
	$('#modal2').modal({
		dismissible: false, // Modal can be dismissed by clicking outside of the modal
		opacity: .5, // Opacity of modal background
		in_duration: 300, // Transition in duration
		out_duration: 200, // Transition out duration
		starting_top: '4%', // Starting top style attribute
		ending_top: '10%', // Ending top style attribute
    });
	// -------------------------------------------------------------------------//

	// search result modal
	if ($( "#mydiv" ).hasClass( "yes-open" )) {
		$('#modal2').modal('open');
	}
	// -------------------------------------------------------------------------//

	$('ul.tabs').tabs();
	// -------------------------------------------------------------------------//

	$('ul.tabsz').tabs();
	// -------------------------------------------------------------------------//

	// side navigation button
	$(".button-collapse").sideNav();
	// -------------------------------------------------------------------------//


}); // end