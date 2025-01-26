<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
        @yield('title', 'الصفحة الرئيسية')</title>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Include any CSS files here -->
    <link rel="shortcut icon" href="{{ $store->icon }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">

    @include('header.header')


    <main>
        @yield('content')
    </main>


    @include('components.features')

    @include('components.footer')

    @include('components.scroll-to-top')

    <script src="{{ asset('js/cart.js') }}"></script>

    <script>
        async function trackVsits() {
            //   ====================================
            await fetch("/api/track-visits", {
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    method: "POST",
                    body: JSON.stringify({
                        "visited_url": window.location.pathname
                    })
                })

                .then(function(res) {

                })

                .catch(function(res) {

                })
        }
        //   ====================================

        trackVsits();
    </script>

</body>

</html>
