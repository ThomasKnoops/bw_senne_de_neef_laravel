<x-layout-default title="Admin Dashboard - FAQ Question Create">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Creating News Article</div>
                <div class="card-body">
                    <form action="{{route('news.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf


                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">Image:</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" required autocomplete="image">
                            </div>
                        </div>



                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">Title:</label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="title">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">Content:</label>
                            <div class="col-md-6">
                                <textarea class="form-control" style="resize: none" rows="8" name="content" minlength="2" maxlength="472" required></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end"></label>
                            <div class="col-md-6">
                                <button type="submit" class="form-control btn btn-primary">Add News Article To Home page</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</x-layout-default>
