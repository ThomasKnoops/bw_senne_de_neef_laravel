<?php

    $commonRoutes = [
        'home' => 'Home'
    ];
    $guestRoutes = [
        'login' => 'Login',
        'register' => 'Register'
    ];
    $authRoutes = [
        'profile' => 'My Profile'
    ];

?>

<header>
    <nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-900">
        <div class="container flex flex-wrap items-center justify-between mx-auto">
            <a href="{{route('home')}}" class="flex items-center">
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Mijn Laravel Project</span>
            </a>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    @foreach($commonRoutes as $routeName => $routeLabel)
                        <li>
                            <a href="{{route($routeName)}}" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-500 md:p-0 dark:text-white">{{$routeLabel}}</a>
                        </li>
                    @endforeach
                    @guest()
                        @foreach($guestRoutes as $routeName => $routeLabel)
                            <li>
                                <a href="{{route($routeName)}}" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-500 md:p-0 dark:text-white">{{$routeLabel}}</a>
                            </li>
                        @endforeach
                    @endguest
                    @auth()
                        @foreach($authRoutes as $routeName => $routeLabel)
                            <li>
                                <a href="{{route($routeName)}}" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-500 md:p-0 dark:text-white">{{$routeLabel}}</a>
                            </li>
                        @endforeach
                        <li>
                            <x-logout-button/>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</header>
