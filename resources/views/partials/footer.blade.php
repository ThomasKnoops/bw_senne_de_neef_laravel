<?php

    $commonRoutes = [
        'about' => 'About',
        'faq.index' => 'FAQ',
        'contact.show' => 'Contact'
    ];

?>

<footer class="p-4 bg-white rounded-lg shadow md:flex md:items-center md:justify-between md:p-6 dark:bg-gray-800">
    <ul class="flex flex-wrap items-center mt-3 text-sm text-gray-500 dark:text-gray-400 sm:mt-0">
        @foreach($commonRoutes as $routeName => $routeLabel)
            <li>
                <a href="{{route($routeName)}}" class="mr-4 hover:underline md:mr-6">{{$routeLabel}}</a>
            </li>
        @endforeach
    </ul>
    <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2022 Senne De Neef. All Rights Reserved</span>
</footer>
