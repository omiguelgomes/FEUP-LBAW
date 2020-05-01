//stuff to make ajax requests work
$.ajaxSetup({
  headers: {
    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
  },
});

$(document).ready(function () {
  $("#apply_filter").on('click', function () { //when you click on apply_filter
    var selectedBrands = [];
    $(".brandCheckBox").each( //get values of ticked checkboxes
      function () {
        if ($(this).is(":checked")) {
          selectedBrands.push($(this).val());
        }
      })

    if (selectedBrands.length) {
      $(".card-title-brand").each(

        function () {
          console.log(selectedBrands);
          $(this).parent().parent().parent().hide(); //hide card
          for (var i = 0; i < selectedBrands.length; i++) {
            if ($(this).text().toUpperCase() == selectedBrands[i].toUpperCase()) { //if brand matches any of the ticked boxes
              $(this).parent().parent().parent().show(); //show card
            }
          }
        })
    }
    //else {
    //   $(".card-title-brand").each(
    //     function () {
    //       $(this).parent().parent().show();
    //     }
    //   )
    // }
    // $.ajax({
    //   url: "search/filter",
    //   type: 'GET',
    //   data: {
    //     brands: selectedBrands
    //   },
    //   success: function (response) {
    //     $('#something').html(response);
    //   }
    // })

  })
});