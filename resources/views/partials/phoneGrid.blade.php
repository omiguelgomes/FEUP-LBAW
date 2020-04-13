<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="new" role="tabpanel" aria-labelledby="new-tab">
        <div class="row no-gutters">

            <?php for ($col = 0; $col < $phoneNr; $col++) {?>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2 ">
                    <div class="card mx-1 my-1">
                        <a href="{{ url('phone') }}" >
                        <img class="card-img-top" src="{{ asset('/images/s20Ultra1.png') }}" alt="Card image cap">
                        </a>
                        <div class="card-body justify-content-center">
                            <h5 class="card-title">Phone</h5>
                            <p class="card-text">Quick description of the phone in place.</p>
                            <a href="{{ url('phone') }}" class="btn btn-secondary w-75">See</a>
                        </div>
                    </div>
                </div>
            <?php }?>
            
        </div>
    </div>
</div>