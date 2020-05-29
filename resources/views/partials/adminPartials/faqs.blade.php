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
        <div class="table-overflow">
            <h5>Create new FAQ</h5>
            <input type="text" class="form-control w-75 mb-2" placeholder="FAQ Title" id="faq-question" name="question"
                maxlength=100>
            <textarea name="answer" class="form-control w-75 mb-2" id="faq-answer" cols="20" rows="9"
                placeholder="FAQ Answer"></textarea>
            <div class="form-group text-center  p-10">
                <button class="btn btn-block btn-primary w-75 mt-2" type="submit" id="createFaq">Submit</button>
            </div>
            <div id="faq-container">
                @foreach($faqs as $faq)
                <div id="faq-{{$faq->id}}">
                    <div class="d-flex">
                        <div class="p-4">
                            <h5>{{$faq->question}}</h5>
                        </div>
                        <div class="p-4">
                            <button class="btn btn-primary bg-primary" type="button" data-toggle="collapse"
                                data-target="#FAQs<?= $faq->id ?>" aria-expanded="false"
                                aria-controls="FAQs<?= $faq->id ?>">
                                <i class="fas fa-sort-down" style="color: white;"> </i>
                            </button>
                        </div>
                    </div>

                    <div class="collapse" id="FAQs<?= $faq->id ?>">
                        <textarea name="answer" class="form-control w-75" id="answer-{{$faq->id}}" cols="20"
                            rows="9">{{$faq->answer}}</textarea>
                        <a class="faqDelete thumbnail" value="{{$faq->id}}">
                            Delete FAQ
                            <i class="far fa-times-circle text-danger fa-2x"></i>
                        </a>
                        <a class="faqUpdate thumbnail" value="{{$faq->id}}">
                            Update FAQ
                            <i class="fas fa-pencil-alt fa-2x ml-2"></i>
                        </a>
                    </div>

                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>