<x-layout-default title="Edit Profile">

    <form method="POST" action="{{ route('profile.update.avatar') }}" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <label for="avatar" class="col-md-4 col-form-label text-md-end">Current Avatar</label>
            <div class="col-md-6">
                <input id="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" name="profile_avatar" value="{{ old('avatar') }}" required autocomplete="avatar">
                <img src="/assets/profile/{{$user->avatar}}" style="width:80px;margin-top: 10px;">
                @error('avatar')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror


                <div class="mb-3">
                    <input class="form-control btn btn-primary" type="submit" value="Update Avatar">
                </div>
            </div>
        </div>
    </form>

    <div class="row mb-3">
        <label for="avatar" class="col-md-4 col-form-label text-md-end">Username:</label>
        <div class="col-md-6">
            <input class="form-control" type="text" name="username" readonly disabled value="{{$user->username}}">
        </div>
    </div>

    <form action="{{route('profile.update')}}" method="POST">
        @method('PUT')
        @csrf

        <div class="row mb-3">
            <label for="avatar" class="col-md-4 col-form-label text-md-end">First Name:</label>
            <div class="col-md-6">
                <input class="form-control" type="text" name="profile_first_name" minlength="2" maxlength="255" required value="{{$user->first_name}}">
            </div>
        </div>

        <div class="row mb-3">
            <label for="avatar" class="col-md-4 col-form-label text-md-end">Last Name:</label>
            <div class="col-md-6">
                <input class="form-control" type="text" name="profile_last_name" minlength="2" maxlength="255" required value="{{$user->last_name}}">
            </div>
        </div>

        <div class="row mb-3">
            <label for="avatar" class="col-md-4 col-form-label text-md-end">Short Description:</label>
            <div class="col-md-6">
                <input class="form-control" type="text" name="profile_description" minlength="2" maxlength="255" required value="{{$user->short_description}}">
            </div>
        </div>

        <div class="row mb-3">
            <label for="avatar" class="col-md-4 col-form-label text-md-end">Biography:</label>
            <div class="col-md-6">
                <textarea class="form-control" style="resize: none" rows="8" name="profile_biography" minlength="2" maxlength="472" required>{{$user->biography}}</textarea>
            </div>
        </div>

        <div class="row mb-3">
            <label for="avatar" class="col-md-4 col-form-label text-md-end">Birthdate:</label>
            <div class="col-md-6">
                <input class="form-control" type="date" name="profile_birthdate" required value="{{$user->birthdate}}">
            </div>
        </div>

        <div class="row mb-3">
            <label for="avatar" class="col-md-4 col-form-label text-md-end"></label>
            <div class="col-md-6">
                <input class="form-control btn btn-primary" type="submit" value="Update Profile">
            </div>
        </div>
    </form>
</x-layout-default>
