$(setUp);

function setUp(){
    if($('#main_body').length == 1)
        handleSearch();
    //Handle reply button in restaurant
    handleReplies();
}

function handleSearch(){
    $('#res_name').on('input',doSearch);
    $('#res_price1').on('input',doSearch);
    $('#res_price2').on('input',doSearch);
    $('#res_locat').on('input',doSearch);
    $('#res_rat').on('input',doSearch);
}

function doSearch(){
    var type='normal';
    var name = $('#res_name').val();
    var min = $('#res_price2').val();
    var max = $('#res_price1').val();
    var loc = $('#res_locat').val();
    var minr = $('#res_rat').val();
    if(min == ''){
        min = '0';
    }
    if(max == ''){
        max = '1000000';
    }
    if(minr == ''){
        minr = '0';
    }
    $.getJSON("php/search.php",{'type':type,'name':name,'min':min,'max':max,'loc':loc,'minr':minr},showSearch);
}

function showSearch(data){

    $("#show_restaurants").empty();
	
	var resultsHead = $('<p class="resultsHead">Found these restaurants for the criteria inserted:</p>');
	
	$("#show_restaurants").append(resultsHead);
    $.each(data, lineReceived);
}

function lineReceived(index, value) {
    // Create a new line


  var container = $('<a class="resultAnchor" href="restaurant.php?restid='+value.id+'">Read more</a>');
  var line = $('<div class="searched_res"></div>');

  // Assemble new line
  line.append('<label class="name">' + value.name + '</label>');
  line.append('<br>');
  line.append('<label class="rating">' + value.average_score + '</label>');
  line.append('<br>');
  line.append('<label class="address">' + value.address + ", " + value.city + ", " + value.country + '</label>');

  // Add new line
  line.append(container);
  $("#show_restaurants").append(line);

}

function handleReplies(){
    var replyButtons = $('.reply_button');
    replyButtons.each(function(index){
        var numID = $(this).attr('id').replace( /^\D+/g, '');
        $(this).click({id:numID},replyArea);
    });
}

function replyArea(event){

    var alreadyReplyBox = $('#reply');
    if(alreadyReplyBox.length > 0){
        alreadyReplyBox.remove();
    }
    var reviewInScreen = $('#post_review');
    if(reviewInScreen.length > 0){
        reviewInScreen.remove();
    }
    var replyButtonId = event.data.id;
    var form = $('#restaurant_reviews');
    form.prepend(
        '<form id="reply" action="php/addComment.php" method="post">'+
                '<label>Reply: </label><br>'+
                '<input type= \'hidden\' name= \'reviewid\' value="'+ replyButtonId + '"/>'+
                '<textarea id="description_area" rows="4" cols="45" name="input_text" form="reply" required></textarea><br>'+
                '<input type="submit" value=" Send " id="edit_profile_btn">'+
            '</form>');
}

function initMap() {
        var map = new google.maps.Map(document.getElementById('google_maps_div'), {
          zoom: 16,
          center: {lat: 0, lng: 0}
        });

        google.maps.event.trigger( map, 'resize' );

        var geocoder = new google.maps.Geocoder();

        var address = document.getElementById('restaurant_address').innerHTML;

        var full_address = address;

        geocoder.geocode({'address': full_address}, function(results, status) {
          if (status === 'OK') {
            map.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
              map: map,
              position: results[0].geometry.location
            });
          } else {
            alert('Geocode was not successful for the following reason: ' + status);
            $('#google_maps_div').remove();
          }
        });
}