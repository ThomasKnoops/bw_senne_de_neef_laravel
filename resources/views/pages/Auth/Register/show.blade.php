<x-layout-default title="Register">
    <form method="POST" action="{{route('register.store')}}">
        @csrf
        <input class="bg-news-gray" type="text" name="name" required>
        <input class="bg-news-gray" type="email" name="email" required>
        <input class="bg-news-gray" type="password" name="password" required>
        <input class="bg-news-gray" type="submit" value="Register">
    </form>
</x-layout-default>
