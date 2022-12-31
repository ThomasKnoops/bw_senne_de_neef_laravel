<form method="POST" action="{{route('logout.delete')}}">
    @csrf
    <button type="submit">Logout</button>
</form>
