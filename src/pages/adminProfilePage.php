<?php
include_once('header.php');
include_once('navbar.php');
include_once('jumbo_title.php');
include_once('footer.php');

draw_header();
draw_navbar();
draw_jumbo('Admin Profile Page');
?>

<link rel="stylesheet" href="../css/admin.css">

<div class="container">

    <div class="row-form">
        <form>
            <div class="d-flex">
                <div class="p-1">
                    <h3>Personal Information</h3>
                </div>
                <div class="ml-auto p-1"><button type="button" class="btn btn-small btn-primary"><i class="far fa-edit"></i></button></div>
            </div>
            <br>

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
            <button type="button" class="btn btn-primary" disabled>Change</button>
            <button type="button" class="btn btn-danger">Delete Account</button>

        </form>
    </div>
    <br>

    <!--------------------- MANAGEMENT ----------------------------->

    <br>
    <div class="d-flex">
        <div class="p-2">
            <h3>Management Area</h3>
        </div>
        <div class="p-2"> <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#Management" aria-expanded="false" aria-controls="Management">
                <i class="fas fa-sort-down"></i>
            </button>
        </div>

    </div>

    <div class="collapse" id="Management">
        <br>

        <!-- Client Accounts -->

        <div class="d-flex">
            <div class="p-2">
                <h4>Client Accounts</h4>
            </div>
            <div class="p-2"> <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#clientAccounts" aria-expanded="false" aria-controls="clientAccounts">
                    <i class="fas fa-sort-down"></i>
                </button>
            </div>

            <div class="ml-auto p-2">
                <button class="btn btn-primary" type="button"><i class="fas fa-plus"></i></button>

            </div>
        </div>

        <div class="collapse" id="clientAccounts">

            <div class="form-group input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                <input name="consulta" id="txt_consulta" placeholder="Search" type="text" class="form-control">
            </div>

            <div class="table-overflow">
                <table id="tabela" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>João Nunes</td>
                            <td>joaon@mail.com</td>
                            <td><a href="#" class="thumbnail">
                                    <i class="far fa-times-circle fa-3x ml-4"></i>
                                </a> </td>
                        </tr>
                        <tr>
                            <td>João Riberio</td>
                            <td>joaor@mail.com</td>
                            <td><a href="#" class="thumbnail">
                                    <i class="far fa-times-circle fa-3x ml-4"></i>
                                </a> </td>
                        </tr>
                        <tr>
                            <td>Eduardo Campos</td>
                            <td>eduardoc@mail.com</td>
                            <td><a href="#" class="thumbnail">
                                    <i class="far fa-times-circle fa-3x ml-4"></i>
                                </a> </td>
                        </tr>
                        <tr>
                            <td>Miguel Gomes</td>
                            <td>miguelg@mail.com</td>
                            <td><a href="#" class="thumbnail">
                                    <i class="far fa-times-circle fa-3x ml-4"></i>
                                </a> </td>
                        </tr>
                        <tr>
                            <td>João Nunes</td>
                            <td>joaon@mail.com</td>
                            <td><a href="#" class="thumbnail">
                                    <i class="far fa-times-circle fa-3x ml-4"></i>
                                </a> </td>
                        </tr>
                        <tr>
                            <td>João Riberio</td>
                            <td>joaor@mail.com</td>
                            <td><a href="#" class="thumbnail">
                                    <i class="far fa-times-circle fa-3x ml-4"></i>
                                </a> </td>
                        </tr>
                        <tr>
                            <td>Eduardo Campos</td>
                            <td>eduardoc@mail.com</td>
                            <td><a href="#" class="thumbnail">
                                    <i class="far fa-times-circle fa-3x ml-4"></i>
                                </a> </td>
                        </tr>
                        <tr>
                            <td>Miguel Gomes</td>
                            <td>miguelg@mail.com</td>
                            <td><a href="#" class="thumbnail">
                                    <i class="far fa-times-circle fa-3x ml-4"></i>
                                </a> </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

        <!-- Admin Accounts -->

        <br>
        <div class="d-flex">
            <div class="p-2">
                <h4>Admin Accounts</h4>
            </div>
            <div class="p-2"> <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#adminsAccounts" aria-expanded="false" aria-controls="adminsAccounts">
                    <i class="fas fa-sort-down"></i>
                </button>
            </div>

            <div class="ml-auto p-2">
                <button class="btn btn-primary" type="button"><i class="fas fa-plus"></i></button>

            </div>
        </div>

        <div class="collapse" id="adminsAccounts">

            <div class="form-group input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                <input name="consulta" id="txt_consulta" placeholder="Search" type="text" class="form-control">
            </div>

            <div class="table-overflow">
                <table id="tabela" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>João Nunes</td>
                            <td>joaon@mail.com</td>
                            <td><a href="#" class="thumbnail">
                                    <i class="far fa-times-circle fa-3x ml-4"></i>
                                </a> </td>
                        </tr>
                        <tr>
                            <td>João Riberio</td>
                            <td>joaor@mail.com</td>
                            <td><a href="#" class="thumbnail">
                                    <i class="far fa-times-circle fa-3x ml-4"></i>
                                </a> </td>
                        </tr>
                        <tr>
                            <td>Eduardo Campos</td>
                            <td>eduardoc@mail.com</td>
                            <td><a href="#" class="thumbnail">
                                    <i class="far fa-times-circle fa-3x ml-4"></i>
                                </a> </td>
                        </tr>
                        <tr>
                            <td>Miguel Gomes</td>
                            <td>miguelg@mail.com</td>
                            <td><a href="#" class="thumbnail">
                                    <i class="far fa-times-circle fa-3x ml-4"></i>
                                </a> </td>
                        </tr>
                        <tr>
                            <td>João Nunes</td>
                            <td>joaon@mail.com</td>
                            <td><a href="#" class="thumbnail">
                                    <i class="far fa-times-circle fa-3x ml-4"></i>
                                </a> </td>
                        </tr>
                        <tr>
                            <td>João Riberio</td>
                            <td>joaor@mail.com</td>
                            <td><a href="#" class="thumbnail">
                                    <i class="far fa-times-circle fa-3x ml-4"></i>
                                </a> </td>
                        </tr>
                        <tr>
                            <td>Eduardo Campos</td>
                            <td>eduardoc@mail.com</td>
                            <td><a href="#" class="thumbnail">
                                    <i class="far fa-times-circle fa-3x ml-4"></i>
                                </a> </td>
                        </tr>
                        <tr>
                            <td>Miguel Gomes</td>
                            <td>miguelg@mail.com</td>
                            <td><a href="#" class="thumbnail">
                                    <i class="far fa-times-circle fa-3x ml-4"></i>
                                </a> </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>






        <!-- BRANDS -->

        <br>
        <div class="d-flex">
            <div class="p-2">
                <h4>Brands</h4>
            </div>
            <div class="p-2"> <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#tabelbrands" aria-expanded="false" aria-controls="tabelbrands">
                    <i class="fas fa-sort-down"></i>
                </button>
            </div>

            <div class="ml-auto p-2">
                <button class="btn btn-primary" type="button"><i class="fas fa-plus"></i></button>

            </div>
        </div>

        <div class="collapse" id="tabelbrands">

            <div class="form-group input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                <input name="consulta" id="txt_consulta" placeholder="Search" type="text" class="form-control">
            </div>

            <div class="table-overflow">
                <table id="tabela" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Apple</td>
                            <td><a href="#" class="thumbnail">
                                    <i class="far fa-times-circle fa-3x ml-4"></i>
                                </a> </td>
                        </tr>
                        <tr>
                            <td>Samsung</td>
                            <td><a href="#" class="thumbnail">
                                    <i class="far fa-times-circle fa-3x ml-4"></i>
                                </a> </td>
                        </tr>
                        <tr>
                            <td>Huawei</td>
                            <td><a href="#" class="thumbnail">
                                    <i class="far fa-times-circle fa-3x ml-4"></i>
                                </a> </td>
                        </tr>
                        <tr>
                            <td>Asus</td>
                            <td><a href="#" class="thumbnail">
                                    <i class="far fa-times-circle fa-3x ml-4"></i>
                                </a> </td>
                        </tr>
                        <tr>
                            <td>Xiaomi</td>
                            <td><a href="#" class="thumbnail">
                                    <i class="far fa-times-circle fa-3x ml-4"></i>
                                </a> </td>
                        </tr>
                        <tr>
                            <td>Apple</td>
                            <td><a href="#" class="thumbnail">
                                    <i class="far fa-times-circle fa-3x ml-4"></i>
                                </a> </td>
                        </tr>
                        <tr>
                            <td>Samsung</td>
                            <td><a href="#" class="thumbnail">
                                    <i class="far fa-times-circle fa-3x ml-4"></i>
                                </a> </td>
                        </tr>
                        <tr>
                            <td>Huawei</td>
                            <td><a href="#" class="thumbnail">
                                    <i class="far fa-times-circle fa-3x ml-4"></i>
                                </a> </td>
                        </tr>
                        <tr>
                            <td>Asus</td>
                            <td><a href="#" class="thumbnail">
                                    <i class="far fa-times-circle fa-3x ml-4"></i>
                                </a> </td>
                        </tr>
                        <tr>
                            <td>Xiaomi</td>
                            <td><a href="#" class="thumbnail">
                                    <i class="far fa-times-circle fa-3x ml-4"></i>
                                </a> </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Specs -->

        <br>
        <div class="d-flex">
            <div class="p-2">
                <h4>Specifications</h4>
            </div>
            <div class="p-2"> <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#tabelspecs" aria-expanded="false" aria-controls="tabelspecs">
                    <i class="fas fa-sort-down"></i>
                </button>
            </div>

            <div class="ml-auto p-2">
                <button class="btn btn-primary" type="button"><i class="fas fa-plus"></i></button>

            </div>
        </div>

        <div class="collapse" id="tabelspecs">

            <div class="form-group input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                <input name="consulta" id="txt_consulta" placeholder="Search" type="text" class="form-control">
            </div>

            <div class="table-overflow">
                <table id="tabela" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Required</th>
                            <th>Type</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Ram</td>
                            <td><i class="fas fa-exclamation"></i></td>
                            <td>Slider</td>
                            <td><a href="#" class="thumbnail">
                                    <i class="far fa-times-circle fa-3x ml-4"></i>
                                </a> </td>
                        </tr>
                        <tr>
                            <td>Model</td>
                            <td>&nbsp;</td>
                            <td>Checkbox</td>
                            <td><a href="#" class="thumbnail">
                                    <i class="far fa-times-circle fa-3x ml-4"></i>
                                </a> </td>
                        </tr>
                        <tr>
                            <td>Color</td>
                            <td>&nbsp;</td>
                            <td>Checkbox</td>
                            <td><a href="#" class="thumbnail">
                                    <i class="far fa-times-circle fa-3x ml-4"></i>
                                </a> </td>
                        </tr>
                        <tr>
                            <td>Storage Capacity</td>
                            <td><i class="fas fa-exclamation"></i></td>
                            <td>Slider</td>
                            <td><a href="#" class="thumbnail">
                                    <i class="far fa-times-circle fa-3x ml-4"></i>
                                </a> </td>
                        </tr>
                        <tr>
                            <td>Price</td>
                            <td><i class="fas fa-exclamation"></i></td>
                            <td>Slider</td>
                            <td><a href="#" class="thumbnail">
                                    <i class="far fa-times-circle fa-3x ml-4"></i>
                                </a> </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Manage Products -->
        <br>
        <div class="d-flex">

            <div class="mr-auto p-2">
                <h4>Manage Products</h4>
            </div>
            <div class="p-2">
                <a class="nav-item nav-link" href="#">
                    <img src="../assets/search.svg" width="30" height="30" alt="">
                </a>
            </div>

            <div class="p-2">
                <button class="btn btn-primary" type="button"><i class="fas fa-plus"></i></button>

            </div>
        </div>

        <!-- Sales -->

        <br>
        <div class="d-flex">
            <div class="p-2">
                <h4>Sales</h4>
            </div>
            <div class="p-2"> <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#tabelsales" aria-expanded="false" aria-controls="tabelsales">
                    <i class="fas fa-sort-down"></i>
                </button>
            </div>

            <div class="ml-auto p-2">
                <button class="btn btn-primary" type="button"><i class="fas fa-plus"></i></button>

            </div>
        </div>

        <div class="collapse" id="tabelsales">

            <div class="form-group input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                <input name="consulta" id="txt_consulta" placeholder="Search" type="text" class="form-control">
            </div>

            <div class="table-overflow">
                <table id="tabela" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Product's Name</th>
                            <th>Product ID</th>
                            <th>Discount %</th>
                            <th>Date</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Samsung Galaxy S10</td>
                            <td>01</td>
                            <td>10%</td>
                            <td>2020-01-05</td>
                            <td><a href="#" class="thumbnail">
                                    <i class="far fa-times-circle fa-3x ml-4"></i>
                                </a> </td>
                        </tr>
                        <tr>
                            <td>Samsung Galaxy S9</td>
                            <td>02</td>
                            <td>30%</td>
                            <td>2019-12-15</td>
                            <td><a href="#" class="thumbnail">
                                    <i class="far fa-times-circle fa-3x ml-4"></i>
                                </a> </td>
                        </tr>
                        <tr>
                            <td>Iphone 11</td>
                            <td>03</td>
                            <td>0%</td>
                            <td>2019-12-08</td>
                            <td><a href="#" class="thumbnail">
                                    <i class="far fa-times-circle fa-3x ml-4"></i>
                                </a> </td>
                        </tr>
                        <tr>
                            <td>Iphone 11 Pro Max</td>
                            <td>04</td>
                            <td>0%</td>
                            <td>2019-11-18</td>
                            <td><a href="#" class="thumbnail">
                                    <i class="far fa-times-circle fa-3x ml-4"></i>
                                </a> </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- BANNER -->

        <br>
        <div class="d-flex">
            <div class="p-2">
                <h4>Banner</h4>
            </div>
            <div class="p-2"> <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#banner" aria-expanded="false" aria-controls="banner">
                    <i class="fas fa-sort-down"></i>
                </button>
            </div>

        </div>

        <div class="collapse" id="banner">

            <div class="row-12 py-3">
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
        </div>

        <!-- FAQS -->

        <br>
        <div class="d-flex">
            <div class="p-2">
                <h4>FAQs</h4>
            </div>
            <div class="p-2"> <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#FAQs" aria-expanded="false" aria-controls="FAQs">
                    <i class="fas fa-sort-down"></i>
                </button>
            </div>

            <div class="ml-auto p-2">
                <button class="btn btn-primary" type="button"><i class="fas fa-plus"></i></button>

            </div>
        </div>


        <div class="collapse" id="FAQs">
            <div class="table-overflow">

                <div class="d-flex">
                    <div class="p-4">
                        <h5>How do I track my order?</h5>
                    </div>
                    <div class="p-4">
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#FAQs1" aria-expanded="false" aria-controls="FAQs1">
                            <i class="fas fa-sort-down"></i>
                        </button>
                    </div>
                    <div class="ml-auto p-4">
                        <a href="#" class="thumbnail">
                            <i class="far fa-times-circle fa-2x"></i>
                        </a>
                    </div>
                </div>

                <div class="collapse" id="FAQs1">
                    <p>All orders despatched with DPD are now trackable. Tracking updates will be provided by our delivery partner, with the links to follow your parcel. If your tracking number begins with RML, unfortunately, we are unable to track these parcels at present. Most parcels will reach their destination within 2 weeks, however, some destinations may require additional time allowed for parcels to arrive. As most parcels will reach their destination within 2 weeks, we are unable to query your parcel before this time. If this time has passed and you have still not received your parcel please contact our Customer Care Team.</p>
                </div>


                <div class="d-flex">
                    <div class="p-4">
                        <h5>How long will my order take to arrive?</h5>
                    </div>
                    <div class="p-4">
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#FAQs2" aria-expanded="false" aria-controls="FAQs2">
                            <i class="fas fa-sort-down"></i>
                        </button>
                    </div>
                    <div class="ml-auto p-4">
                        <a href="#" class="thumbnail">
                            <i class="far fa-times-circle fa-2x"></i>
                        </a>
                    </div>
                </div>

                <div class="collapse" id="FAQs2">
                    <p>Generally our international parcels will arrive within 7 working days. However if  your parcels tracking ID begins with RML, we advise that you allow up to 2 weeks to account for any postal delays within your country. Please note that UK Bank Holidays, Saturday and Sunday are not classed as working days.</p>
                </div>


                <div class="d-flex">
                    <div class="p-4">
                        <h5>What do I do if there is a problem with my delivery?</h5>
                    </div>
                    <div class="p-4">
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#FAQs3" aria-expanded="false" aria-controls="FAQs3">
                            <i class="fas fa-sort-down"></i>
                        </button>
                    </div>
                    <div class="ml-auto p-4">
                        <a href="#" class="thumbnail">
                            <i class="far fa-times-circle fa-2x"></i>
                        </a>
                    </div>
                </div>

                <div class="collapse" id="FAQs3">
                    <p>Please contact our Customer Care team who are here to help with any problems.</p>
                </div>


                <div class="d-flex">
                    <div class="p-4">
                        <h5>What is your online security policy?</h5>
                    </div>
                    <div class="p-4">
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#FAQs5" aria-expanded="false" aria-controls="FAQs5">
                            <i class="fas fa-sort-down"></i>
                        </button>
                    </div>
                    <div class="ml-auto p-4">
                        <a href="#" class="thumbnail">
                            <i class="far fa-times-circle fa-2x"></i>
                        </a>
                    </div>
                </div>

                <div class="collapse" id="FAQs5">
                    <p>We want to make sure that you are safe and secure when you are shopping with us online. As part of our commitment to this, we perform random checks on orders and this means that you may need to prove your identity. Customers will be contacted by phone or email and will have up to 24 hours to provide us with the required information.</p>
                </div>


            </div>
        </div>

    </div>
</div>

<!--for search bar-->
<script src="https://code.jquery.com/jquery-3.1.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.quicksearch/2.3.1/jquery.quicksearch.js"></script>


<script>
    $('input#txt_consulta').quicksearch('table#tabela tbody tr');
</script>

<?php
draw_footer();
?>