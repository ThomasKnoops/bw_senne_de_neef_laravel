<x-layout-default title="Contact">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Contact Form:</div>
                <div class="card-body">
                    <form action="{{route('contact.store')}}" method="POST">
                        @csrf

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">Email:</label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="email">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">Question:</label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="question">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end"></label>
                            <div class="col-md-6">
                                <button type="submit" class="form-control btn btn-primary">Submit Question</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</x-layout-default>
