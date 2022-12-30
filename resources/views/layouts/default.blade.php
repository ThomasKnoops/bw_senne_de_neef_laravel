<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{$attributes->get('title', 'My BW Laravel Project')}}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="app">
            <main>
                {{$slot}}
            </main>
        </div>
    </body>
</html>
