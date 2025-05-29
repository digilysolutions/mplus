<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.partials-front-rpg.header')

    @yield('css')
</head>

<body>

    @include('layouts.partials-front-rpg.top-navbar')
    @include('layouts.partials-front-rpg.nav')
    @yield('content')
    @include('layouts.partials-front-rpg.footer')
    @yield('js')

</body>

</html>
