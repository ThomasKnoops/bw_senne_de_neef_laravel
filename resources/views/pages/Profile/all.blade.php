<x-layout-default title="Profiles">
    <div class="container-fluid m-2">
        <div class="row gap-5 justify-content-between">
            @foreach($users as $user)
                <div class="card" style="width: 18rem;">
                    <img src="http://www.gravatar.com/avatar/" class="card-img-top" alt="{{$user->username}}_avatar">
                    <div class="card-body">
                        <h5 class="card-title">{{$user->first_name}} {{$user->last_name}} ({{$user->username}})</h5>
                        <p class="card-text">{{$user->short_description}}.</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout-default>
