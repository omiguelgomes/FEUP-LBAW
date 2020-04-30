$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

function filter() {
  // Declare variables
  var input, filter, ul, li, a, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  row = document.getElementById("phone-grid");
  card = row.getElementsByClassName("card");
  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < card.length; i++) {
    title = card[i].getElementsByClassName("card-title");
    txtValue = title[0].innerHTML + " " + title[1].innerHTML;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      card[i].parentElement.style.display = "";
    } else {
      card[i].parentElement.style.display = "none";
    }
  }
}

$(document).ready(function () {
  $("#apply_filter").on('click', function () {
    var selectedBrands = [];
    $(".brandCheckBox").each(
      function () {
        if ($(this).is(":checked")) {
          selectedBrands.push($(this).val());
        }
      })
    $.ajax({
      url: "search/filter",
      type: 'GET',
      data: {
        brands: selectedBrands
      },
      success: function (response) {
        $('#something').html(response);
      }
    })

  })
});