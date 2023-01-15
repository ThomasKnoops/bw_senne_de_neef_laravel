<x-layout-default title="FAQ">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">FAQ Categories</div>
                    <div class="card-body">
                        <div class="accordion">
                            <!-- foreach faq cat -->
                            @foreach($categories as $category)
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq_{{$category->id}}">
                                            {{$category->name}}
                                        </button>
                                    </h2>
                                    <div id="faq_{{$category->id}}" class="accordion-collapse collapse">
                                        <div class="accordion-body">
                                            <div class="accordion">
                                                <!-- foreach faq cat question-->
                                                <strong>Questions:</strong>
                                                @foreach($category->questions as $question)
                                                    <div class="accordion-item">
                                                        <h3 class="accordion-header">
                                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqq_{{$question->id}}">
                                                                {{$question->question}}
                                                            </button>
                                                        </h3>
                                                        <div id="faqq_{{$question->id}}" class="accordion-collapse collapse">
                                                            <div class="accordion-body">
                                                                {{$question->answer}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq_contact">
                                        Gebruikersvragen
                                    </button>
                                </h2>
                                <div id="faq_contact" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <div class="accordion">
                                            <!-- foreach faq cat question-->
                                            <strong>Questions:</strong>
                                            @foreach($contacts as $question)
                                                <div class="accordion-item">
                                                    <h3 class="accordion-header">
                                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqc_{{$question->id}}">
                                                            {{$question->question}}
                                                        </button>
                                                    </h3>
                                                    <div id="faqc_{{$question->id}}" class="accordion-collapse collapse">
                                                        <div class="accordion-body">
                                                            {{$question->answer}}!
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-layout-default>
