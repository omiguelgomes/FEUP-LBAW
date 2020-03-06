<?php
include_once('navbar.php');
include_once('jumbo_title.php');
include_once('footer.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
</head>

<body>


    <!-- Navbar -->
    <?php
    draw_navbar();
    draw_jumbo('Register');
    ?>

    <div class="container">
        <div class="row-form">
            <form>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <img src="../assets/profilepadrao.jpg" class="rounded mx-auto d-block" alt="imagempadrao" width="150" height="150">
                        <br>
                        <div class="custom-file">
                            <input type="image" class="custom-file-input" id="validatedCustomFile">
                            <label class="custom-file-label" for="validatedCustomFile">Choose a new image</label>
                            <div class="invalid-feedback">Invalid file</div>
                        </div>

                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input type="email" class="form-control" id="inputEmail4">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Password</label>
                        <input type="password" class="form-control" id="inputPassword4">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAge">Age</label>
                        <input type="number" class="form-control" id="inputAge">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Address</label>
                    <input type="text" class="form-control" id="inputAddress">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">City</label>
                        <input type="text" class="form-control" id="inputCity">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputZip">Postal Code</label>
                        <input type="text" class="form-control" id="inputZip">
                    </div>
                </div>

                <br>
                <h5>Billing Data</h5>
                <br>

                <div class="form-group">
                    <label for="inputAddress">Address</label>
                    <input type="text" class="form-control" id="inputAddress">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">City</label>
                        <input type="text" class="form-control" id="inputCity">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputZip">Postal Code</label>
                        <input type="text" class="form-control" id="inputZip">
                    </div>
                </div>

                <button type="button" class="btn btn-primary">Create my account</button>


            </form>
        </div>
    </div>

    <?php
    draw_footer();
    ?>