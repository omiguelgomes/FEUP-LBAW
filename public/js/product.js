$.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

$(document).ready(function () {
        //alter stock
        $('#productFormID').submit(function(event){
            event.preventDefault();


            var $form = $(this),
                url = $form.attr('action');

            // $.ajax({
            //     type: "POST",
            //     url: url,
            //     data: {
            //         _token: '{!! csrf_token() !!}',
            //         stock: $('#inputStock').val(),
            //     },
            // });

            var posting = $.post(url, {stock: $('#inputStock').val()});

            posting.done(function(data){
                alert('Stock incremented');
            });
        });


        //delete product
        $(document).on('click', '.productDelete', function() {

            let id = $(this).attr("value");
            $.ajax({
                type: "GET",
                url: "admin/product/delete/" + id,
                success: function(responseData, textStatus, jqXHR) {
                    alert("Deleted Product")
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(errorThrown);
                }
                });

                $("#productContainer").load("admin .productTable");

        });
});

