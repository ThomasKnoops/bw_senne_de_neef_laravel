<x-layout-default title="Register">
    <form method="POST" action="{{route('register.store')}}">
        @csrf
        <input class="bg-news-gray" type="text" placeholder="username" name="username" required>
        <input class="bg-news-gray" type="text" placeholder="first name" name="first_name" required>
        <input class="bg-news-gray" type="text" placeholder="last name" name="last_name" required>
        <input class="bg-news-gray" type="date" name="birthdate" required>
        <input class="bg-news-gray" type="email" placeholder="email" name="email" required>
        <input class="bg-news-gray" type="password" placeholder="password" name="password" required>
        <input class="bg-news-gray" type="submit" value="Register">
    </form>
</x-layout-default>
