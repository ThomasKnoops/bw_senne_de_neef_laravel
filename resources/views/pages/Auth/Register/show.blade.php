<x-layout-default title="Register">
    <form method="POST" action="{{route('register.store')}}">
        @csrf
        <div class="mb-2">
            <label class="form-label">Username:</label>
            <input class="form-control" type="text" placeholder="username" name="username" required>
        </div>
        <div class="mb-2">
            <label class="form-label">First Name:</label>
            <input class="form-control" type="text" placeholder="first name" name="first_name" required>
        </div>
        <div class="mb-2">
            <label class="form-label">Last Name:</label>
            <input class="form-control" type="text" placeholder="last name" name="last_name" required>
        </div>
        <div class="mb-2">
            <label class="form-label">Birthdate:</label>
            <input class="form-control" type="date" name="birthdate" required>
        </div>
        <div class="mb-2">
            <label class="form-label">Email:</label>
            <input class="form-control" type="email" placeholder="email" name="email" required>
        </div>
        <div class="mb-2">
            <label class="form-label">Password:</label>
            <input class="form-control" type="password" placeholder="password" name="password" required>
        </div>
        <div class="mb-2">
            <input class="form-control" type="submit" value="Register">
        </div>
    </form>
</x-layout-default>
