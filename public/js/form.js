
$(document).ready(function (e) {
    $(document).on("click", "#edit", function (e) {
        $(':input').removeAttr('readonly')
        $('#change').removeAttr('disabled')
    })
})

