<x-layout-default title="Admin Dashboard - Category Create">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create a new FAQ category:</div>
                <div class="card-body">
                    <form action="{{route('faq.category.store')}}" method="POST">
                        @csrf

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">Category:</label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="category_name">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end"></label>
                            <div class="col-md-6">
                                <button type="submit" class="form-control btn btn-primary">Add Category to FAQ</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</x-layout-default>
