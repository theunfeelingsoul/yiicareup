// preloader circle
$(window).load(function() {
	console.log("cows");
	$("#preloader").fadeOut("slow");
	// $(".preloader-wrapper").fadeOut("slow");
})

//---------------------------------------------------------------------------------

$( document ).ready(function() {

	$('.dropdown-button').dropdown({
      inDuration: 300,
      outDuration: 225,
      constrain_width: false, // Does not change width of dropdown to that of the activator
    //  hover: true, // Activate on hover
      gutter: 0, // Spacing from edge
      belowOrigin: false, // Displays dropdown below the button
      alignment: 'left' // Displays dropdown with edge aligned to the left of button
    }
  );

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