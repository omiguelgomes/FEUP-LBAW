function myFunction(products) {
    // Loop through all list items, and hide those who don't match the search query
    input = document.getElementById('myInput');
    filter = input.value.toUpperCase();
    for (i = 0; i < products.length; i++) {
        if (products[i].model.toUpperCase().indexOf(filter) > -1)
            products.pop(i);
    }
    return products;
}