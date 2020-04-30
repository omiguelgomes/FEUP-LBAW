$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$(document).ready(function () {
  $(document).on('click', ".remove_item", function () {
    $.ajax({
      type: "POST",
      url: "/cart/remove/",
      data: {
        id: $(this).attr('value')
      }
    })
    $('#table_container').load('cart #product_table');
  })
});