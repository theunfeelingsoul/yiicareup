$( document ).ready(function() {

	// $(".area-srch-menu-item").click(function(){
	    
	//     if ($("#skill-srch-menu-item-collapse").is(":visible")) {
	//     	// $("#skill-srch-menu-item-collapse").hide();
	//     	$( "#skill-srch-menu-item-collapse").removeClass( "in" );
	//     	$( "#skill-srch-menu-item-collapse").addClass( "collapse" );
	//     	// $("#skill-srch-menu-item-collapse").toggleClass('collapse');
	//     }
	//     // $("p").hide();
	// });

	// 	// $('.skill-srch-menu-item-close input[type="button"]').disabled = true;
	// $('.skill-srch-menu-item').click(function(){

	//     if ($("#area-srch-menu-item-collapse").is(":visible")) {
	//     	$( "#area-srch-menu-item-collapse").removeClass( "in" );
	//     	$( "#area-srch-menu-item-collapse").addClass( "collapse" );
	//     }
	//     // $("p").hide();
	// });
		// $( "#area-srch-menu-item-input-box" ).hide();

		// $( "#skill-srch-menu-item-input-box" ).hide();
	
	$(".service-srch-menu-item").click(function(){

		$( "#area-srch-menu-item-input-box" ).hide();
		$( "#skill-srch-menu-item-input-box" ).hide();
		$( "#office-srch-menu-item-input-box" ).hide();
		console.log('working');
	});

	$(".skill-srch-menu-item").click(function(){

		$( "#skill-srch-menu-item-input-box" ).toggle();
		$( "#area-srch-menu-item-input-box" ).hide();
		$( "#office-srch-menu-item-input-box" ).hide();
		console.log('working');
	});

	$(".area-srch-menu-item").click(function(){

		$( "#area-srch-menu-item-input-box" ).toggle();
		$( "#skill-srch-menu-item-input-box" ).hide();
		$( "#office-srch-menu-item-input-box" ).hide();
		console.log('working');
	});

	$(".office-srch-menu-item").click(function(){

		$( "#office-srch-menu-item-input-box" ).toggle();
		$( "#skill-srch-menu-item-input-box" ).hide();
		$( "#area-srch-menu-item-input-box" ).hide();
		console.log('working');
	});

	$(".skill-srch-menu-item-close").click(function(){

		$( "#skill-srch-menu-item-input-box" ).hide();
	});

	$(".area-srch-menu-item-close").click(function(){

		$( "#area-srch-menu-item-input-box" ).hide();
	});

	$(".office-srch-menu-item-close").click(function(){
		$( "#office-srch-menu-item-input-box" ).hide();
	});





	$("#show").click(function(){
	    $("p").show();
	});

	// delete staff table
	$(".home_delete_staff").click(function() {
		var result = confirm("あなたは削除しますか？");

		if (result) {

			console.log("delete stadff");
			// 1. Get the last class which is the staff id
				// get the class. it is a string
				var myClass = $(this).attr("class");
				// convert the classes to an array
				var splitClass = myClass.split(' ');
				// get the last array. It is the staff id
				var staff_id = splitClass.slice(-1).pop();
			// 2. Post the staff id to staff controlleer to be deleted
				$.post( "index.php?r=staff/delete", { 	id 	: staff_id })
					.done(function( data ) {
					console.log(data);
				
					// $( "#staffer_"+staff_id).remove();
					$("#staffer_"+staff_id).fadeOut(300, function(){ $(this).remove();});
					$(".staff-delete-success").show().delay(3000).fadeOut();
					$('html, body').animate({
				        scrollTop: $(".staff-delete-success").offset().top
				    }, 2000);


				});
		} // end if
	});


	/*
		Show short stay date input
		hide office time table option
		when short stay service is selected.


	*/

	$("#office-service").change(function(){
		var id = $(this).find("option:selected").val();
		console.log(id);

		if (id==12) {
			
			$(".home-care").show()
			$(".office-srch-menu-item").hide()
			// $("#m-home-care-datepicker").show()
		}else{
			$(".home-care").hide()
			$(".office-srch-menu-item").show()
			$('#home-care-datepicker').val("");
		}
	});

	$("#m-office-service").change(function(){
		var id = $(this).find("option:selected").val();
		console.log(id);

		if (id==12) {
			
			$(".home-care").show()
			// $("#m-home-care-datepicker").show()
		}else{
			$(".home-care").hide()
			$('#home-care-datepicker').val("");
		}
	});


}); // end 

area-srch-menu-item-close
armans
hiroshiokadesu