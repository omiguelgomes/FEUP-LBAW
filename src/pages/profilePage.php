<?php
include_once('header.php');
include_once('navbar.php');
include_once('jumbo_title.php');
include_once('footer.php');

draw_header();
draw_navbar();
draw_jumbo('Profile Page');
?>

<div class="container">
    <div class="row-form">
        <form>
            <div class="d-flex">
                <div class="p-1">
                    <h3>Personal Information</h3>
                </div>            
                <div class="ml-auto p-1"><button type="button" class="btn btn-small btn-primary"><i class="far fa-edit"></i></button></div>
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
            <button type="button" class="btn btn-danger">Delete Account</button>

        </form>
    </div>
</div>

<?php
draw_footer();
?>