<?php
include_once('header.php');
include_once('navbar.php');
include_once('jumbo_title.php');
include_once('footer.php');

draw_header();
draw_navbar();
draw_jumbo('Cart');
?>

<div class="container">
    <br>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Products</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Remove</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <img src="../assets/tele1.jpg" alt="..." style="width:80px;">
                    </td>
                    <td>
                        <div class="card-body">
                            <h5 class="card-title">Samsung Galaxy S5 (64GB - Preto) </h5>
                            <h6 class="card-text">Samsung</h6>
                        </div>
                    </td>
                    <td>1</td>
                    <td>499.99€</td>
                    <td>
                        <a href="#" class="thumbnail">
                            <i class="far fa-times-circle fa-2x ml-4"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <img src="../assets/tele1.jpg" alt="..." style="width:80px;">
                    </td>
                    <td>
                        <div class="card-body">
                            <h5 class="card-title">Samsung Galaxy S5 (64GB - Preto) </h5>
                            <h6 class="card-text">Samsung</h6>
                        </div>
                    </td>
                    <td>1</td>
                    <td>499.99€</td>
                    <td>
                        <a href="#" class="thumbnail">
                            <i class="far fa-times-circle fa-2x ml-4"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <img src="../assets/tele1.jpg" alt="..." style="width:80px;">
                    </td>
                    <td>
                        <div class="card-body">
                            <h5 class="card-title">Samsung Galaxy S5 (64GB - Preto) </h5>
                            <h6 class="card-text">Samsung</h6>
                        </div>
                    </td>
                    <td>1</td>
                    <td>499.99€</td>
                    <td>
                        <a href="#" class="thumbnail">
                            <i class="far fa-times-circle fa-2x ml-4"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <th scope="row" colspan="5" class="text-right">Shipping Costs: 0.00 €</th>
                </tr>
                <tr>
                    <th scope="row" colspan="5" class="text-right">TOTAL PURCHASE: 1499.97 €</th>
                </tr>
            </tbody>
        </table>

        <div class="d-flex">
            <div class="p-2 bd-highlight">
                <button type="button" class="btn btn-primary bg-white text-primary">Continue shopping</button>
            </div>
            <div class="ml-auto p-2 bd-highlight">
                <button type="button" class="btn btn-primary">Proceed with purchase</button>
            </div>
        </div>
    </div>


</div>
<?php draw_footer(); ?>