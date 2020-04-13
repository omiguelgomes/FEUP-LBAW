 @extends('layouts.pageWrapper')
 @section('content')  

 @include('partials.jumboTitle',['title' => 'FAQ'])

<div class="container">

    <div class="table-overflow">
        <?php $questionNr = 5; 
            for($nr = 0; $nr < $questionNr; $nr++) { ?>
            @include('partials.FAQCard', ['question' => 'How do I track my order?', 'answer' =>
            'All orders despatched with DPD are now trackable. Tracking updates will be provided by our delivery partner, with the links to follow your parcel. If your tracking number begins with RML, unfortunately, we are unable to track these parcels at present. Most parcels will reach their destination within 2 weeks, however, some destinations may require additional time allowed for parcels to arrive. As most parcels will reach their destination within 2 weeks, we are unable to query your parcel before this time. If this time has passed and you have still not received your parcel please contact our Customer Care Team.', 
            'questionID' => $nr])
        <?php } ?>
        
    </div>

</div>

@endsection