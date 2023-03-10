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
        @vite('resources/js/app.js')

        @livewire('kanban')

        {{-- modalwidth comment for tailwind purge, used widths: sm:max-w-sm sm:max-w-md sm:max-w-lg sm:max-w-xl sm:max-w-2xl sm:max-w-3xl sm:max-w-4xl sm:max-w-5xl sm:max-w-6xl sm:max-w-7xl --}}
        @livewire('livewire-ui-modal')

        @livewireScripts
    </body>
</html>
