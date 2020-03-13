<?php
include_once('header.php');
include_once('navbar.php');
include_once('tabs.php');
include_once('jumbo_title.php');
include_once('footer.php');

  draw_header();
  draw_navbar();
  draw_tabs();
  draw_jumbo('wishlists');
  ?>

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
        <button type="button" class="btn btn-small btn-primary mx-2 px-3"><i class="fas fa-euro-sign"></i></button>
        <button type="button" class="btn btn-small btn-primary mx-2"><i class="fas fa-cart-arrow-down"></i></button>
        <p class="py-3"><a href="#" class="card-link text-danger "><b>Remove from wishlist</b></a></p>
      </div>
    </div>
  </div>
</div>


<?php
draw_footer();
?>