
$( document ).ready(function() {


$( ".service-tag-item" ).click(function() {
  // 1. get the serivce name 
  // by getting the text value in the .service-tag-item class when clicked
  var serivce_name = $(this).text();

  // 2. get the class names that has the office id
  var myClass = $(this).attr("class");

  // 3. split the string into an array
  var tag_link_split = myClass.split(' ');

  // 4. get and assign the office id to a variable
  // the office id is the second item in the array
  var tag_link_office_id = tag_link_split[1];


  // 5. use ajax to send the data to the servicedisplay controller
  // if its a new record it will be inserted into service_display table
  $.post( "index.php?r=servicedisplay/ajaxservicetags", { name: serivce_name, office_id:tag_link_office_id })
    .done(function( data ) {
    // the data that is returned is a boolean. 
    // True if it already exists or false if it does not exist in the service_display table table
    var service_display_exists = data;
    console.log("exists? "+service_display_exists); // not important. Just to display what i got. 

    // get the service display id
    $.post( "index.php?r=servicedisplay/ajaxgetid", { name: serivce_name, office_id:tag_link_office_id })
        .done(function( data ) {
      var service_display_id = data;

      // if the service display exists dont append it.
      // if it does append it
      if (service_display_exists == false) {
        // $( ".tagchecklist_service" ).append( "<div class='tagchecklist-item "+service_display_id+" ?>'> <i class='fa fa-times' aria-hidden='true'></i> "+tag_link+" </div>" );
        console.log("appended");
        $( ".tagchecklist-service" ).append( "<div class='tagchecklist-service-item "+service_display_id+"'><div class='chip'><i class='close material-icons'>close</i> "+tag_link+" </div></div>" );
        location.reload();
      }
    }); // end ajax post
  }); // end ajax post
});

$( ".skill-tag-item" ).click(function() {
  // get the tag name
  var tag_link2 = $(this).text();

  // console.log(tag_link2+" clicked");

  // get the class name that has the office id
  var tag_or_service_class = $(this).attr("class");

  // // split the string into an array
  // var tag_link_split = myClass.split(' ');

  // // get and assogn the office id to a variable
  // var tag_link_office_id = tag_link_split[1];
  var tag_link_office_id = getOfficeIdFromClassName(tag_or_service_class);

  $.post( "index.php?r=tagsdisplay/ajaxtags", { name: tag_link2, office_id:tag_link_office_id })
      .done(function( data ) {
        // console.log(data);
         var tags_display_exists = data;

    // get the service display id
    $.post( "index.php?r=tagsdisplay/ajaxgetid", { name: tag_link2, office_id:tag_link_office_id })
        .done(function( data ) {
      console.log(data);
      var tag_display_id = data;

      // if the service display exists dont append it.
      // if it does append it
      if (tags_display_exists == false) {
        $( ".tagchecklist-tag" ).append( "<div class='tagchecklist-item "+tag_display_id+" ?>'> <div class='chip'> <i class='close material-icons'>close</i> "+tag_link2+" </div></div>" );
        location.reload();
      }
    }); // end ajax post
  });

  // location.reload();

}); // end function



// delete a service display tag by ajax
$( ".tagchecklist-service-item" ).click(function() {
  // get the tag name
  // var tag_link2 = $(this).text();

  // console.log(tag_link2+" clicked");

  // get the class name that has the office id
  var tag_or_service_class = $(this).attr("class");


  // // split the string into an array
  // var tag_link_split = myClass.split(' ');

  // // get and assogn the office id to a variable
  // var tag_link_office_id = tag_link_split[1];
  var service_display_id = getOfficeIdFromClassName(tag_or_service_class);

  $.post( "index.php?r=servicedisplay/delete", { id:service_display_id })
      .done(function( data ) {
        console.log(data);
  });

  $( this).remove();


  // location.reload();

}); // end function


// delete a service display tag by ajax
$( ".tagchecklist-tag-item" ).click(function() {
  // get the tag name
  // var tag_link2 = $(this).text();

  // console.log(tag_link2+" clicked");

  // get the class name that has the office id
  var tag_or_service_class = $(this).attr("class");


  // // split the string into an array
  // var tag_link_split = myClass.split(' ');

  // // get and assogn the office id to a variable
  // var tag_link_office_id = tag_link_split[1];
  var service_display_id = getOfficeIdFromClassName(tag_or_service_class);

  $.post( "index.php?r=tagsdisplay/delete", { id:service_display_id })
      .done(function( data ) {
        console.log(data);
  });

  $( this).remove();


  // location.reload();

}); // end function



function getOfficeIdFromClassName(tag_or_service_class){
  
  // split the string into an array
  var tag_or_service_link_split = tag_or_service_class.split(' ');

  // get and assogn the office id to a variable
  var tag_or_service_link_office_id = tag_or_service_link_split[1];

  return tag_or_service_link_office_id;
}







}); // end document ready