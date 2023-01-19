<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Kanban Laravel + Livewire</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        @vite('resources/css/app.css')

        @livewireStyles
    </head>
    <body class="antialiased font-roboto">
        @livewire('kanban')

        @livewireScripts

        @vite('resources/js/app.js')
    </body>
</html>
