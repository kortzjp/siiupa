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
            .error {
                color: red;                
            }
        </style>
    </head>
    <body class="antialiased">
        @include('partials.nav')
        <h1>Login</h1>
        @if( session('login_failed')) 
        <div class="error">{{ session('login_failed')}}</div>
        @endif
        <form method="post">
            @csrf
            <label>
                <input type="text" name="email" value="{{old('email')}}" autofocus placeholder="Email..." />
            </label> <span class="error">@error('email') {{ $message}}@enderror</span> <br/><br/>
            <label>
                <input type="password" name="password" placeholder="Contraseña..." />
            </label> <span class="error">@error('password') {{ $message}}@enderror</span>  <br/>
            <label>
                <input type="checkbox" name="remember" /> Recordarme.
            </label><br/>
            <label>
                <input type="submit" value="Login" />
            </label>
        </form>
    </body>
</html>
