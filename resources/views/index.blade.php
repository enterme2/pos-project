<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <title>Welcome</title>
    </head>
    <body>
        
        <div style="padding-top: 32px">&nbsp</div>
        <div class="container">
        <div class="jumbotron">
            <div class="text-center">
                <img src="/storage/point-of-sale.png" style="width:300px; height: 250px ">
            <h1>{{$title}}</h1>
            <a href="/login" class="btn btn-primary">Login</a>
            &nbsp&nbsp&nbsp&nbsp
            <a href="/register" class="btn btn-success">Register</a>
            </div>

        </div>
        </div
        

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
