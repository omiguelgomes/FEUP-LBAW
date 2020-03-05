<?php
include_once('navbar.php');
include_once('footer.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
</head>

<body>
    <div class="container">

        <!-- Navbar -->
        <?php draw_navbar(); ?>

        <div class="row-form">
            <form>
                <h3 class="text-center">Profile Page</h3>
                <div class="d-flex flex-row-reverse bd-highlight">
                    <button type="button" class="btn btn-small btn-primary"><i class="far fa-edit"></i></button>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <img src="../assets/profilepadrao.jpg" class="rounded mx-auto d-block" alt="imagempadrao" width="150" height="150">
                        <br>
                        <div class="custom-file">
                            <input type="image" class="custom-file-input" id="validatedCustomFile" required disabled>
                            <label class="custom-file-label" for="validatedCustomFile">Choose a new image</label>
                            <div class="invalid-feedback">Example invalid custom file feedback</div>
                        </div>

                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" placeholder="joaopaulo_n@hotmail.com" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Password</label>
                        <input type="password" class="form-control" id="inputPassword4" placeholder="**********" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAge">Age</label>
                        <input type="number" class="form-control" id="inputAge" placeholder="20" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Address</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="Rua da Igreja Velha 30" readonly>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">City</label>
                        <input type="text" class="form-control" id="inputCity" placeholder="Paredes" readonly>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputZip">Postal Code</label>
                        <input type="text" class="form-control" id="inputZip" placeholder="4580-113" readonly>
                    </div>
                </div>

                <br>
                <h5>Billing Data</h5>
                <br>

                <div class="form-group">
                    <label for="inputAddress">Address</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="Rua da Igreja Velha 30" readonly>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">City</label>
                        <input type="text" class="form-control" id="inputCity" placeholder="Paredes" readonly>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputZip">Postal Code</label>
                        <input type="text" class="form-control" id="inputZip" placeholder="4580-113" readonly>
                    </div>
                </div>

                <button type="button" class="btn btn-primary" disabled>Change</button>

            </form>
        </div>
    </div>

    <?php
    draw_footer();  
?>