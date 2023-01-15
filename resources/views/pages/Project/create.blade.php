<x-layout-default title="Create Project">

    <!-- $table->string('title');
        $table->text('content');
        $table->text('thumbnail');
        $table->text('cover');
    !-->

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="mt-5">
        <div class="text-center h4 fw-semibold">
            Creating a New Project
            <hr/>
        </div>

    <form action="{{route('project.store')}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        <div class="row mb-3">
            <label class="col-md-4 col-form-label text-md-end">Project Title:</label>
            <div class="col-md-6">
                <input class="form-control" type="text" name="project_title" minlength="2" maxlength="255" required>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-md-4 col-form-label text-md-end">Project Content:</label>
            <div class="col-md-6">
                <textarea class="form-control" style="resize: none" rows="8" name="project_content" minlength="20" maxlength="472" required></textarea>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-md-4 col-form-label text-md-end">Project Thumbnail:</label>
            <div class="col-md-6">
                <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" name="project_thumbnail" value="{{ old('thumbnail') }}" required accept=".png">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-md-4 col-form-label text-md-end">Project Cover:</label>
            <div class="col-md-6">
                <input type="file" class="form-control @error('cover') is-invalid @enderror" name="project_cover" value="{{ old('cover') }}" required accept=".png">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-md-4 col-form-label text-md-end"></label>
            <div class="col-md-6">
                <input class="form-control btn btn-primary" type="submit" value="Submit Project">
            </div>
        </div>
    </form>
    </div>
</x-layout-default>
