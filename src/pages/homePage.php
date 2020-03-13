<?php
include_once('header.php');
include_once('navbar.php');
include_once('tabs.php');
include_once('footer.php');

draw_header();
draw_navbar();
draw_tabs();
?>

<div class="row-12 py-3 p-4">
    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-interval="2000" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="../assets/teste.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="../assets/teste.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="../assets/teste.jpg" alt="Third slide">
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

<div class="container">


    <ul class="nav nav-pills nav-fill mb-3">
        <li class="nav-item">
            <a class="nav-link active" href="#">New</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Best-sellers</a>
        </li>
    </ul>

    

    <div class="row no-gutters row-cols-xs-5 row-cols-sm-4 row-col-md-3 row-col-lg-2 text-center">
        <div class="col mb-2">
            <div class="card" style="width: 10rem;">
                <img class="card-img-top" src="../assets/s20Ultra1.png" alt="Card image cap">
                <div class="card-body justify-content-center">
                    <h5 class="card-title">Phone</h5>
                    <p class="card-text">Quick description of the phone in place.</p>
                    <a href="#" class="btn btn-secondary w-75">See</a>
                </div>
            </div>
        </div>
        <div class="col mb-2">
            <div class="card" style="width: 10rem;">
                <img class="card-img-top" src="../assets/s20Ultra1.png" alt="Card image cap">
                <div class="card-body justify-content-center">
                    <h5 class="card-title">Phone</h5>
                    <p class="card-text">Quick description of the phone in place.</p>
                    <a href="#" class="btn btn-secondary w-75">See</a>
                </div>
            </div>
        </div>
        <div class="col mb-2">
            <div class="card" style="width: 10rem;">
                <img class="card-img-top" src="../assets/s20Ultra1.png" alt="Card image cap">
                <div class="card-body justify-content-center">
                    <h5 class="card-title">Phone</h5>
                    <p class="card-text">Quick description of the phone in place.</p>
                    <a href="#" class="btn btn-secondary w-75">See</a>
                </div>
            </div>
        </div>
        <div class="col mb-2">
            <div class="card" style="width: 10rem;">
                <img class="card-img-top" src="../assets/s20Ultra1.png" alt="Card image cap">
                <div class="card-body justify-content-center">
                    <h5 class="card-title">Phone</h5>
                    <p class="card-text">Quick description of the phone in place.</p>
                    <a href="#" class="btn btn-secondary w-75">See</a>
                </div>
            </div>
        </div>
        <div class="col mb-2">
            <div class="card" style="width: 10rem;">
                <img class="card-img-top" src="../assets/s20Ultra1.png" alt="Card image cap">
                <div class="card-body justify-content-center">
                    <h5 class="card-title">Phone</h5>
                    <p class="card-text">Quick description of the phone in place.</p>
                    <a href="#" class="btn btn-secondary w-75">See</a>
                </div>
            </div>
        </div>
        <div class="col mb-2">
            <div class="card" style="width: 10rem;">
                <img class="card-img-top" src="../assets/s20Ultra1.png" alt="Card image cap">
                <div class="card-body justify-content-center">
                    <h5 class="card-title">Phone</h5>
                    <p class="card-text">Quick description of the phone in place.</p>
                    <a href="#" class="btn btn-secondary w-75">See</a>
                </div>
            </div>
        </div>
    </div>

</div>

<?php
draw_footer();
?>

<!-- Make carousel indicators and controls black -->
<style>
    .carousel-control-next,
    .carousel-control-prev,
    .carousel-indicators {
        filter: invert(100%);
    }

    @media only screen and (max-width: 600px) {
        .carousel-item {
            width: 600px;
        }
    }
</style>

</html>