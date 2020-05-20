@extends('layouts.pageWrapper')
@section('content')

<script type="text/javascript" src="{{ URL::asset('js/product.js') }}" defer></script>
<script type="text/javascript" src="{{ URL::asset('js/faq.js') }}" defer></script>
<script type="text/javascript" src="{{ URL::asset('js/banner.js') }}" defer></script>
<script type="text/javascript" src="{{ URL::asset('js/users.js') }}" defer></script>
<script type="text/javascript" src="{{ URL::asset('js/orders.js') }}" defer></script>
<script type="text/javascript" src="{{ URL::asset('js/brands.js') }}" defer></script>
<script type="text/javascript" src="{{ URL::asset('js/Specs/cpu.js') }}" defer></script>
<script type="text/javascript" src="{{ URL::asset('js/Specs/ram.js') }}" defer></script>

@include('partials.jumboTitle',['title' => 'Admin Page'])

<link rel="stylesheet" href="{{ asset('/css/admin.css') }}">

<div class="container">
    <div class="btn-group btn-group-lg w-100 pb-5" role="group" aria-label="Basic example">
        <button type="button" class="btn btn-secondary" data-toggle="collapse" data-target="#accounts"
            aria-expanded="true" aria-controls="accounts">Accounts</button>
        <button type="button" class="btn btn-secondary" data-toggle="collapse" data-target="#orders"
            aria-expanded="false" aria-controls="orders">Orders</button>
        <button type="button" class="btn btn-secondary" data-toggle="collapse" data-target="#products"
            aria-expanded="false" aria-controls="products">Products</button>
        <button type="button" class="btn btn-secondary" data-toggle="collapse" data-target="#brandsandspecs"
            aria-expanded="false" aria-controls="brandsandspecs">Brands and Specifications</button>
        <button type="button" class="btn btn-secondary" data-toggle="collapse" data-target="#other"
            aria-expanded="false" aria-controls="other">Other</button>
    </div>
    <br>

    <!--Accounts -->
    <div class="collapse show" id="accounts">
        <div class="d-flex p-3 mb-2 bg-light text-dark">
            <div class="p-2">
                <h4>Client Accounts</h4>
            </div>
        </div>
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
                        <th>Promote</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody class='userTableBody'>
                    @foreach($clients as $client)
                        @if($client->id != 1)
                            <tr class='client' id='client-{{$client->id}}'>
                                <td>{{$client->name}}</td>
                                <td>{{$client->email}}</td>
                                <td>
                                    <a class="userPromoter thumbnail" value='{{$client->id}}'>
                                        <i class="fas fa-pencil-alt fa-2x ml-2"></i>
                                    </a>
                                </td>
                                <td>
                                    <a value='{{$client->id}}' class="userDeleter thumbnail">
                                        <i class="far fa-times-circle fa-2x ml-4 text-danger"></i>
                                    </a> 
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Admin Accounts -->
        <br>
        <div class="d-flex p-3 mb-2 bg-light text-dark">
            <div class="p-2">
                <h4>Admin Accounts</h4>
            </div>
        </div>
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
                        <th>Demote</th>
                    </tr>
                </thead>
                <tbody class="adminTableBody">
                    @foreach($admins as $admin)
                    <tr class='admin' id='admin-{{$admin->id}}'>
                        <td>{{$admin->name}}</td>
                        <td>{{$admin->email}}</td>
                        <td>
                        <a class="userDemoter thumbnail" value='{{$admin->id}}'>
                                <i class="far fa-times-circle fa-2x ml-4"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- ORDERS -->
    <div class="collapse" id="orders">
        <div class="d-flex p-3 mb-2 bg-light text-dark">
            <div class="p-2">
                <h4>Orders</h4>
            </div>
        </div>
        <div class="form-group input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
            <input name="consulta" id="txt_consulta" placeholder="Search" type="text" class="form-control">
        </div>

        <div class="table-overflow">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>User Email</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr class="clickable">
                        <td>Order #{{$order->id}}</td>
                        <td>{{$order->user->email}}</td>
                        <td>{{$order->purchasedate}}</td>
                        <td>
                            <div class="input-group mb-3">
                                <select class="custom-select" id="order-{{$order->id}}">
                                    <option value="Awaiting Payment" <?php echo ($order->status->pstate == 'Awaiting Payment') ? "selected":""; ?> >
                                        Awaiting Payment
                                    </option>
                                    <option value="Payment in-store" <?php echo ($order->status->pstate == 'Payment in-store') ? "selected":""; ?> >
                                        Payment in-store
                                    </option>
                                    <option value="Processing" <?php echo ($order->status->pstate == 'Processing') ? "selected":""; ?> >
                                        Processing
                                    </option>
                                    <option value="Sent" <?php echo ($order->status->pstate == 'Sent') ? "selected":""; ?> >
                                        Sent
                                    </option>
                                    <option value="Delivered" <?php echo ($order->status->pstate == 'Delivered') ? "selected":""; ?> >
                                        Delivered
                                    </option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="ml-auto p-2">
                                <a class="purchaseUpdater thumbnail" value='{{$order->id}}'><i class="fas fa-pencil-alt fa-2x ml-2"></i></button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Manage Products -->
    <br>
    <div class="collapse" id="products">
        <div class="d-flex p-3 mb-2 bg-light text-dark">
            <div class="p-2">
                <h4>Manage Products</h4>
            </div>
            <div class="p-2"> <button class="btn btn-primary bg-light border-light" type="button" data-toggle="collapse"
                    data-target="#tabelProducts" aria-expanded="false" aria-controls="tabelProducts">
                    <i class="fas fa-sort-down"></i>
                </button>
            </div>
            <div class="ml-auto p-2">
                <a href="{{ url('/admin/product/add') }}">
                    <button class="btn btn-primary" type="button"><i class="fas fa-plus"></i></button>
                </a>
            </div>
        </div>

        <div class="collapse" id="tabelProducts">
            <br>
            <div class="form-group input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                <input name="consulta" id="txt_consulta" placeholder="Search" type="text" class="form-control">
            </div>

            <div class="table-overflow productContainer" id="productContainer">
                <table id="tabela" class="table table-hover productTable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Stock</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $item)
                        <tr id="product-{{$item->id}}">
                            <td>{{$item->model}}</td>
                            <td>
                                <form class="form-inline productForm" id="productFormID" method="POST"
                                    action="{{ url('admin/product/update/'.$item->id) }}">
                                    {{ csrf_field() }}
                                    <div class="form-row col-xs-2">
                                        <input id="inputStock" type="number" min="0" max="10000" name="inputStock"
                                            class="form-control productStock" value='{{ $item->stock }}' required
                                            autofocus>
                                        @if ($errors->has('inputStock'))
                                        <span class="error">
                                            {{ $errors->first('inputStock') }}
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-row p-2">
                                        <button class="btn btn-primary" type="submit"><i
                                                class="fas fa-plus"></i></button>
                                    </div>
                                </form>
                            </td>
                            <td><a value='{{$item->id}}' class="productDelete thumbnail">
                                    <i class="far fa-times-circle fa-2x ml-4"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Sales -->
        <br>
        <div class="d-flex p-3 mb-2 bg-light text-dark">
            <div class="p-2">
                <h4>Sales</h4>
            </div>

            <div class="ml-auto p-2">
                <button class="btn btn-primary" type="button"><i class="fas fa-plus"></i></button>

            </div>
        </div>

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

    <!--Brands and Specs area-->
    <div class="collapse" id="brandsandspecs">

        <!--Brands-->
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
                <form class="form-inline" method="POST" action="{{ route('create_brand') }}"
                    enctype="multipart/form-data">
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
                        <tr class="brand" id='brand-{{$id}}'>
                            <td>{{$name}}</td>
                            <td><a value="{{$id}}" class="brandDelete thumbnail">
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
                <form class="cpuForm form" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input id="inputCPUName" type="text" name="inputCPUName" class="form-control"
                                placeholder="Name" required autofocus>
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
                    <tbody class="cpuTableBody">
                        @foreach($cpu as $id => $name)
                        <tr class="cpu" id='cpu-{{$id}}'>
                            <td>{{$name}}</td>
                            <td><a value="{{$id}}" class="cpuDelete thumbnail">
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
                <form class="ramForm form-inline" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input id="inputRAMName" type="number" name="inputRAMName" class="form-control"
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
                    <tbody class="ramTableBody">
                        @foreach($ram as $id => $name)
                        <tr class="ram" id='ram-{{$id}}'>
                            <td>{{$name}}</td>
                            <td><a value="{{$id}}" class="ramDelete thumbnail">
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
                <h4>Water Resistance Ratings</h4>
            </div>
            <div class="p-2"> <button class="btn btn-primary bg-light border-light" type="button" data-toggle="collapse"
                    data-target="#tabelWater" aria-expanded="false" aria-controls="tabelWater">
                    <i class="fas fa-sort-down"></i>
                </button>
            </div>
        </div>

        <div class="collapse" id="tabelWater">
            <div class="row-form">
                <form class="form-inline" method="POST" action="{{ route('create_water') }}"
                    enctype="multipart/form-data">
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
                <form class="form-inline" method="POST" action="{{ route('create_weight') }}"
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
                <h4>Screen Resolution Values</h4>
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
                <h4>Camera Resolution Values</h4>
            </div>
            <div class="p-2"> <button class="btn btn-primary bg-light border-light" type="button" data-toggle="collapse"
                    data-target="#tabelCamRes" aria-expanded="false" aria-controls="tabelCamRes">
                    <i class="fas fa-sort-down"></i>
                </button>
            </div>
        </div>

        <div class="collapse" id="tabelCamRes">
            <div class="row-form">
                <form class="form-inline" method="POST" action="{{ route('create_cam') }}"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input id="inputName" type="number" name="inputName" class="form-control"
                                placeholder="Value" required autofocus>
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
                <form class="form-inline" method="POST" action="{{ route('create_finger') }}"
                    enctype="multipart/form-data">
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

        </div>
        <div class="row-12 py-3">
            <div class="row align-items-center justify-content-md-center">
                @foreach($banners as $banner)
                <form class="form-inline" method="POST" action="{{url('/admin/banner/update/'.$banner->id)}}"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="col-7 p-2 m-2">
                        <img id="img-{{$banner->id}}" class="d-block w-100" src="{{ asset('/images/'.$banner->image->path) }}" alt="banner image">
                        <input type="text" class="form-control w-75 mx-auto m-2" value="{{$banner->imgurl}}" 
                        placeholder="Image endpoint" id="imgurl" name="imgurl" maxlength=150>
                        <input type='file' id="{{$banner->id}}" onchange="readURL(this, this.id);" class="custom-file-input-2 m-2" name="inputFile"/>
                        <button type="submit" class="btn btn-primary">Submit image</button>                   
                    </div>
                </form>
                @endforeach
            </div>
        </div>

        <!-- FAQS -->
        <br>
        <div class="d-flex p-3 mb-2 bg-light text-dark">
            <div class="p-2">
                <h4>FAQs</h4>
            </div>
        </div>
        <div class="table-overflow">
            <form method="POST" action="{{ route('create_faq') }}" class="faqForm" enctype="multipart/form-data">
            {{ csrf_field() }}
                <input type="text" class="form-control w-75 mx-auto mb-2" placeholder="FAQ Title" id="question" name="question" maxlength=100>
                <textarea name="answer" class="form-control w-75 mx-auto mb-2" id="answer" cols="20" rows="9" placeholder="FAQ Answer"></textarea>
                <div class="form-group text-center  p-10">
                    <button class="btn btn-block btn-primary w-75 mx-auto mt-2" type="submit">Submit</button>
                </div>
            </form>
            @foreach($faqs as $faq)
            <div id="faq-{{$faq->id}}">
                <div class="d-flex">
                    <div class="p-4">
                        <h5>{{$faq->question}}</h5>
                    </div>
                    <div class="p-4">
                        <button class="btn btn-primary bg-white border-white" type="button" data-toggle="collapse"
                            data-target="#faq-{{$faq->id}}" aria-expanded="false" aria-controls="faq-{{$faq->id}}">
                            <i class="fas fa-sort-down"></i>
                        </button>
                    </div>
                    <div class="ml-auto p-4">
                        <a class="faqDelete thumbnail" value="{{$faq->id}}">
                            <i class="far fa-times-circle fa-2x"></i>
                        </a>
                        <a class="faqUpdate thumbnail" value="{{$faq->id}}">
                            <i class="fas fa-pencil-alt fa-2x ml-2"></i>
                        </a>
                    </div>
                </div>
                <div class="collapse" id="faq-{{$faq->id}}">
                        <textarea name="answer" class="form-control w-75" id="answer-{{$faq->id}}" cols="20" rows="9">{{$faq->answer}}</textarea>
                </div>
            </div>
            @endforeach
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