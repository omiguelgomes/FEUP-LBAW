 @extends('layouts.pageWrapper')
 @section('content')  

 @include('partials.jumboTitle',['title' => 'FAQ'])

<div class="container">
    <div class="table-overflow">
        @if(count($faqs) > 0)
            @foreach($faqs as $faq)
                @include('partials.FAQCard', ['question' => $faq->question, 'answer' => $faq->answer, 'questionID' => $faq->id])
            @endforeach
        @else
            <h1>No questions at the moment</h1>
        @endif
    
    </div>
</div>

@endsection