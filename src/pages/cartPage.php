<?php
include_once('navbar.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
</head>

<body>
    <div class="container">

        

        <h3 class="text-center">Carrinho</h3>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Produtos</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Remover</th>
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
                    <th scope="row" colspan="3" class="text-right">Portes de Envio: 0.00 €</th>
                </tr>
                <tr>
                    <th scope="row" colspan="3" class="text-right">Total de Compra: 1499.97 €</th>
                </tr>
            </tbody>
        </table>

        <div class="d-flex flex-row bd-highlight mb-3">
            <div class="p-2 bd-highlight">
                <button type="button" class="btn btn-primary">Continuar a comprar</button>
            </div>
            <div class="ml-auto p-2 bd-highlight">
                <button type="button" class="btn btn-primary">Prosseguir com a compra</button>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>