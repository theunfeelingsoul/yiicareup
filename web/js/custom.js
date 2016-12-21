  
  $(window).load(function() {
  	console.log("cows");
	$("#preloader").fadeOut("slow");
	// $(".preloader-wrapper").fadeOut("slow");
})

$( document ).ready(function() {

  $('select').multipleSelect();




	

	$(".time_not_available").click(function() {
		// get the class
		var myClass = $(this).attr("class");
		console.log(myClass);
		//split the class and get the skill name, day and id class

		var splitClass = myClass.split(' ');

		console.log(splitClass);
		// split the skill name, day and id class by a dash (-)
		var skill_day_id_class 					= splitClass[3];
		console.log(skill_day_id_class);
		var split_skill_day_id_class 			= skill_day_id_class.split('-');
		console.log(split_skill_day_id_class);
		var skill_class 						= split_skill_day_id_class[0];
		var day_class 							= split_skill_day_id_class[1];
		var id_class 							= split_skill_day_id_class[2];
		var office_id_class 					= split_skill_day_id_class[3];

		// save the data using ajax top the skill table

		$.post( "index.php?r=skillstimetable/ajaxtimenotavailable", { 	skill 	: skill_class, day 	: day_class, user_id :id_class, office_id: office_id_class })
			.done(function( data ) {
			console.log(data);
			 // location.reload();
			  $("#yes"+skill_day_id_class).removeClass("hidden_time");
			 console.log("#yes"+skill_day_id_class);
			 $( "#yes"+skill_day_id_class).show();
			 $( "#not"+skill_day_id_class).hide();

		});

		// chnage the existing state
	});


	$(".time_available").click(function() {
		// get the class
		var myClass = $(this).attr("class");
		console.log(myClass);
		//split the class and get the skill name, day and id class

		var splitClass = myClass.split(' ');

		console.log(splitClass);
		// split the skill name, day and id class by a dash (-)
		var skill_day_id_class 					= splitClass[3];
		console.log(skill_day_id_class);
		var split_skill_day_id_class 			= skill_day_id_class.split('-');
		console.log(split_skill_day_id_class);
		var skill_class 						= split_skill_day_id_class[0];
		var day_class 							= split_skill_day_id_class[1];
		var id_class 							= split_skill_day_id_class[2];
		var office_id_class 					= split_skill_day_id_class[3];

		// save the data using ajax top the skill table

		$.post( "index.php?r=skillstimetable/ajaxtimeavailable", { 	skill 	: skill_class, day 	:day_class, user_id :id_class,office_id: office_id_class})
			.done(function( data ) {
			console.log(data);
			 $("#maybe"+skill_day_id_class).removeClass("hidden_time");
			 console.log("#maybe"+skill_day_id_class);
			 $( "#maybe"+skill_day_id_class).show();
			 $( "#yes"+skill_day_id_class).hide();

		});

		// chnage the existing state
	});


	$(".time_maybe").click(function() {
		// get the class
		var myClass 					= $(this).attr("class");
		console.log(myClass);
		//split the class and get the skill name, day and id class

		var splitClass 					= myClass.split(' ');

		console.log(splitClass);
		// split the skill name, day and id class by a dash (-)
		var skill_day_id_class 			= splitClass[3];
		console.log(skill_day_id_class);
		var split_skill_day_id_class 	= skill_day_id_class.split('-');
		console.log(split_skill_day_id_class);
		var skill_class 				= split_skill_day_id_class[0];
		var day_class 					= split_skill_day_id_class[1];
		var id_class 					= split_skill_day_id_class[2];
		var office_id_class 			= split_skill_day_id_class[3];

		// save the data using ajax top the skill table

		$.post( "index.php?r=skillstimetable/ajaxtimemaybeavailable", { 	skill 	: skill_class, day 	:day_class, user_id :id_class, office_id:office_id_class })
			.done(function( data ) {
			console.log(data);
			 // location.reload();
			  $("#not"+skill_day_id_class).removeClass("hidden_time");
			 console.log("#not"+skill_day_id_class);
			 $( "#not"+skill_day_id_class).show();
			 $( "#maybe"+skill_day_id_class).hide();

		});

		// chnage the existing state
	});


	$(".time_blank").click(function() {
		// get the class
		var myClass 					= $(this).attr("class");
		console.log(myClass);
		//split the class and get the skill name, day and id class

		var splitClass 					= myClass.split(' ');

		console.log(splitClass);
		// split the skill name, day and id class by a dash (-)
		var skill_day_id_class 			= splitClass[3];
		console.log(skill_day_id_class);
		var split_skill_day_id_class 	= skill_day_id_class.split('-');
		console.log(split_skill_day_id_class);
		var skill_class 				= split_skill_day_id_class[0];
		var day_class 					= split_skill_day_id_class[1];
		var id_class 					= split_skill_day_id_class[2];
		var office_id_class 			= split_skill_day_id_class[3];


		// save the data using ajax top the skill table

		$.post( "index.php?r=skillstimetable/ajaxtimenotavailable", { 	skill 	: skill_class, day 	:day_class, user_id :id_class,office_id:office_id_class })
			.done(function( data ) {
			console.log(data);
			 location.reload();
			 //  $("#not"+skill_day_id_class).removeClass("hidden_time");
			 // console.log("#not"+skill_day_id_class);
			 // $( "#not"+skill_day_id_class).show();
			 // $( "#maybe"+skill_day_id_class).hide();

		});

		// chnage the existing state
	});

	$('ul.tabs').tabs();
	$('ul.tabsz').tabs();

	$(".office_time_not_available").click(function() {
		// get the class
		var myClass = $(this).attr("class");
		console.log(myClass);
		//split the class and get the skill name, day and id class

		var splitClass = myClass.split(' ');

		console.log(splitClass);
		// split the skill name, day and id class by a dash (-)
		var office_time_class 					= splitClass[3];
		console.log(office_time_class);
		var split_office_time_class 			= office_time_class.split('-');
		// console.log(split_skill_day_id_class);
		var day_class 							= split_office_time_class[0];
		var user_id_class 						= split_office_time_class[1];
		var office_id_class 					= split_office_time_class[2];

		// save the data using ajax top the skill table

		$.post( "index.php?r=officetimetable/ajaxofficetimenotavailable", {  day 	: day_class, user_id :user_id_class, office_id: office_id_class })
			.done(function( data ) {
			console.log(data);
			 // location.reload();
			  $("#yes"+office_time_class).removeClass("hidden_time");
			 console.log("#yes"+office_time_class);
			 $( "#yes"+office_time_class).show();
			 $( "#not"+office_time_class).hide();

		});

		// chnage the existing state
	});


	$(".office_time_available").click(function() {
		// get the class
		var myClass = $(this).attr("class");
		console.log(myClass);
		//split the class and get the skill name, day and id class

		var splitClass = myClass.split(' ');

		console.log(splitClass);
		// split the skill name, day and id class by a dash (-)
		var office_time_class 					= splitClass[3];
		console.log(office_time_class);
		var split_office_time_class 			= office_time_class.split('-');
		// console.log(split_skill_day_id_class);
		var day_class 							= split_office_time_class[0];
		var user_id_class 						= split_office_time_class[1];
		var office_id_class 					= split_office_time_class[2];

		// save the data using ajax top the skill table

		$.post( "index.php?r=officetimetable/ajaxofficetimeavailable", { 	day 	:day_class, user_id :user_id_class,office_id: office_id_class})
			.done(function( data ) {
			console.log(data);
			 $("#maybe"+office_time_class).removeClass("hidden_time");
			 console.log("#maybe"+office_time_class);
			 $( "#maybe"+office_time_class).show();
			 $( "#yes"+office_time_class).hide();

		});

		// chnage the existing state
	});


	$(".office_time_maybe").click(function() {
		// get the class
		var myClass 					= $(this).attr("class");
		console.log(myClass);
		//split the class and get the skill name, day and id class

		var splitClass 					= myClass.split(' ');

		console.log(splitClass);
		// split the skill name, day and id class by a dash (-)
		var office_time_class 					= splitClass[3];
		console.log(office_time_class);
		var split_office_time_class 			= office_time_class.split('-');
		// console.log(split_skill_day_id_class);
		var day_class 							= split_office_time_class[0];
		var user_id_class 						= split_office_time_class[1];
		var office_id_class 					= split_office_time_class[2];
		// save the data using ajax top the skill table

		$.post( "index.php?r=officetimetable/ajaxofficetimemaybeavailable", {  day 	:day_class, user_id :user_id_class, office_id:office_id_class })
			.done(function( data ) {
			console.log(data);
			 // location.reload();
			  $("#not"+office_time_class).removeClass("hidden_time");
			 console.log("#not"+office_time_class);
			 $( "#not"+office_time_class).show();
			 $( "#maybe"+office_time_class).hide();

		});

		// chnage the existing state
	});


	$(".office_time_blank").click(function() {
		// get the class
		var myClass 					= $(this).attr("class");
		console.log(myClass);
		//split the class and get the skill name, day and id class

		var splitClass 					= myClass.split(' ');

		console.log(splitClass);
		// split the skill name, day and id class by a dash (-)
		var office_time_class 					= splitClass[3];
		console.log(office_time_class);
		var split_office_time_class 			= office_time_class.split('-');
		// console.log(split_skill_day_id_class);
		var day_class 							= split_office_time_class[0];
		var user_id_class 						= split_office_time_class[1];
		var office_id_class 					= split_office_time_class[2];


		// save the data using ajax top the skill table

		$.post( "index.php?r=officetimetable/ajaxofficetimenotavailable", { 	 day 	:day_class, user_id :user_id_class,office_id:office_id_class })
			.done(function( data ) {
			console.log(data);
			 location.reload();
			 //  $("#not"+skill_day_id_class).removeClass("hidden_time");
			 // console.log("#not"+skill_day_id_class);
			 // $( "#not"+skill_day_id_class).show();
			 // $( "#maybe"+skill_day_id_class).hide();

		});

		// chnage the existing state
	});


	$(".button-collapse").sideNav();

}); // end 

 	


