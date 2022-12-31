<?php

    $commonRoutes = [
        'about' => 'About',
        'faq.index' => 'FAQ',
        'contact.show' => 'Contact'
    ];

?>

<footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <ul class="nav col-md-4 justify-content-start">
        @foreach($commonRoutes as $routeName => $routeLabel)
            <li class="nav-item">
                <a href="{{route($routeName)}}" class="nav-link">{{$routeLabel}}</a>
            </li>
        @endforeach
    </ul>
    <span class="col-md-4 mb-0 text-muted justify-end">© 2022 Senne De Neef. All Rights Reserved</span>
</footer>
