<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="new" role="tabpanel" aria-labelledby="new-tab">
        <div class="row no-gutters row-cols-xs-5 row-cols-sm-4 row-col-md-3 row-col-lg-2 text-center">

            <?php for ($col = 0; $col < $phoneNr; $col++) {?>

                <div class="col-<?=12/$colNr?>">
                    <div class="card width-100 mx-1 my-1">
                        <img class="card-img-top" src="{{ asset('/images/s20Ultra1.png') }}" alt="Card image cap">
                        <div class="card-body justify-content-center">
                            <h5 class="card-title">Phone</h5>
                            <p class="card-text">Quick description of the phone in place.</p>
                            <a href="#" class="btn btn-secondary w-75">See</a>
                        </div>
                    </div>
                </div>

            <?php }?>

        </div>
    </div>
</div>