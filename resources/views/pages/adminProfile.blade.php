@extends('layouts.pageWrapper')
@section('content')

<link rel="stylesheet" href="{{ asset('/css/search.css') }}">
<link rel="stylesheet" href="{{ asset('/css/adminPartials.css') }}">

{{-- main page row --}}
<div class="container" id="adminPageContainer">
    <div class="row">
        <div class="col-12">
            <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Sections</span>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="modal-confirm"
                                data-dismiss="modal">Confirm</button>
                            <button type="button" class="btn btn-danger" id="modal-cancel" data-dismiss="modal"
                                aria-label="Close">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- main page col, where specs stuff will show when selected --}}
        <div class=" col-12" id="mainContainer">
        </div>
    </div>
</div>
<div class="container" style="display: none;">
    @include('partials.adminPartials.clientAccounts', ['clients', $clients])
    @include('partials.adminPartials.adminAccounts', ['admins', $admins])
    @include('partials.adminPartials.orders', ['orders', $orders])
    @include('partials.adminPartials.products', ['products', $products])
    @include('partials.adminPartials.sales', ['sales', $sales])
    @include('partials.adminPartials.brands', ['brands', $brands])
    @include('partials.adminPartials.cpus', ['cpu', $cpu])
    @include('partials.adminPartials.rams', ['ram', $ram])
    @include('partials.adminPartials.waters', ['water', $water])
    @include('partials.adminPartials.oss', ['os', $os])
    @include('partials.adminPartials.gpus', ['gpu', $gpu])
    @include('partials.adminPartials.screensizes', ['screen', $screen])
    @include('partials.adminPartials.weights', ['weight', $weight])
    @include('partials.adminPartials.storages', ['storage', $storage])
    @include('partials.adminPartials.batteries', ['battery', $battery])
    @include('partials.adminPartials.screenress', ['screenRes', $screenRes])
    @include('partials.adminPartials.banners', ['banners', $banners])
    @include('partials.adminPartials.faqs', ['faqs', $faqs])
    @include('partials.adminPartials.cameraress', ['cams', $cams])
    @include('partials.adminPartials.fingerprints', ['fingers', $fingers])
</div>

{{-- sidenav, offscreen --}}
<div id="mySidenav" class="sidenav" style="z-index: 3;">{{--z-index to show this on top of pagination--}}
    <h1 class="pl-3">
        Options
    </h1>
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div class="row w-100 pl-4 pr-1">
        <div class="accordion w-100" id="accordionExample">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne"
                            aria-expanded="true" aria-controls="collapseOne">
                            Accounts
                        </button>
                    </h5>
                </div>

                <div id="collapseOne" class="collapse show active" aria-labelledby="headingOne"
                    data-parent="#accordionExample">
                    <div class="card-body">
                        <ul>
                            <li>
                                <button class="btn btn-link" id="userAccountsButton">
                                    User Accounts
                                </button>
                            </li>
                            <li>
                                <button class="btn btn-link" id="adminAccountsButton">
                                    Admin Accounts
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                            data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Orders
                        </button>
                    </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                        <button class="btn btn-link" id="ordersButton">
                            Orders
                        </button>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingThree">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                            data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Products
                        </button>
                    </h5>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                        <ul>
                            <li>
                                <button class="btn btn-link" id="productsButton">
                                    Products
                                </button>
                            </li>
                            <li>
                                <button class="btn btn-link" id="salesButton">
                                    Sales
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingFour">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                            data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            Brands and specifications
                        </button>
                    </h5>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                    <div class="card-body">
                        <ul>
                            <li>
                                <button class="btn btn-link" id="brandsButton">
                                    Brands
                                </button>
                            </li>
                            <li>
                                <button class="btn btn-link" id="cpusButton">
                                    CPU
                                </button>
                            </li>
                            <li>
                                <button class="btn btn-link" id="ramsButton">
                                    RAM
                                </button>
                            </li>
                            <li>
                                <button class="btn btn-link" id="watersButton">
                                    Water Resistance
                                </button>
                            </li>
                            <li>
                                <button class="btn btn-link" id="ossButton">
                                    OS
                                </button>
                            </li>
                            <li>
                                <button class="btn btn-link" id="gpusButton">
                                    GPU
                                </button>
                            </li>
                            <li>
                                <button class="btn btn-link" id="screensizesButton">
                                    Screen Size
                                </button>
                            </li>
                            <li>
                                <button class="btn btn-link" id="weightsButton">
                                    Weight
                                </button>
                            </li>
                            <li>
                                <button class="btn btn-link" id="storagesButton">
                                    Storage
                                </button>
                            </li>
                            <li>
                                <button class="btn btn-link" id="batteriesButton">
                                    Battery Size
                                </button>
                            </li>
                            <li>
                                <button class="btn btn-link" id="screenressButton">
                                    Screen Resolution
                                </button>
                            </li>
                            <li>
                                <button class="btn btn-link" id="cameraressButton">
                                    Camera Resolution
                                </button>
                            </li>
                            <li>
                                <button class="btn btn-link" id="fingerprintsButton">
                                    Fingerprint Types
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingFive">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                            data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            Other
                        </button>
                    </h5>
                </div>
                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                    <div class="card-body">
                        <ul>
                            <li>
                                <button class="btn btn-link" id="faqsButton">
                                    FAQs
                                </button>
                            </li>
                            <li>
                                <button class="btn btn-link" id="bannersButton">
                                    Banners
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="{{ URL::asset('js/adminPage.js') }}"></script>
@endsection