function addEventListeners() {

    document.getElementById("edit").addEventListener('click', function () {

        //disable readonly on input boxes
        let inputs = document.getElementsByTagName('input');
        [].forEach.call(inputs, function (input) {
            input.removeAttribute("readonly");
        });
        //enable change button
        document.getElementById('change').removeAttribute("disabled");
    })
}
addEventListeners();