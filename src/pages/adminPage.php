<?php
include_once('header.php');
include_once('navbar.php');
include_once('jumbo_title.php');
include_once('footer.php');

draw_header();
draw_navbar();
draw_jumbo('Admin Page');
?>

<div class="container">

    <div class="d-flex">
        <div class="mr-auto p-2">
            <h4>Admin Accounts</h4>
        </div>
        <div class="p-2"> <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#adminsAccounts" aria-expanded="false" aria-controls="adminsAccounts">
                <i class="fas fa-sort-down"></i>
            </button>
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
                        <th>Email</th>
                        <th>Id</th>
                        <th>Telefone</th>
                        <th>Url</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>devo@flexomat.com</th>
                        <td>66672</td>
                        <td>941-964-8535</td>
                        <td>http://gmail.com</td>
                    </tr>

                    <tr>
                        <th>henry@mountdev.net</th>
                        <td>35889</td>
                        <td>941-964-9543</td>
                        <td>http://dotnet.ca</td>
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