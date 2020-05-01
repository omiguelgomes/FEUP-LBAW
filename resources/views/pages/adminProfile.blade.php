@extends('layouts.pageWrapper')
@section('content')

@include('partials.jumboTitle',['title' => 'Admin Page'])

<link rel="stylesheet" href="{{ asset('/css/admin.css') }}">

<div class="container">

    <div class="row-form">
        <form>
            <div class="d-flex">
                <div class="p-1">
                    <h3>Personal Information</h3>
                </div>
                <div class="ml-auto p-1"><button type="button" class="btn btn-small btn-primary"><i
                            class="far fa-edit"></i></button></div>
            </div>
            <br>

            <div class="form-row">
                <div class="form-group col-md-4 text-center">
                    <br><br>
                    <img src="{{ asset('/images/profilepadrao.jpg') }}" class="rounded mx-auto d-block"
                        alt="imagempadrao" width="150" height="150">
                    <a href="#" class="">Change Photo</a>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email<a class="text-danger">*</a></label>
                    <input type="email" class="form-control" id="inputEmail4" placeholder="{{$user->email}}" readonly>
                    <br>
                    <label for="inputPassword4">Password<a class="text-danger">*</a></label>
                    <input type="password" class="form-control" id="inputPassword4" placeholder="**********" readonly>
                    <br>
                    <label for="inputAge">Birth date</label>
                    <input type="number" class="form-control" id="inputAge" placeholder="{{$user->birthdate}}" readonly>
                </div>
            </div>
            <a class="text-danger">* Campos Obrigatórios</a>
            <br><br>
            <button type="button" class="btn btn-primary" disabled>Change</button>&nbsp;&nbsp;
            <a class="text-danger align-middle" href="#"> Delete Account</a>

        </form>
    </div>
    <br>

    <!--------------------- MANAGEMENT ----------------------------->

    <br>

    <div class="btn-group btn-group-lg w-100 pb-5" role="group" aria-label="Basic example">
        <button type="button" class="btn btn-secondary" data-toggle="collapse" data-target="#accounts">Accounts</button>
        <button type="button" class="btn btn-secondary" data-toggle="collapse" data-target="#orders">Orders</button>
        <button type="button" class="btn btn-secondary" data-toggle="collapse" data-target="#products">Products</button>
        <button type="button" class="btn btn-secondary" data-toggle="collapse" data-target="#brandsandspecs">Brands and Specifications</button>
        <button type="button" class="btn btn-secondary" data-toggle="collapse" data-target="#other">Other</button>
    </div>
    <br>

    <!-- Client Accounts -->
    <div class="collapse" id="accounts">
    <div class="d-flex p-3 mb-2 bg-light text-dark">
        <div class="p-2">
            <h4>Client Accounts</h4>
        </div>
        <div class="p-2"> <button class="btn btn-primary bg-light border-light" type="button" data-toggle="collapse"
                data-target="#clientAccounts" aria-expanded="true" aria-controls="clientAccounts">
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
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>João Nunes</td>
                        <td>joaon@mail.com</td>
                        <td><a href="#" class="thumbnail">
                                <i class="far fa-times-circle fa-2x ml-4"></i></a>
                            <a href="#" class="thumbnail">
                                <i class="fas fa-pencil-alt fa-2x ml-2"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>João Riberio</td>
                        <td>joaor@mail.com</td>
                        <td><a href="#" class="thumbnail">
                                <i class="far fa-times-circle fa-2x ml-4"></i></a>
                            <a href="#" class="thumbnail">
                                <i class="fas fa-pencil-alt fa-2x ml-2"></i>
                            </a> </td>
                    </tr>
                    <tr>
                        <td>Eduardo Campos</td>
                        <td>eduardoc@mail.com</td>
                        <td><a href="#" class="thumbnail">
                                <i class="far fa-times-circle fa-2x ml-4"></i>
                            </a>
                            <a href="#" class="thumbnail">
                                <i class="fas fa-pencil-alt fa-2x ml-2"></i>
                            </a> </td>
                    </tr>
                    <tr>
                        <td>Miguel Gomes</td>
                        <td>miguelg@mail.com</td>
                        <td><a href="#" class="thumbnail">
                                <i class="far fa-times-circle fa-2x ml-4"></i>
                            </a>
                            <a href="#" class="thumbnail">
                                <i class="fas fa-pencil-alt fa-2x ml-2"></i>
                            </a> </td>
                    </tr>
                    <tr>
                        <td>João Nunes</td>
                        <td>joaon@mail.com</td>
                        <td><a href="#" class="thumbnail">
                                <i class="far fa-times-circle fa-2x ml-4"></i>
                            </a>
                            <a href="#" class="thumbnail">
                                <i class="fas fa-pencil-alt fa-2x ml-2"></i>
                            </a> </td>
                    </tr>
                    <tr>
                        <td>João Riberio</td>
                        <td>joaor@mail.com</td>
                        <td><a href="#" class="thumbnail">
                                <i class="far fa-times-circle fa-2x ml-4"></i>
                            </a>
                            <a href="#" class="thumbnail">
                                <i class="fas fa-pencil-alt fa-2x ml-2"></i>
                            </a> </td>
                    </tr>
                    <tr>
                        <td>Eduardo Campos</td>
                        <td>eduardoc@mail.com</td>
                        <td><a href="#" class="thumbnail">
                                <i class="far fa-times-circle fa-2x ml-4"></i>
                            </a>
                            <a href="#" class="thumbnail">
                                <i class="fas fa-pencil-alt fa-2x ml-2"></i>
                            </a> </td>
                    </tr>
                    <tr>
                        <td>Miguel Gomes</td>
                        <td>miguelg@mail.com</td>
                        <td><a href="#" class="thumbnail">
                                <i class="far fa-times-circle fa-2x ml-4"></i>
                            </a>
                            <a href="#" class="thumbnail">
                                <i class="fas fa-pencil-alt fa-2x ml-2"></i>
                            </a> </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

    <!-- Admin Accounts -->

    <br>
    <div class="d-flex p-3 mb-2 bg-light text-dark">
        <div class="p-2">
            <h4>Admin Accounts</h4>
        </div>
        <div class="p-2"> <button class="btn btn-primary bg-light border-light" type="button" data-toggle="collapse"
                data-target="#adminsAccounts" aria-expanded="false" aria-controls="adminsAccounts">
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
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>João Nunes</td>
                        <td>joaon@mail.com</td>
                        <td><a href="#" class="thumbnail">
                                <i class="far fa-times-circle fa-2x ml-4"></i>
                            </a>
                            <a href="#" class="thumbnail">
                                <i class="fas fa-pencil-alt fa-2x ml-2"></i>
                            </a> </td>
                        </td>

                    </tr>
                    <tr>
                        <td>João Riberio</td>
                        <td>joaor@mail.com</td>
                        <td><a href="#" class="thumbnail">
                                <i class="far fa-times-circle fa-2x ml-4"></i>
                            </a>
                            <a href="#" class="thumbnail">
                                <i class="fas fa-pencil-alt fa-2x ml-2"></i>
                            </a> </td>
                        </td>
                    </tr>
                    <tr>
                        <td>Eduardo Campos</td>
                        <td>eduardoc@mail.com</td>
                        <td><a href="#" class="thumbnail">
                                <i class="far fa-times-circle fa-2x ml-4"></i>
                            </a>
                            <a href="#" class="thumbnail">
                                <i class="fas fa-pencil-alt fa-2x ml-2"></i>
                            </a> </td>
                        </td>
                    </tr>
                    <tr>
                        <td>Miguel Gomes</td>
                        <td>miguelg@mail.com</td>
                        <td><a href="#" class="thumbnail">
                                <i class="far fa-times-circle fa-2x ml-4"></i>
                            </a>
                            <a href="#" class="thumbnail">
                                <i class="fas fa-pencil-alt fa-2x ml-2"></i>
                            </a> </td>
                        </td>
                    </tr>
                    <tr>
                        <td>João Nunes</td>
                        <td>joaon@mail.com</td>
                        <td><a href="#" class="thumbnail">
                                <i class="far fa-times-circle fa-2x ml-4"></i>
                            </a>
                            <a href="#" class="thumbnail">
                                <i class="fas fa-pencil-alt fa-2x ml-2"></i>
                            </a> </td>
                        </td>
                    </tr>
                    <tr>
                        <td>João Riberio</td>
                        <td>joaor@mail.com</td>
                        <td><a href="#" class="thumbnail">
                                <i class="far fa-times-circle fa-2x ml-4"></i>
                            </a>
                            <a href="#" class="thumbnail">
                                <i class="fas fa-pencil-alt fa-2x ml-2"></i>
                            </a> </td>
                        </td>
                    </tr>
                    <tr>
                        <td>Eduardo Campos</td>
                        <td>eduardoc@mail.com</td>
                        <td><a href="#" class="thumbnail">
                                <i class="far fa-times-circle fa-2x ml-4"></i>
                            </a>
                            <a href="#" class="thumbnail">
                                <i class="fas fa-pencil-alt fa-2x ml-2"></i>
                            </a> </td>
                        </td>
                    </tr>
                    <tr>
                        <td>Miguel Gomes</td>
                        <td>miguelg@mail.com</td>
                        <td><a href="#" class="thumbnail">
                                <i class="far fa-times-circle fa-2x ml-4"></i>
                            </a>
                            <a href="#" class="thumbnail">
                                <i class="fas fa-pencil-alt fa-2x ml-2"></i>
                            </a> </td>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
    </div>

    <!-- ORDERS -->

    <div class="collapse" id="orders">
    <div class="d-flex p-3 mb-2 bg-light text-dark">
        <div class="p-2">
            <h4>Orders</h4>
        </div>
        <div class="p-2"> <button class="btn btn-primary bg-light border-light" type="button" data-toggle="collapse"
                data-target="#tabelorders" aria-expanded="false" aria-controls="tabelorders">
                <i class="fas fa-sort-down"></i>
            </button>
        </div>

        <div class="ml-auto p-2">
            <button class="btn btn-primary" type="button"><i class="fas fa-plus"></i></button>

        </div>
    </div>

    <div class="collapse" id="tabelorders">

        <div class="form-group input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
            <input name="consulta" id="txt_consulta" placeholder="Search" type="text" class="form-control">
        </div>

        <div class="table-overflow">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th></th>
                        <th>User Email</th>
                        <th>Order ID</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="clickable">
                        <td>
                            <div class="row-fluid summary">
                                <button class="btn btn-primary bg-white border-white" data-toggle="collapse"
                                    data-target="#orderdetail">
                                    <i class="fas fa-sort-down"></i>
                                </button>
                            </div>
                        </td>
                        <td>joaoe@mail.com</td>
                        <td>001</td>
                        <td>2020-01-05</td>
                        <td>

                            <div class="input-group mb-3">
                                <select class="custom-select" id="inputGroupSelect01">
                                    <option>Choose...</option>
                                    <option value="1">Awaiting Payment</option>
                                    <option value="2">Processing</option>
                                    <option value="3">Shipped</option>
                                    <option selected value="4">Delivered</option>
                                </select>
                            </div>
                        </td>
                        <td>1299.00€</td>
                    </tr>
                    <tr id="orderdetail" class="collapse">
                        <td colspan="6">
                            <div class="row-fluid summary">
                                <a>1 - Samsung Galaxy S5 32GB - 499.99€ </a><br>
                                <a>2 - Samsung Galaxy S3 8GB - 799.01€ </a>
                            </div>
                    </tr>

                    <tr class="clickable">
                        <td>
                            <div class="row-fluid summary">
                                <button class="btn btn-primary bg-white border-white" data-toggle="collapse"
                                    data-target="#orderdetail2">
                                    <i class="fas fa-sort-down"></i>
                                </button>
                            </div>
                        </td>
                        <td>miguelp@mail.com</td>
                        <td>002</td>
                        <td>2020-02-05</td>
                        <td>

                            <div class="input-group mb-3">
                                <select class="custom-select" id="inputGroupSelect01">
                                    <option>Choose...</option>
                                    <option selected value="1">Awaiting Payment</option>
                                    <option value="2">Processing</option>
                                    <option value="3">Shipped</option>
                                    <option value="4">Delivered</option>
                                </select>
                            </div>
                        </td>
                        <td>299.00€</td>
                    </tr>
                    <tr id="orderdetail2" class="collapse">
                        <td colspan="6">
                            <div class="row-fluid summary">
                                <a>1 - Samsung Galaxy S5 32GB - 499.99€ </a><br>
                                <a>2 - Samsung Galaxy S10 32GB - 1500.99€ </a>
                            </div>
                    </tr>

                    <tr class="clickable">
                        <td>
                            <div class="row-fluid summary">
                                <button class="btn btn-primary bg-white border-white" data-toggle="collapse"
                                    data-target="#orderdetail3">
                                    <i class="fas fa-sort-down"></i>
                                </button>
                            </div>
                        </td>
                        <td>tiagok@mail.com</td>
                        <td>004</td>
                        <td>2020-03-15</td>
                        <td>

                            <div class="input-group mb-3">
                                <select class="custom-select" id="inputGroupSelect01">
                                    <option>Choose...</option>
                                    <option value="1">Awaiting Payment</option>
                                    <option value="2">Processing</option>
                                    <option selected value="3">Shipped</option>
                                    <option value="4">Delivered</option>
                                </select>
                            </div>
                        </td>
                        <td>1099.00€</td>
                    </tr>
                    <tr id="orderdetail3" class="collapse">
                        <td colspan="6">
                            <div class="row-fluid summary">
                                <a>1 - Samsung Galaxy S5 32GB - 499.99€ </a><br>
                                <a>2 - Samsung Galaxy S10 32GB - 1500.99€ </a>
                            </div>
                    </tr>

                    <tr class="clickable">
                        <td>
                            <div class="row-fluid summary">
                                <button class="btn btn-primary bg-white border-white" data-toggle="collapse"
                                    data-target="#orderdetail4">
                                    <i class="fas fa-sort-down"></i>
                                </button>
                            </div>
                        </td>
                        <td>joaop@mail.com</td>
                        <td>005</td>
                        <td>2020-01-25</td>
                        <td>

                            <div class="input-group mb-3">
                                <select class="custom-select" id="inputGroupSelect01">
                                    <option>Choose...</option>
                                    <option value="1">Awaiting Payment</option>
                                    <option selected value="2">Processing</option>
                                    <option value="3">Shipped</option>
                                    <option value="4">Delivered</option>
                                </select>
                            </div>
                        </td>
                        <td>852.00€</td>
                    </tr>
                    <tr id="orderdetail4" class="collapse">
                        <td colspan="6">
                            <div class="row-fluid summary">
                                <a>1 - Samsung Galaxy S5 32GB - 499.99€ </a><br>
                                <a>2 - Samsung Galaxy S10 32GB - 1500.99€ </a>
                            </div>
                    </tr>

                    <tr class="clickable">
                        <td>
                            <div class="row-fluid summary">
                                <button class="btn btn-primary bg-white border-white" data-toggle="collapse"
                                    data-target="#orderdetail5">
                                    <i class="fas fa-sort-down"></i>
                                </button>
                            </div>
                        </td>
                        <td>pedrop@mail.com</td>
                        <td>006</td>
                        <td>2020-01-08</td>
                        <td>

                            <div class="input-group mb-3">
                                <select class="custom-select" id="inputGroupSelect01">
                                    <option>Choose...</option>
                                    <option selected value="1">Awaiting Payment</option>
                                    <option value="2">Processing</option>
                                    <option value="3">Shipped</option>
                                    <option value="4">Delivered</option>
                                </select>
                            </div>
                        </td>
                        <td>699.00€</td>
                    </tr>
                    <tr id="orderdetail5" class="collapse">
                        <td colspan="6">
                            <div class="row-fluid summary">
                                <a>1 - Samsung Galaxy S5 32GB - 499.99€ </a><br>
                                <a>2 - Samsung Galaxy S10 32GB - 1500.99€ </a>
                            </div>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    </div>

    <!-- Manage Products -->
    <div class="collapse" id="products">
    <div class="d-flex p-3 mb-2 bg-light text-dark">

        <div class="mr-auto p-2">
            <h4>Manage Products</h4>
        </div>
        <div class="p-2">
            <a class="nav-item nav-link" href="#">
                <img src="{{ asset('/images/search.svg') }}" width="30" height="30" alt="">
            </a>
        </div>

        <div class="p-2">
            <a href="{{ url('/admin/product/add') }}">
                <button class="btn btn-primary" type="button"><i class="fas fa-plus"></i></button>
            </a>
        </div>
    </div>

    <!-- Sales -->

    <br>
    <div class="d-flex p-3 mb-2 bg-light text-dark">
        <div class="p-2">
            <h4>Sales</h4>
        </div>
        <div class="p-2"> <button class="btn btn-primary bg-light border-light" type="button" data-toggle="collapse"
                data-target="#tabelsales" aria-expanded="false" aria-controls="tabelsales">
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
                                <i class="far fa-times-circle fa-2x ml-4"></i>
                            </a>
                            <a href="#" class="thumbnail">
                                <i class="fas fa-pencil-alt fa-2x ml-2"></i>
                            </a> </td>
                    </tr>
                    <tr>
                        <td>Samsung Galaxy S9</td>
                        <td>02</td>
                        <td>30%</td>
                        <td>2019-12-15</td>
                        <td><a href="#" class="thumbnail">
                                <i class="far fa-times-circle fa-2x ml-4"></i>
                            </a>
                            <a href="#" class="thumbnail">
                                <i class="fas fa-pencil-alt fa-2x ml-2"></i>
                            </a> </td>
                    </tr>
                    <tr>
                        <td>Iphone 11</td>
                        <td>03</td>
                        <td>0%</td>
                        <td>2019-12-08</td>
                        <td><a href="#" class="thumbnail">
                                <i class="far fa-times-circle fa-2x ml-4"></i>
                            </a>
                            <a href="#" class="thumbnail">
                                <i class="fas fa-pencil-alt fa-2x ml-2"></i>
                            </a> </td>
                    </tr>
                    <tr>
                        <td>Iphone 11 Pro Max</td>
                        <td>04</td>
                        <td>0%</td>
                        <td>2019-11-18</td>
                        <td><a href="#" class="thumbnail">
                                <i class="far fa-times-circle fa-2x ml-4"></i>
                            </a>
                            <a href="#" class="thumbnail">
                                <i class="fas fa-pencil-alt fa-2x ml-2"></i>
                            </a> </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    </div>

    <!-- BRANDS -->
    <div class="collapse" id="brandsandspecs">
    <a href="#brands"></a>
    <!--attemp at ancor link...-->
    <div class="d-flex p-3 mb-2 bg-light text-dark">
        <div class="p-2">
            <h4>Brands</h4>
        </div>
        <div class="p-2"> <button class="btn btn-primary bg-light border-light" type="button" data-toggle="collapse"
                data-target="#tabelbrands" aria-expanded="false" aria-controls="tabelbrands">
                <i class="fas fa-sort-down"></i>
            </button>
        </div>
    </div>

    <div class="collapse" id="tabelbrands">
        <div class="row-form">
            <form class="form-inline" method="POST" action="{{ route('create_brand') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-row col-md-4">
                    <input id="inputName" type="text" name="inputName" class="form-control ml-2" placeholder="Name"
                        required autofocus>
                    @if ($errors->has('inputName'))
                    <span class="error">
                        {{ $errors->first('inputName') }}
                    </span>
                    @endif
                </div>
                <div class="custom-file col-md-4">
                    <input type="file" class="custom-file-input" name="inputFile" id="inputFile" required>
                    <label class="custom-file-label" for="inputFile">Choose file</label>
                </div>
                <div class="form-row col-md-2  ml-auto p-2">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-plus"></i></button>
                </div>
            </form>
        </div>
        <br>
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
                    @foreach($brands as $id => $name)
                    <tr>
                        <td>{{$name}}</td>
                        <td><a href="{{ url('admin/brands/delete/'.$id) }}" class="thumbnail">
                                <i class="far fa-times-circle fa-2x ml-4"></i>
                            </a> </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <!-- CPU -->
    <div class="d-flex p-3 mb-2 bg-light text-dark">
        <div class="p-2">
            <h4>CPU Models</h4>
        </div>
        <div class="p-2"> <button class="btn btn-primary bg-light border-light" type="button" data-toggle="collapse"
                data-target="#tabelCPU" aria-expanded="false" aria-controls="tabelCPU">
                <i class="fas fa-sort-down"></i>
            </button>
        </div>
    </div>

    <div class="collapse" id="tabelCPU">
        <div class="row-form">
            <form class="form" method="POST" action="{{ route('create_cpu') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input id="inputName" type="text" name="inputName" class="form-control" placeholder="Name"
                            required autofocus>
                        @if ($errors->has('inputName'))
                        <span class="error">
                            {{ $errors->first('inputName') }}
                        </span>
                        @endif
                    </div>

                    <div class="form-group col-md-6">
                        <input id="inputFreq" type="number" step="0.01" name="inputFreq" class="form-control"
                            placeholder="Frequency" required autofocus>
                        @if ($errors->has('inputFreq'))
                        <span class="error">
                            {{ $errors->first('inputFreq') }}
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-row col-md-6">
                        <input id="inputCores" type="number" name="inputCores" class="form-control ml-1"
                            placeholder="Cores" required autofocus>
                        @if ($errors->has('inputCores'))
                        <span class="error">
                            {{ $errors->first('inputCores') }}
                        </span>
                        @endif
                    </div>

                    <div class="form-row col-md-6">
                        <input id="inputThreads" type="number" name="inputThreads" class="form-control ml-3"
                            placeholder="Threads" required autofocus>
                        @if ($errors->has('inputThreads'))
                        <span class="error">
                            {{ $errors->first('inputThreads') }}
                        </span>
                        @endif
                    </div>
                </div>
                <br>
                <div class="form-group text-center  p-10">
                    <button class="btn btn-block btn-primary" type="submit"><i class="fas fa-plus"></i></button>
                </div>
            </form>
        </div>
        <br>
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
                    @foreach($cpu as $id => $name)
                    <tr>
                        <td>{{$name}}</td>
                        <td><a href="{{ url('admin/cpu/delete/'.$id) }}" class="thumbnail">
                                <i class="far fa-times-circle fa-2x ml-4"></i>
                            </a> </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- RAM -->
    <div class="d-flex p-3 mb-2 bg-light text-dark">
        <div class="p-2">
            <h4>RAM Modules</h4>
        </div>
        <div class="p-2"> <button class="btn btn-primary bg-light border-light" type="button" data-toggle="collapse"
                data-target="#tabelRAM" aria-expanded="false" aria-controls="tabelRAM">
                <i class="fas fa-sort-down"></i>
            </button>
        </div>
    </div>

    <div class="collapse" id="tabelRAM">
        <div class="row-form">
            <form class="form-inline" method="POST" action="{{ route('create_ram') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input id="inputName" type="number" name="inputName" class="form-control"
                            placeholder="RAM amount" required autofocus>
                        @if ($errors->has('inputName'))
                        <span class="error">
                            {{ $errors->first('inputName') }}
                        </span>
                        @endif
                    </div>
                </div>
                <br>
                <div class="form-group ml-2">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-plus"></i></button>
                </div>
            </form>
        </div>
        <br>
        <div class="form-group input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
            <input name="consulta" id="txt_consulta" placeholder="Search" type="text" class="form-control">
        </div>

        <div class="table-overflow">
            <table id="tabela" class="table table-hover">
                <thead>
                    <tr>
                        <th>Value</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ram as $id => $name)
                    <tr>
                        <td>{{$name}}</td>
                        <td><a href="{{ url('admin/ram/delete/'.$id) }}" class="thumbnail">
                                <i class="far fa-times-circle fa-2x ml-4"></i>
                            </a> </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Water -->
    <div class="d-flex p-3 mb-2 bg-light text-dark">
        <div class="p-2">
            <h4>Water Resistance ratings</h4>
        </div>
        <div class="p-2"> <button class="btn btn-primary bg-light border-light" type="button" data-toggle="collapse"
                data-target="#tabelWater" aria-expanded="false" aria-controls="tabelWater">
                <i class="fas fa-sort-down"></i>
            </button>
        </div>
    </div>

    <div class="collapse" id="tabelWater">
        <div class="row-form">
            <form class="form-inline" method="POST" action="{{ route('create_water') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input id="inputName" type="text" name="inputName" class="form-control" placeholder="Rating"
                            required autofocus>
                        @if ($errors->has('inputName'))
                        <span class="error">
                            {{ $errors->first('inputName') }}
                        </span>
                        @endif
                    </div>
                </div>
                <br>
                <div class="form-group ml-2">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-plus"></i></button>
                </div>
            </form>
        </div>
        <br>
        <div class="form-group input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
            <input name="consulta" id="txt_consulta" placeholder="Search" type="text" class="form-control">
        </div>

        <div class="table-overflow">
            <table id="tabela" class="table table-hover">
                <thead>
                    <tr>
                        <th>Value</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($water as $id => $name)
                    <tr>
                        <td>{{$name}}</td>
                        <td><a href="{{ url('admin/water/delete/'.$id) }}" class="thumbnail">
                                <i class="far fa-times-circle fa-2x ml-4"></i>
                            </a> </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Water -->
    <div class="d-flex p-3 mb-2 bg-light text-dark">
        <div class="p-2">
            <h4>Operating Systems</h4>
        </div>
        <div class="p-2"> <button class="btn btn-primary bg-light border-light" type="button" data-toggle="collapse"
                data-target="#tabelOS" aria-expanded="false" aria-controls="tabelOS">
                <i class="fas fa-sort-down"></i>
            </button>
        </div>
    </div>

    <div class="collapse" id="tabelOS">
        <div class="row-form">
            <form class="form-inline" method="POST" action="{{ route('create_os') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input id="inputName" type="text" name="inputName" class="form-control"
                            placeholder="Operating System" required autofocus>
                        @if ($errors->has('inputName'))
                        <span class="error">
                            {{ $errors->first('inputName') }}
                        </span>
                        @endif
                    </div>
                </div>
                <br>
                <div class="form-group ml-2">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-plus"></i></button>
                </div>
            </form>
        </div>
        <br>
        <div class="form-group input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
            <input name="consulta" id="txt_consulta" placeholder="Search" type="text" class="form-control">
        </div>

        <div class="table-overflow">
            <table id="tabela" class="table table-hover">
                <thead>
                    <tr>
                        <th>Value</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($os as $id => $name)
                    <tr>
                        <td>{{$name}}</td>
                        <td><a href="{{ url('admin/os/delete/'.$id) }}" class="thumbnail">
                                <i class="far fa-times-circle fa-2x ml-4"></i>
                            </a> </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- GPU -->
    <div class="d-flex p-3 mb-2 bg-light text-dark">
        <div class="p-2">
            <h4>GPU Models</h4>
        </div>
        <div class="p-2"> <button class="btn btn-primary bg-light border-light" type="button" data-toggle="collapse"
                data-target="#tabelGPU" aria-expanded="false" aria-controls="tabelGPU">
                <i class="fas fa-sort-down"></i>
            </button>
        </div>
    </div>

    <div class="collapse" id="tabelGPU">
        <div class="row-form">
            <form class="form" method="POST" action="{{ route('create_gpu') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input id="inputName" type="text" name="inputName" class="form-control" placeholder="Name"
                            required autofocus>
                        @if ($errors->has('inputName'))
                        <span class="error">
                            {{ $errors->first('inputName') }}
                        </span>
                        @endif
                    </div>

                    <div class="form-group col-md-6">
                        <input id="inputVram" type="number" name="inputVram" class="form-control" placeholder="Vram"
                            required autofocus>
                        @if ($errors->has('inputVram'))
                        <span class="error">
                            {{ $errors->first('inputVram') }}
                        </span>
                        @endif
                    </div>
                </div>
                <br>
                <div class="form-group text-center  p-10">
                    <button class="btn btn-block btn-primary" type="submit"><i class="fas fa-plus"></i></button>
                </div>
            </form>
        </div>
        <br>
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
                    @foreach($gpu as $id => $name)
                    <tr>
                        <td>{{$name}}</td>
                        <td><a href="{{ url('admin/gpu/delete/'.$id) }}" class="thumbnail">
                                <i class="far fa-times-circle fa-2x ml-4"></i>
                            </a> </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Screen size -->
    <div class="d-flex p-3 mb-2 bg-light text-dark">
        <div class="p-2">
            <h4>Screen Size Types</h4>
        </div>
        <div class="p-2"> <button class="btn btn-primary bg-light border-light" type="button" data-toggle="collapse"
                data-target="#tabelSSize" aria-expanded="false" aria-controls="tabelSSize">
                <i class="fas fa-sort-down"></i>
            </button>
        </div>
    </div>

    <div class="collapse" id="tabelSSize">
        <div class="row-form">
            <form class="form-inline" method="POST" action="{{ route('create_screensize') }}"
                enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input id="inputName" type="number" step="0.01" name="inputName" class="form-control"
                            placeholder="Size" required autofocus>
                        @if ($errors->has('inputName'))
                        <span class="error">
                            {{ $errors->first('inputName') }}
                        </span>
                        @endif
                    </div>
                </div>
                <br>
                <div class="form-group ml-2">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-plus"></i></button>
                </div>
            </form>
        </div>
        <br>
        <div class="form-group input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
            <input name="consulta" id="txt_consulta" placeholder="Search" type="text" class="form-control">
        </div>

        <div class="table-overflow">
            <table id="tabela" class="table table-hover">
                <thead>
                    <tr>
                        <th>Value</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($screen as $id => $name)
                    <tr>
                        <td>{{$name}}</td>
                        <td><a href="{{ url('admin/screensize/delete/'.$id) }}" class="thumbnail">
                                <i class="far fa-times-circle fa-2x ml-4"></i>
                            </a> </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Weight -->
    <div class="d-flex p-3 mb-2 bg-light text-dark">
        <div class="p-2">
            <h4>Weight Values</h4>
        </div>
        <div class="p-2"> <button class="btn btn-primary bg-light border-light" type="button" data-toggle="collapse"
                data-target="#tabelWeight" aria-expanded="false" aria-controls="tabelWeight">
                <i class="fas fa-sort-down"></i>
            </button>
        </div>
    </div>

    <div class="collapse" id="tabelWeight">
        <div class="row-form">
            <form class="form-inline" method="POST" action="{{ route('create_weight') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input id="inputName" type="number" step="0.01" name="inputName" class="form-control"
                            placeholder="Size" required autofocus>
                        @if ($errors->has('inputName'))
                        <span class="error">
                            {{ $errors->first('inputName') }}
                        </span>
                        @endif
                    </div>
                </div>
                <br>
                <div class="form-group ml-2">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-plus"></i></button>
                </div>
            </form>
        </div>
        <br>
        <div class="form-group input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
            <input name="consulta" id="txt_consulta" placeholder="Search" type="text" class="form-control">
        </div>

        <div class="table-overflow">
            <table id="tabela" class="table table-hover">
                <thead>
                    <tr>
                        <th>Value</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($weight as $id => $name)
                    <tr>
                        <td>{{$name}}</td>
                        <td><a href="{{ url('admin/weight/delete/'.$id) }}" class="thumbnail">
                                <i class="far fa-times-circle fa-2x ml-4"></i>
                            </a> </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Storage -->
    <div class="d-flex p-3 mb-2 bg-light text-dark">
        <div class="p-2">
            <h4>Device Storage</h4>
        </div>
        <div class="p-2"> <button class="btn btn-primary bg-light border-light" type="button" data-toggle="collapse"
                data-target="#tabelStorage" aria-expanded="false" aria-controls="tabelStorage">
                <i class="fas fa-sort-down"></i>
            </button>
        </div>
    </div>

    <div class="collapse" id="tabelStorage">
        <div class="row-form">
            <form class="form-inline" method="POST" action="{{ route('create_storage') }}"
                enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input id="inputName" type="number" name="inputName" class="form-control" placeholder="Size"
                            required autofocus>
                        @if ($errors->has('inputName'))
                        <span class="error">
                            {{ $errors->first('inputName') }}
                        </span>
                        @endif
                    </div>
                </div>
                <br>
                <div class="form-group ml-2">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-plus"></i></button>
                </div>
            </form>
        </div>
        <br>
        <div class="form-group input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
            <input name="consulta" id="txt_consulta" placeholder="Search" type="text" class="form-control">
        </div>

        <div class="table-overflow">
            <table id="tabela" class="table table-hover">
                <thead>
                    <tr>
                        <th>Value</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($storage as $id => $name)
                    <tr>
                        <td>{{$name}}</td>
                        <td><a href="{{ url('admin/storage/delete/'.$id) }}" class="thumbnail">
                                <i class="far fa-times-circle fa-2x ml-4"></i>
                            </a> </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Battery -->
    <div class="d-flex p-3 mb-2 bg-light text-dark">
        <div class="p-2">
            <h4>Battery Size</h4>
        </div>
        <div class="p-2"> <button class="btn btn-primary bg-light border-light" type="button" data-toggle="collapse"
                data-target="#tabelBattery" aria-expanded="false" aria-controls="tabelBattery">
                <i class="fas fa-sort-down"></i>
            </button>
        </div>
    </div>

    <div class="collapse" id="tabelBattery">
        <div class="row-form">
            <form class="form-inline" method="POST" action="{{ route('create_battery') }}"
                enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input id="inputName" type="number" name="inputName" class="form-control" placeholder="Size"
                            required autofocus>
                        @if ($errors->has('inputName'))
                        <span class="error">
                            {{ $errors->first('inputName') }}
                        </span>
                        @endif
                    </div>
                </div>
                <br>
                <div class="form-group ml-2">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-plus"></i></button>
                </div>
            </form>
        </div>
        <br>
        <div class="form-group input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
            <input name="consulta" id="txt_consulta" placeholder="Search" type="text" class="form-control">
        </div>

        <div class="table-overflow">
            <table id="tabela" class="table table-hover">
                <thead>
                    <tr>
                        <th>Value</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($battery as $id => $name)
                    <tr>
                        <td>{{$name}}</td>
                        <td><a href="{{ url('admin/battery/delete/'.$id) }}" class="thumbnail">
                                <i class="far fa-times-circle fa-2x ml-4"></i>
                            </a> </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Screen Resolution -->
    <div class="d-flex p-3 mb-2 bg-light text-dark">
        <div class="p-2">
            <h4>Screen Resolution values</h4>
        </div>
        <div class="p-2"> <button class="btn btn-primary bg-light border-light" type="button" data-toggle="collapse"
                data-target="#tabelScreenRes" aria-expanded="false" aria-controls="tabelScreenRes">
                <i class="fas fa-sort-down"></i>
            </button>
        </div>
    </div>

    <div class="collapse" id="tabelScreenRes">
        <div class="row-form">
            <form class="form-inline" method="POST" action="{{ route('create_screenres') }}"
                enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input id="inputName" type="text" name="inputName" class="form-control" placeholder="Value"
                            required autofocus>
                        @if ($errors->has('inputName'))
                        <span class="error">
                            {{ $errors->first('inputName') }}
                        </span>
                        @endif
                    </div>
                </div>
                <br>
                <div class="form-group ml-2">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-plus"></i></button>
                </div>
            </form>
        </div>
        <br>
        <div class="form-group input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
            <input name="consulta" id="txt_consulta" placeholder="Search" type="text" class="form-control">
        </div>

        <div class="table-overflow">
            <table id="tabela" class="table table-hover">
                <thead>
                    <tr>
                        <th>Value</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($screenRes as $id => $name)
                    <tr>
                        <td>{{$name}}</td>
                        <td><a href="{{ url('admin/screenres/delete/'.$id) }}" class="thumbnail">
                                <i class="far fa-times-circle fa-2x ml-4"></i>
                            </a> </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Camera Resolution -->
    <div class="d-flex p-3 mb-2 bg-light text-dark">
        <div class="p-2">
            <h4>Camera Resolution values</h4>
        </div>
        <div class="p-2"> <button class="btn btn-primary bg-light border-light" type="button" data-toggle="collapse"
                data-target="#tabelCamRes" aria-expanded="false" aria-controls="tabelCamRes">
                <i class="fas fa-sort-down"></i>
            </button>
        </div>
    </div>

    <div class="collapse" id="tabelCamRes">
        <div class="row-form">
            <form class="form-inline" method="POST" action="{{ route('create_cam') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input id="inputName" type="number" name="inputName" class="form-control" placeholder="Value"
                            required autofocus>
                        @if ($errors->has('inputName'))
                        <span class="error">
                            {{ $errors->first('inputName') }}
                        </span>
                        @endif
                    </div>
                </div>
                <br>
                <div class="form-group ml-2">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-plus"></i></button>
                </div>
            </form>
        </div>
        <br>
        <div class="form-group input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
            <input name="consulta" id="txt_consulta" placeholder="Search" type="text" class="form-control">
        </div>

        <div class="table-overflow">
            <table id="tabela" class="table table-hover">
                <thead>
                    <tr>
                        <th>Value</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cams as $id => $name)
                    <tr>
                        <td>{{$name}}</td>
                        <td><a href="{{ url('admin/cam/delete/'.$id) }}" class="thumbnail">
                                <i class="far fa-times-circle fa-2x ml-4"></i>
                            </a> </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Fingerprints -->
    <div class="d-flex p-3 mb-2 bg-light text-dark">
        <div class="p-2">
            <h4>Fingerprint Types</h4>
        </div>
        <div class="p-2"> <button class="btn btn-primary bg-light border-light" type="button" data-toggle="collapse"
                data-target="#tabelFinger" aria-expanded="false" aria-controls="tabelFinger">
                <i class="fas fa-sort-down"></i>
            </button>
        </div>
    </div>

    <div class="collapse" id="tabelFinger">
        <div class="row-form">
            <form class="form-inline" method="POST" action="{{ route('create_finger') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input id="inputName" type="text" name="inputName" class="form-control" placeholder="Type"
                            required autofocus>
                        @if ($errors->has('inputName'))
                        <span class="error">
                            {{ $errors->first('inputName') }}
                        </span>
                        @endif
                    </div>
                </div>
                <br>
                <div class="form-group ml-2">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-plus"></i></button>
                </div>
            </form>
        </div>
        <br>
        <div class="form-group input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
            <input name="consulta" id="txt_consulta" placeholder="Search" type="text" class="form-control">
        </div>

        <div class="table-overflow">
            <table id="tabela" class="table table-hover">
                <thead>
                    <tr>
                        <th>Value</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($fingers as $id => $name)
                    <tr>
                        <td>{{$name}}</td>
                        <td><a href="{{ url('admin/finger/delete/'.$id) }}" class="thumbnail">
                                <i class="far fa-times-circle fa-2x ml-4"></i>
                            </a> </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>

    <!-- BANNER -->

    <div class="collapse" id="other">
    <div class="d-flex p-3 mb-2 bg-light text-dark">
        <div class="p-2">
            <h4>Banner</h4>
        </div>
        <div class="p-2"> <button class="btn btn-primary bg-light border-light" type="button" data-toggle="collapse"
                data-target="#banner" aria-expanded="false" aria-controls="banner">
                <i class="fas fa-sort-down"></i>
            </button>
        </div>

    </div>

    <div class="collapse" id="banner">

        <div class="row-12 py-3">

            <div class="row align-items-center justify-content-md-center">

                <div class="col-auto">
                    <button type="button" class="btn btn-primary">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>

                <div class="col-7">

                    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-interval="2000"
                        data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="{{ asset('/images/teste.jpg') }}" alt="First slide">
                                <a href="#" class="thumbnail-carousel">
                                    <i class="far fa-times-circle fa"></i>
                                </a>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('/images/teste.jpg') }}" alt="Second slide">
                                <a href="#" class="thumbnail-carousel">
                                    <i class="far fa-times-circle fa"></i>
                                </a>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('/images/teste.jpg') }}" alt="Third slide">
                                <a href="#" class="thumbnail-carousel">
                                    <i class="far fa-times-circle fa"></i>
                                </a>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>

                <div class="col-auto">
                    <button type="button" class="btn btn-primary">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>

            </div>
        </div>
    </div>

    <!-- FAQS -->

    <br>
    <div class="d-flex p-3 mb-2 bg-light text-dark">
        <div class="p-2">
            <h4>FAQs</h4>
        </div>
        <div class="p-2"> <button class="btn btn-primary bg-light border-light" type="button" data-toggle="collapse"
                data-target="#FAQs" aria-expanded="false" aria-controls="FAQs">
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
                    <button class="btn btn-primary bg-white border-white" type="button" data-toggle="collapse"
                        data-target="#FAQs1" aria-expanded="false" aria-controls="FAQs1">
                        <i class="fas fa-sort-down"></i>
                    </button>
                </div>
                <div class="ml-auto p-4">
                    <a href="#" class="thumbnail">
                        <i class="far fa-times-circle fa-2x"></i>
                    </a>
                    <a href="#" class="thumbnail">
                        <i class="fas fa-pencil-alt fa-2x ml-2"></i>
                    </a>
                </div>
            </div>

            <div class="collapse" id="FAQs1">
                <p>All orders despatched with DPD are now trackable. Tracking updates will be provided by our delivery
                    partner, with the links to follow your parcel. If your tracking number begins with RML,
                    unfortunately, we are unable to track these parcels at present. Most parcels will reach their
                    destination within 2 weeks, however, some destinations may require additional time allowed for
                    parcels to arrive. As most parcels will reach their destination within 2 weeks, we are unable to
                    query your parcel before this time. If this time has passed and you have still not received your
                    parcel please contact our Customer Care Team.</p>
            </div>


            <div class="d-flex">
                <div class="p-4">
                    <h5>How long will my order take to arrive?</h5>
                </div>
                <div class="p-4">
                    <button class="btn btn-primary bg-white border-white" type="button" data-toggle="collapse"
                        data-target="#FAQs2" aria-expanded="false" aria-controls="FAQs2">
                        <i class="fas fa-sort-down"></i>
                    </button>
                </div>
                <div class="ml-auto p-4">
                    <a href="#" class="thumbnail">
                        <i class="far fa-times-circle fa-2x"></i>
                    </a>
                    <a href="#" class="thumbnail">
                        <i class="fas fa-pencil-alt fa-2x ml-2"></i>
                    </a>
                </div>
            </div>

            <div class="collapse" id="FAQs2">
                <p>Generally our international parcels will arrive within 7 working days. However if your parcels
                    tracking ID begins with RML, we advise that you allow up to 2 weeks to account for any postal delays
                    within your country. Please note that UK Bank Holidays, Saturday and Sunday are not classed as
                    working days.</p>
            </div>


            <div class="d-flex">
                <div class="p-4">
                    <h5>What do I do if there is a problem with my delivery?</h5>
                </div>
                <div class="p-4">
                    <button class="btn btn-primary bg-white border-white" type="button" data-toggle="collapse"
                        data-target="#FAQs3" aria-expanded="false" aria-controls="FAQs3">
                        <i class="fas fa-sort-down"></i>
                    </button>
                </div>
                <div class="ml-auto p-4">
                    <a href="#" class="thumbnail">
                        <i class="far fa-times-circle fa-2x"></i>
                    </a>
                    <a href="#" class="thumbnail">
                        <i class="fas fa-pencil-alt fa-2x ml-2"></i>
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
                    <button class="btn btn-primary bg-white border-white" type="button" data-toggle="collapse"
                        data-target="#FAQs5" aria-expanded="false" aria-controls="FAQs5">
                        <i class="fas fa-sort-down"></i>
                    </button>
                </div>
                <div class="ml-auto p-4">
                    <a href="#" class="thumbnail">
                        <i class="far fa-times-circle fa-2x"></i>
                    </a>
                    <a href="#" class="thumbnail">
                        <i class="fas fa-pencil-alt fa-2x ml-2"></i>
                    </a>
                </div>
            </div>

            <div class="collapse" id="FAQs5">
                <p>We want to make sure that you are safe and secure when you are shopping with us online. As part of
                    our commitment to this, we perform random checks on orders and this means that you may need to prove
                    your identity. Customers will be contacted by phone or email and will have up to 24 hours to provide
                    us with the required information.</p>
            </div>


        </div>
    </div>
    </div>

</div>

{{-- NOT SURE IF THIS WORKS --}}
<!--for search bar-->
<script src="https://code.jquery.com/jquery-3.1.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.quicksearch/2.3.1/jquery.quicksearch.js"></script>


<script>
    $('input#txt_consulta').quicksearch('table#tabela tbody tr');


    $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>

<style>
    .fa-sort-down {
        color: blue;
    }
</style>

@endsection