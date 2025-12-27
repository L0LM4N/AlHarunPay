<!DOCTYPE html>
<html lang="en">
<head>
    @include('head')
</head>

<body>

    @include('navbar')

        <main class="flex-fill p-4">
            @yield('content')
        </main>

    @include('footer')
    @include('scripts')

    @stack('scripts')
</body>
</html>