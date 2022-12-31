<x-layout-default title="Profiles">
@foreach($users as $user)
    <div class="text-wrap">
        {{$user}}
    </div>
@endforeach
</x-layout-default>
