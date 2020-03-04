<?php
include_once('navbar.php');
include_once('tabs.php');
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

  <?php
  draw_navbar();
  draw_tabs();
  ?>

  <div class="jumbotron jumbotron-fluid">
    <div class="container text-center">
      <h1 class="display-4">Wishlist</h1>
    </div>
  </div>

  <div class="container mx-auto py-3">
    <div class="card text-center" style="width: 18rem;">
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
          <button type="button" class="btn btn-small btn-primary"><i class="fas fa-euro-sign"></i></button>
          <button type="button" class="btn btn-small btn-primary"><i class="fas fa-cart-arrow-down"></i></button>
          <p class="py-3"><a href="#" class="card-link text-danger "><b>Remove from wishlist</b></a></p>
        </div>
      </div>
    </div>
  </div>


  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>

</html>