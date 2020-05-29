<script type="text/javascript" src="{{ URL::asset('js/faq.js') }}" defer></script>
<div id="faqs">
    <!-- FAQS -->
    <br>
    <div class="d-flex p-3 mb-2 bg-light text-dark">
        <div class="p-2">
            <h4>FAQs</h4>
        </div>
    </div>
    <div class="table-overflow">
        <form method="POST" action="{{ route('create_faq') }}" class="faqForm" enctype="multipart/form-data">
            <input type="text" class="form-control w-75 mx-auto mb-2" placeholder="FAQ Title" id="question"
                name="question" maxlength=100>
            <textarea name="answer" class="form-control w-75 mx-auto mb-2" id="answer" cols="20" rows="9"
                placeholder="FAQ Answer"></textarea>
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
                    <button class="btn btn-primary bg-white border-white" type="button" data-toggle=""
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
            <div class="" id="faq-{{$faq->id}}">
                <textarea name="answer" class="form-control w-75" id="answer-{{$faq->id}}" cols="20"
                    rows="9">{{$faq->answer}}</textarea>
            </div>
        </div>
        @endforeach
    </div>
</div>