<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">


        <title>{{config('app.name','Laravel App')}}</title>

    </head>
    <body>

    @include('layouts.navbar')

    <div class='container' style="padding-top: 32px">
        @include('inc.messages')
        @yield('content')
    </div>

    </body>

    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
</html>
