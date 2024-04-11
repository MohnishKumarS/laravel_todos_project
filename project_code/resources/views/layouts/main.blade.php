<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('pageTitle')</title>

    {{-- CSS LINKS --}}
    @include('links.style')

    {{-- IN PAGE STYLE --}}
    @stack('css')
</head>

<body>

    {{-- PAGE WRAPPER --}}
    <main class="page-wrapper">
        @yield('content')
    </main>

    {{-- SCRIPT LINKS --}}
    @include('links.script')

    {{-- IN PAGE SCRIPTS --}}
    @stack('js')
</body>

</html>
