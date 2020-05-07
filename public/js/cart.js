//stuff to make ajax requests work
$.ajaxSetup({
  headers: {
    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
  },
});

//Remove from cart
$(document).ready(function () {
  //so that these functions don't try to run before the page is loaded
  $(document).on("click", ".remove_item", function () {
    //when you click element with class remove_item
    $.ajax({
      //create request
      type: "POST",
      url: "/cart/remove/", //name of route to call
      data: {
        //data given in request key: value
        id: $(this).attr("value"),
      },
    });
    $("#table_container").load("cart #table-responsive"); //reload #table-resposnsive, put it inside of #table_container
  });

  //Decrement quantity
  $(document).on("click", ".decrement_item", function () {
    $.ajax({
      type: "POST",
      url: "/cart/decrement/",
      data: {
        id: $(this).attr("value"),
      },
    });
    $("#table_container").load("cart #table-responsive");
  });

  //Increment quantity
  $(document).on("click", ".increment_item", function () {
    $.ajax({
      type: "POST",
      url: "/cart/increment/",
      data: {
        id: $(this).attr("value"),
      },
    });
    $("#table_container").load("cart #table-responsive");
  });
});