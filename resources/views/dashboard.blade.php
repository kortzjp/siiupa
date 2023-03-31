<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Camaleones</title>
        <style>
            body {
                font-family: 'Century Gothic', sans-serif;
                background-color: #2d3748;
                color: white;
            }
            a {
                color: white;
                text-decoration: none;
            }
            a:hover{
                color: red;
            }
        </style>
    </head>
    <body class="antialiased">
        @include('partials.nav')
        <h1>Dashboard</h1>
        <p>Bienvenido {{$user['nombre']}}</p>
    </body>
</html>
