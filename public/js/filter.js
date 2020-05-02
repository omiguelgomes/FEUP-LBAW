//stuff to make ajax requests work
$.ajaxSetup({
  headers: {
    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
  },
});

$(document).ready(function () {
  $("#apply_filter").on('click', function () { //when you click on apply_filter
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
          $(this).parent().parent().parent().hide(); //hide card
          for (var i = 0; i < selectedBrands.length; i++) {
            if (product.brand.name.toUpperCase() == selectedBrands[i].toUpperCase()) { //if brand matches any of the ticked boxes
              $(this).parent().parent().parent().show(); //show card
            }
          }
        })
    }

    if (selectedFingerPrints.length) {
      $(".card-title").each(
        function () {
          product = JSON.parse($(this).attr('value'));
          $(this).parent().parent().parent().hide(); //hide card
          for (var i = 0; i < selectedFingerPrints.length; i++) {
            // console.log(product.fingerprinttype.value.toUpperCase());
            // console.log(selectedFingerPrints[i].toUpperCase());
            if (product.fingerprinttype.value.toUpperCase() == selectedFingerPrints[i].toUpperCase()) { //if brand matches any of the ticked boxes
              $(this).parent().parent().parent().show(); //show card
            }
          }
        })
    }
  })
});