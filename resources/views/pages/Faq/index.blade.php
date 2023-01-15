<x-layout-default title="FAQ">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">FAQ Categories</div>
                    <div class="card-body">
                        <div class="accordion">
                            <!-- foreach faq cat -->
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq_cat_00">
                                        Categorie 1
                                    </button>
                                </h2>
                                <div id="faq_cat_00" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <div class="accordion">
                                            <!-- foreach faq cat question-->
                                            <div class="accordion-item">
                                                <strong>Questions:</strong>
                                                <h3 class="accordion-header">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq_cat_00_q_00">
                                                        How does xxx work?
                                                    </button>
                                                </h3>
                                                <div id="faq_cat_00_q_00" class="accordion-collapse collapse">
                                                    <div class="accordion-body">
                                                        A: Magic!
                                                    </div>
                                                </div>
                                            </div>
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
