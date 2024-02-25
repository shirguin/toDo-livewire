<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="flex">
        <div class="w-2/4">

            {{-- Используем отложенную загрузку
            @livewire('UsersList', ['lazy' => 'true']) --}}

            {{-- Второй вариант отложенной загрузки --}}
            <livewire:UsersList lazy />
        </div>

        <div class="w-2/4">
            @livewire('registration')
        </div>

    </div>



</body>

</html>
