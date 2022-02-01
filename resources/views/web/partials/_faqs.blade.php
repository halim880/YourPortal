<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <h1 class="mt-0"><i class="mdi mdi-frequently-asked-questions"></i></h1>
                    <h3>Frequently Asked <span class="text-primary">Questions</span></h3>
                    <p class="text-muted mt-2">Here are some of the basic types of questions for our customers. For more 
                        <br>information please contact us.</p>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            @foreach ($faqs as $faq)
            <div class="col-lg-5 offset-lg-1">
                <div>
                    <div class="faq-question-q-box">Q.</div>
                    <h4 class="faq-question text-body">{{$faq->question}}</h4>
                    <p class="faq-answer mb-4 pb-1 text-muted"> {{$faq->answer}}</p>
                </div>                 
            </div>
            @endforeach
        </div>
        <!-- end row -->

    </div> <!-- end container-->
</section>