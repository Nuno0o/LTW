$(setUp);

function setUp(){
    if($('#main_body').length == 1)
        handleSearch();
}

function handleSearch(){
    $('#res_name').on('input',doSearch);
    $('#res_price1').on('input',doSearch);
    $('#res_price2').on('input',doSearch);
    $('#res_locat').on('input',doSearch);
    $('#res_rat').on('input',doSearch);
}

function doSearch(){

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
    $.getJSON("php/search.php",{'name':name,'min':min,'max':max,'loc':loc,'minr':minr},showSearch);

}

function showSearch(data){
    console.log(data[0]);
    $("#show_restaurants").empty();
    $.each(data, lineReceived);
}

function lineReceived(index, value) {
    // Create a new line


  var container = $('<a href="restaurant.php?restid='+value.id+'"></a>');
  var line = $('<div class="searched_res"></div>');

  // Assemble new line
  line.append('<label class="name">' + value.name + '</label>');
  line.append('<br>');
  line.append('<label class="rating">' + value.average_score + '</label>');
  line.append('<br>');
  line.append('<label class="name">' + value.address + " " + value.city + " " + value.country + '</label>');

  // Add new line
  container.append(line);
  $("#show_restaurants").append(container);

}