//full text search
function filter() {
  // Declare variables
  var input, filter, i, txtValue;
  //what is written in the search bar
  input = document.getElementById("myInput");
  //toUpper case so the search isnt case sensitive
  filter = input.value.toUpperCase();
  row = document.getElementById("phone-grid");
  card = row.getElementsByClassName("card");
  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < card.length; i++) {
    model = card[i].getElementsByClassName("card-title-model");
    brand = card[i].getElementsByClassName("card-title");
    //text to be matched
    txtValue = brand[0].innerHTML + " " + model[0].innerHTML;
    //if the text matches, display content
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      card[i].parentElement.style.display = "";
    } else {
      card[i].parentElement.style.display = "none";
    }
  }
  test = [];
  $("#phone-grid-container").load("search #phone-grid"); //reload #table-resposnsive, put it inside of #table_container
}