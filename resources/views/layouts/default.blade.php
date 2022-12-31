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
            <main class="container">
                {{$slot}}
            </main>
        @include('partials.footer')
    </body>
</html>
