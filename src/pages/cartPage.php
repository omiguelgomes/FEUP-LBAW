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
                        <th scope="col">Products</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Remove</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="container mx-auto py-3">
                                <div class="card text-center" style="width: 14rem;">
                                    <div id="carouselExampleIndicators" class="carousel slide py-3" data-ride="carousel">
                                        <ol class="carousel-indicators w-25" style="filter:invert(100%); margin: auto;">
                                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                        </ol>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="../assets/tele1.jpg" class="d-block w-50 h-50" alt="..." style="margin: auto;">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="../assets/tele1.jpg" class="d-block w-50 h-50" alt="..." style="margin: auto;">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="../assets/tele1.jpg" class="d-block w-50 h-50" alt="..." style="margin: auto;">
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev" style="filter:invert(100%)">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next" style="filter:invert(100%)">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <div class="container">
                                            <h5 class="card-title">Samsung Galaxy S5</h5>
                                            <h6 class="card-text">Samsung</h6>
                                            <p><b>499.99€</b></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </td>
                        <td>1</td>
                        <td>
                            <a href="#" class="thumbnail">
                                <i class="far fa-times-circle fa-3x ml-4"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="container mx-auto py-3">
                                <div class="card text-center" style="width: 14rem;">
                                    <div id="carouselExampleIndicators" class="carousel slide py-3" data-ride="carousel">
                                        <ol class="carousel-indicators w-25" style="filter:invert(100%); margin: auto;">
                                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                        </ol>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="../assets/tele1.jpg" class="d-block w-50 h-50" alt="..." style="margin: auto;">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="../assets/tele1.jpg" class="d-block w-50 h-50" alt="..." style="margin: auto;">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="../assets/tele1.jpg" class="d-block w-50 h-50" alt="..." style="margin: auto;">
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev" style="filter:invert(100%)">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next" style="filter:invert(100%)">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <div class="container">
                                            <h5 class="card-title">Samsung Galaxy S5</h5>
                                            <h6 class="card-text">Samsung</h6>
                                            <p><b>499.99€</b></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </td>
                        <td>1</td>
                        <td>
                            <a href="#" class="thumbnail">
                                <i class="far fa-times-circle fa-3x ml-4"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="container mx-auto py-3">
                                <div class="card text-center" style="width: 14rem;">
                                    <div id="carouselExampleIndicators" class="carousel slide py-3" data-ride="carousel">
                                        <ol class="carousel-indicators w-25" style="filter:invert(100%); margin: auto;">
                                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                        </ol>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="../assets/tele1.jpg" class="d-block w-50 h-50" alt="..." style="margin: auto;">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="../assets/tele1.jpg" class="d-block w-50 h-50" alt="..." style="margin: auto;">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="../assets/tele1.jpg" class="d-block w-50 h-50" alt="..." style="margin: auto;">
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev" style="filter:invert(100%)">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next" style="filter:invert(100%)">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <div class="container">
                                            <h5 class="card-title">Samsung Galaxy S5</h5>
                                            <h6 class="card-text">Samsung</h6>
                                            <p><b>499.99€</b></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </td>
                        <td>1</td>
                        <td>
                            <a href="#" class="thumbnail">
                                <i class="far fa-times-circle fa-3x ml-4"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" colspan="3" class="text-right">Shipping Costs: 0.00 €</th>
                    </tr>
                    <tr>
                        <th scope="row" colspan="3" class="text-right">TOTAL PURCHASE: 1499.97 €</th>
                    </tr>
                </tbody>
            </table>

            <div class="d-flex">
                <div class="p-2 bd-highlight">
                    <button type="button" class="btn btn-primary">Continue shopping</button>
                </div>
                <div class="ml-auto p-2 bd-highlight">
                    <button type="button" class="btn btn-primary">Proceed with purchase</button>
                </div>
            </div>
        </div>


    </div>
    <?php draw_footer(); ?>