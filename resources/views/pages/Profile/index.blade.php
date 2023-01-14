<x-layout-default>
    <div class="card">
        <img class="card-img-top" src="/uploads/avatars/default.png"/>
        <div class="card-header">
            <h2 class="card-title">{{$user->first_name}} {{$user->last_name}} (&#64;{{$user->username}})</h2>
            <hr/>
            <div class="card-text">My Biography</div>
        </div>
        <div class="card-body row">
            <h4>Projects</h4>
            @foreach($projects as $project)
                <article class="card">
                    <a class="stretched-link text-decoration-none" href="{{route('project.show', $project->id)}}">
                        <img src="/uploads/avatars/default.png"/>
                        <p>Project Name</p>
                    </a>
                </article>
            @endforeach
        </div>
    </div>
</x-layout-default>
