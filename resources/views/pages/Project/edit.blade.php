<x-layout-default title="Edit Project">

    <form method="POST" action="{{ route('project.update.thumbnail', $project->id) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row mb-3">
            <label class="col-md-4 col-form-label text-md-end">Current Thumbnail:</label>
            <div class="col-md-6">
                <input id="avatar" type="file" class="form-control @error('project_thumbnail') is-invalid @enderror" name="project_thumbnail" value="{{ old('project_thumbnail') }}" required autocomplete="project_thumbnail">
                <img src="/assets/project/{{$project->thumbnail}}" style="width:80px;margin-top: 10px;">
                @error('project_thumbnail')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror


                <div class="mb-3">
                    <input class="form-control btn btn-primary" type="submit" value="Update Thumnail">
                </div>
            </div>
        </div>
    </form>

    <form method="POST" action="{{ route('project.update.cover', $project->id) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row mb-3">
            <label class="col-md-4 col-form-label text-md-end">Current Cover:</label>
            <div class="col-md-6">
                <input id="avatar" type="file" class="form-control @error('project_cover') is-invalid @enderror" name="project_cover" value="{{ old('project_cover') }}" required autocomplete="project_cover">
                <img src="/assets/project/{{$project->cover}}" style="width:80px;margin-top: 10px;">
                @error('project_cover')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror


                <div class="mb-3">
                    <input class="form-control btn btn-primary" type="submit" value="Update Cover">
                </div>
            </div>
        </div>
    </form>

    <form action="{{route('project.update', $project->id)}}" method="POST">
        @method('PUT')
        @csrf

        <div class="row mb-3">
            <label class="col-md-4 col-form-label text-md-end">Project Title:</label>
            <div class="col-md-6">
                <input class="form-control" type="text" name="project_title" minlength="2" maxlength="255" required value="{{$project->title}}">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-md-4 col-form-label text-md-end">Project Content::</label>
            <div class="col-md-6">
                <textarea class="form-control" style="resize: none" rows="8" name="project_content" minlength="2" maxlength="472" required>{{$project->content}}</textarea>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-md-4 col-form-label text-md-end"></label>
            <div class="col-md-6">
                <input class="form-control btn btn-primary" type="submit" value="Update Project">
            </div>
        </div>
    </form>
</x-layout-default>
