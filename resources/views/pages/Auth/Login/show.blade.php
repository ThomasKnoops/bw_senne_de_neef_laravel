<x-layout-default title="Login">
    <form method="POST" action="{{route('login.store')}}">
        @csrf
        <input class="bg-news-gray" type="email" name="email" required>
        <input class="bg-news-gray" type="password" name="password" required>
        <input class="bg-news-gray" type="submit" value="Login">
    </form>
</x-layout-default>
