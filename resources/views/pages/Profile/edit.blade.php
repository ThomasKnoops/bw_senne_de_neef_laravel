<x-layout-default title="Edit Profile">

    <form method="POST" action="{{ route('profile.update.avatar') }}" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <label for="avatar" class="col-md-4 col-form-label text-md-end">Current Avatar</label>
            <div class="col-md-6">
                <input id="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar" value="{{ old('avatar') }}" required autocomplete="avatar">
                <img src="/assets/profile/{{$user->avatar}}" style="width:80px;margin-top: 10px;">
                @error('avatar')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror


                <div class="mb-3">
                    <input class="form-control" type="submit" value="Update Avatar">
                </div>
            </div>
        </div>

    </form>

    <div class="row mb-3">
    <div class="col-md-6">
    <div class="mb-2">
        <label class="form-label">Username:</label>
        <input class="form-control" type="text" name="username" disabled value="{{$user->username}}">
    </div>
    <form method="POST" action="{{route('profile.update')}}">
        @csrf
        <div class="mb-2">
            <label class="form-label">First Name:</label>
            <input class="form-control" type="text" name="first_name" minlength="2" maxlength="255" required value="{{$user->first_name}}">
        </div>
        <div class="mb-2">
            <label class="form-label">Last Name:</label>
            <input class="form-control" type="text" name="last_name" minlength="2" maxlength="255" required value="{{$user->last_name}}">
        </div>

        <div class="mb-2">
            <label class="form-label">Short Description:</label>
            <input class="form-control" type="text" name="profile_description" minlength="2" maxlength="255" required value="{{$user->short_description}}">
        </div>

        <div class="mb-2">
            <label class="form-label">Biography:</label>
            <input class="form-control" type="text" name="profile_biography" minlength="2" maxlength="255" required value="{{$user->biography}}">
        </div>

        <div class="mb-2">
            <label class="form-label">Birthdate:</label>
            <input class="form-control" type="date" name="birthdate" required value="{{$user->birthdate}}">
        </div>

        <div class="mb-2">
            <input class="form-control" type="submit" value="Edit Profile">
        </div>
    </form>
    </div>
    </div>
</x-layout-default>
