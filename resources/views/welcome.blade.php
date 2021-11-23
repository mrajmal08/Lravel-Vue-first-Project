<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">


        <title>Laravel Vue</title>

        <!-- Fonts -->

       <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body class="antialiased">
            <div id="app">
                <nav class="navbar navbar-light bg-light justify-content-between">
                    <a class="navbar-brand"><router-link to="/">Laravel Vue</router-link></a>
                    <div class="text-right">
                        <a class="navbar-brand"> <router-link to="/example">Example</router-link></a>
                        <a class="navbar-brand"> <router-link to="/sample">Sample</router-link></a>
                    </div>

                </nav>
                <router-view></router-view>
            </div>
    <script src="{{ asset('js/app.js') }}" ></script>
    </body>
</html>


