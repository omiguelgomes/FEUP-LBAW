//stuff to make ajax requests work
$.ajaxSetup({
  headers: {
    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
  },
});

$(document).ready(function () {
  $("#apply_filter").on('click', function () { //when you click on apply_filter
    //by default, show all products
    $(".card-title").each(
      function () {
        $(this).parent().parent().parent().show();
      }
    );


    var selectedBrands = [];
    var selectedFingerPrints = [];
    $(".brandCheckBox").each( //get values of ticked checkboxes
      function () {
        if ($(this).is(":checked")) {
          selectedBrands.push($(this).val());
        }
      })

    $(".fingerprintCheckBox").each( //get values of ticked checkboxes
      function () {
        if ($(this).is(":checked")) {
          selectedFingerPrints.push($(this).val());
        }
      })

    if (selectedBrands.length) {
      $(".card-title").each(
        function () {
          product = JSON.parse($(this).attr('value'));
          var matches = false;
          for (var i = 0; i < selectedBrands.length; i++) {
            if (product.brand.name.toUpperCase() == selectedBrands[i].toUpperCase()) { //if brand matches any of the ticked boxes
              matches = true;
            }
          }
          if (!matches)
            $(this).parent().parent().parent().hide();
        })
    }

    if (selectedFingerPrints.length) {
      $(".card-title").each(
        function () {
          var matches = false;
          product = JSON.parse($(this).attr('value'));
          for (var i = 0; i < selectedFingerPrints.length; i++) {
            if (product.fingerprinttype.value.toUpperCase() == selectedFingerPrints[i].toUpperCase()) { //if brand matches any of the ticked boxes
              matches = true;
            }
          }
          if (!matches)
            $(this).parent().parent().parent().hide();
        })
    }
  })
});