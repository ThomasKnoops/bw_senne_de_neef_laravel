<?php
$navbarBrand = 'Mijn Laravel Project (ADMIN)';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$attributes->get('title', 'My BW Laravel Project')}}</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
@include('partials.header')
<div class="col p-0 m-0">
    <aside class="float-left" style="max-width: 20vh">
        <nav>

        </nav>
    </aside>
    <main class="container">
        {{$slot}}
    </main>
</div>
@include('partials.footer')
</body>
</html>
