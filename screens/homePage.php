<?php
    include_once('navbar.php');
    include_once('tabs.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>First Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        
        <!-- Navbar -->
        <?php draw_navbar(); ?>    

        <!--tabs-->
        <?php draw_tabs(); ?>

        <div class="row-12 py-3">
            <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-interval="2000"
                data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="../assets/user.svg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="../assets/shopping-cart.svg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="../assets/search.svg" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="row-12">
            <div class="btn-group d-flex">
                <div class="btn-group w-75 px-3">
                    <button type="button" class="btn btn-secondary w-100">New</button>
                </div>
                <div class="btn-group w-75 px-3">
                    <button type="button" class="btn btn-secondary w-100">Promotions</button>
                </div>
            </div>
        </div>
        <div class="row-12">
            <div class="container">
                <div class="row py-3">
                    <div class="col-4">
                        <div class="card">
                            <img class="card-img-top" src="../assets/smartphone.svg" alt="Card image cap">
                            <div class="card-body justify-content-center">
                                <h5 class="card-title">Phone</h5>
                                <p class="card-text">Quick description of the phone in place.</p>
                                <a href="#" class="btn btn-secondary w-75">See</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <img class="card-img-top" src="../assets/smartphone.svg" alt="Card image cap">
                            <div class="card-body justify-content-center">
                                <h5 class="card-title">Phone</h5>
                                <p class="card-text">Quick description of the phone in place.</p>
                                <a href="#" class="btn btn-secondary w-75">See</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <img class="card-img-top" src="../assets/smartphone.svg" alt="Card image cap">
                            <div class="card-body justify-content-center">
                                <h5 class="card-title">Phone</h5>
                                <p class="card-text">Quick description of the phone in place.</p>
                                <a href="#" class="btn btn-secondary w-75">See</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row-12">
            <div class="container">
                <div class="row py-3">
                    <div class="col-4">
                        <div class="card">
                            <img class="card-img-top" src="../assets/smartphone.svg" alt="Card image cap">
                            <div class="card-body justify-content-center">
                                <h5 class="card-title">Phone</h5>
                                <p class="card-text">Quick description of the phone in place.</p>
                                <a href="#" class="btn btn-secondary w-75">See</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <img class="card-img-top" src="../assets/smartphone.svg" alt="Card image cap">
                            <div class="card-body justify-content-center">
                                <h5 class="card-title">Phone</h5>
                                <p class="card-text">Quick description of the phone in place.</p>
                                <a href="#" class="btn btn-secondary w-75">See</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <img class="card-img-top" src="../assets/smartphone.svg" alt="Card image cap">
                            <div class="card-body justify-content-center">
                                <h5 class="card-title">Phone</h5>
                                <p class="card-text">Quick description of the phone in place.</p>
                                <a href="#" class="btn btn-secondary w-75">See</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

</body>

<!-- Make carousel indicators and controls black -->
<style>
    .carousel-control-next,
    .carousel-control-prev,
    .carousel-indicators {
        filter: invert(100%);
    }
</style>

</html>