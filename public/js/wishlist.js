//stuff to make ajax requests work
$.ajaxSetup({
  headers: {
    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
  },
});

//Remove from cart
$(document).ready(function () {
  //so that these functions don't try to run before the page is loaded
  $(document).on("click", "#remove_item", function () {
    //when you click element with class remove_item
    $.ajax({
      //create request
      type: "POST",
      url: "/wishlist/remove/", //name of route to call
      data: {
        //data given in request key: value
        id: $(this).attr("value"),
      },
    });
    $("#grid-container").load("wishlist #phone-grid"); //reload #product_table, put it inside of #table_container
  });
});