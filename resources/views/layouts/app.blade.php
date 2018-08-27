<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">--}}
</head>
<body>
    <div id="app">
        <div class="wrapper container-fluid" style="padding-left:0;">
        <div class="row">
            <div class="col-2 sidebar">
                <div id="main-panel">

                </div>
                <nav id="left-panel" class="bg-gray">
                    @include('etc.navbar')
                </nav>
            </div>

            <main class="col-10">
                <div class="py-4">
                    <div class="col-10 m-auto">
                        @include('etc.messages')
                    </div>
                </div>
                @yield('content')
            </main>
        </div>
        </div>

    </div>

@yield('js')
</body>
</html>
