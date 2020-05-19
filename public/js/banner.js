function readURL(input, id) {
  console.log(id);
  if (input.files && input.files[0]) {
    let reader = new FileReader();

    reader.onload = function (e) {
      $("#img-" + id).attr("src", e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}
