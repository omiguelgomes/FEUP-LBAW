<?php
include_once('header.php');
include_once('navbar.php');
include_once('jumbo_title.php');
include_once('footer.php');

draw_header();
draw_navbar();
draw_jumbo('Admin Page');
?>

<link rel="stylesheet" href="../css/admin.css">

<div class="container">

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