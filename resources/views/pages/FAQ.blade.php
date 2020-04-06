 @extends('layouts.pageWrapper')
 @section('content')  

 @include('partials.jumboTitle',['title' => 'FAQ'])

<div class="container">

    <div class="table-overflow">

        <div class="d-flex">
            <div class="p-4">
                <h5>How do I track my order?</h5>
            </div>
            <div class="p-4">
                <button class="btn btn-primary bg-white border-white" type="button" data-toggle="collapse" data-target="#FAQs1" aria-expanded="false" aria-controls="FAQs1">
                    <i class="fas fa-sort-down"></i>
                </button>
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
                <button class="btn btn-primary bg-white border-white" type="button" data-toggle="collapse" data-target="#FAQs2" aria-expanded="false" aria-controls="FAQs2">
                    <i class="fas fa-sort-down"></i>
                </button>
            </div>
       
        </div>

        <div class="collapse" id="FAQs2">
            <p>Generally our international parcels will arrive within 7 working days. However if your parcels tracking ID begins with RML, we advise that you allow up to 2 weeks to account for any postal delays within your country. Please note that UK Bank Holidays, Saturday and Sunday are not classed as working days.</p>
        </div>


        <div class="d-flex">
            <div class="p-4">
                <h5>What do I do if there is a problem with my delivery?</h5>
            </div>
            <div class="p-4">
                <button class="btn btn-primary bg-white border-white" type="button" data-toggle="collapse" data-target="#FAQs3" aria-expanded="false" aria-controls="FAQs3">
                    <i class="fas fa-sort-down"></i>
                </button>
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
                <button class="btn btn-primary bg-white border-white" type="button" data-toggle="collapse" data-target="#FAQs5" aria-expanded="false" aria-controls="FAQs5">
                    <i class="fas fa-sort-down"></i>
                </button>
            </div>
        </div>

        <div class="collapse" id="FAQs5">
            <p>We want to make sure that you are safe and secure when you are shopping with us online. As part of our commitment to this, we perform random checks on orders and this means that you may need to prove your identity. Customers will be contacted by phone or email and will have up to 24 hours to provide us with the required information.</p>
        </div>
    </div>

</div>

<style>
    .fa-sort-down {
        color: blue;
    }
</style>
@endsection