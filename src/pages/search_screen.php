<?php
include_once('header.php');

draw_header();
?>

<link rel="stylesheet" href="../css/sidebar.css">
<link rel="stylesheet" href="../css/filters.css">

<nav class="navbar navbar-expand-lg fixed-top shadow navbar-light ">
    <button class="navbar-toggler d-block" type="button" id="navToggle">
        <span class="navbar-toggler-icon"></span>
    </button>
    <form class="form-inline d-flex justify-content-center md-form form-sm mt-0">
        <input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search" aria-label="Search">
        <i class="fas fa-search" aria-hidden="true"></i>
    </form>
    <div class="navbar-collapse  offcanvas-collapse">
        <div class="row">
            <div class="col-md-4 col-lg-3">
                <div class="filters d-flex flex-column">
                    <h5>Filters</h5>
                    <h6>Brand</h6>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">
                            <p>Apple</p>
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">
                            <p>Samsung</p>
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">
                            <p>Google</p>
                        </label>
                    </div>
                    <h6>Storage</h6>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">
                            <p>256 GB</p>
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">
                            <p>128 GB</p>
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">
                            <p>64 GB</p>
                        </label>
                    </div>
                </div>
            </div>
        </div>
</nav>
<div class="container">
    <div class="row no-gutters row-cols-xs-5 row-cols-sm-4 row-col-md-3 row-col-lg-2 text-center">
        <div class="col mb-2">
            <div class="card" style="width: 10rem;">
                <img class="card-img-top" src="../assets/smartphone.svg" alt="Card image cap">
                <div class="card-body justify-content-center">
                    <h5 class="card-title">Phone</h5>
                    <p class="card-text">Quick description of the phone in place.</p>
                    <a href="#" class="btn btn-secondary w-75">See</a>
                </div>
            </div>
        </div>
        <div class="col mb-2">
            <div class="card" style="width: 10rem;">
                <img class="card-img-top" src="../assets/smartphone.svg" alt="Card image cap">
                <div class="card-body justify-content-center">
                    <h5 class="card-title">Phone</h5>
                    <p class="card-text">Quick description of the phone in place.</p>
                    <a href="#" class="btn btn-secondary w-75">See</a>
                </div>
            </div>
        </div>
        <div class="col mb-2">
            <div class="card" style="width: 10rem;">
                <img class="card-img-top" src="../assets/smartphone.svg" alt="Card image cap">
                <div class="card-body justify-content-center">
                    <h5 class="card-title">Phone</h5>
                    <p class="card-text">Quick description of the phone in place.</p>
                    <a href="#" class="btn btn-secondary w-75">See</a>
                </div>
            </div>
        </div>
        <div class="col mb-2">
            <div class="card" style="width: 10rem;">
                <img class="card-img-top" src="../assets/smartphone.svg" alt="Card image cap">
                <div class="card-body justify-content-center">
                    <h5 class="card-title">Phone</h5>
                    <p class="card-text">Quick description of the phone in place.</p>
                    <a href="#" class="btn btn-secondary w-75">See</a>
                </div>
            </div>
        </div>
        <div class="col mb-2">
            <div class="card" style="width: 10rem;">
                <img class="card-img-top" src="../assets/smartphone.svg" alt="Card image cap">
                <div class="card-body justify-content-center">
                    <h5 class="card-title">Phone</h5>
                    <p class="card-text">Quick description of the phone in place.</p>
                    <a href="#" class="btn btn-secondary w-75">See</a>
                </div>
            </div>
        </div>
        <div class="col mb-2">
            <div class="card" style="width: 10rem;">
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

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        console.log("document is ready");
        $('[data-toggle="offcanvas"], #navToggle').on('click', function() {
            $('.offcanvas-collapse').toggleClass('open')
        })
    });
    window.onload = function() {
        console.log("window is loaded");
    };
</script>
</body>

</html>