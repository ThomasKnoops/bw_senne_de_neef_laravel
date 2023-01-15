<?php

    $commonRoutes = [
        'home' => 'Home',
        'profiles' => 'Profiles'
    ];
    $guestRoutes = [
        'login' => 'Login',
        'register' => 'Register'
    ];
    $authRoutes = [
        'profile' => 'My Profile'
    ];
    $adminRoutes = [
        'admin.index' => 'Admin'
    ]

?>

<header>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #111827">
        <a href="{{route('home')}}" class="navbar-brand ms-5">
            <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">{{$navbarBrand}}</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end pe-5" id="mainNavbar">
            <ul class="navbar-nav">
                @foreach($commonRoutes as $routeName => $routeLabel)
                    <li class="nav-item nav-item-space">
                        <a href="{{route($routeName)}}" class="nav-link">{{$routeLabel}}</a>
                    </li>
                @endforeach
                @guest()
                    @foreach($guestRoutes as $routeName => $routeLabel)
                        <li class="nav-item nav-item-space">
                            <a href="{{route($routeName)}}" class="nav-link">{{$routeLabel}}</a>
                        </li>
                    @endforeach
                @endguest
                @auth()
                    @if(Auth::user()->isAdmin())
                            @foreach($adminRoutes as $routeName => $routeLabel)
                                <li class="nav-item nav-item-space">
                                    <a href="{{route($routeName)}}" class="nav-link">{{$routeLabel}}</a>
                                </li>
                            @endforeach
                    @endif

                    @foreach($authRoutes as $routeName => $routeLabel)
                        <li class="nav-item nav-item-space">
                            <a href="{{route($routeName)}}" class="nav-link">{{$routeLabel}}</a>
                        </li>
                    @endforeach
                    <li class="nav-item nav-item-space">
                        <form method="POST" action="{{route('logout.delete')}}">
                            @csrf
                            <a class="nav-link" onclick="this.parentNode.submit(); return false">Logout</a>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </nav>
</header>
