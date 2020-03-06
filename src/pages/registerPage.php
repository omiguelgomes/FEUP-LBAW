<?php
include_once('header.php');
include_once('navbar.php');
include_once('jumbo_title.php');
include_once('footer.php');

    draw_header();
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