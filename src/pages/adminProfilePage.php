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
            <h3>Management</h3>
        </div>
        <div class="p-2"> <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#Management" aria-expanded="false" aria-controls="Management">
                <i class="fas fa-sort-down"></i>
            </button>
        </div>
       
    </div>

    <div class="collapse" id="Management">
    <br>

        <!-- Admin Accounts -->

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
                            <th>Discount</th>
                            <th>Date</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
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