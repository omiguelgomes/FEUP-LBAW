<div class="d-flex">
    <div class="p-4">
        <h5><?= $question ?></h5>
    </div>
    <div class="p-4">
        <button class="btn btn-primary bg-primary" type="button" data-toggle="collapse"
            data-target="#FAQs<?= $questionID ?>" aria-expanded="false" aria-controls="FAQs<?= $questionID ?>">
            <i class="fas fa-sort-down" style="color: white;"> </i>
        </button>
    </div>
</div>

<div class="collapse" id="FAQs<?= $questionID ?>">
    <p class="pl-4">{{$answer}}</p>
</div>