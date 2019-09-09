<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Microcents</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        {{-- <link rel="stylesheet" href="css/reset.css"> --}}
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
        <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
        {{-- <script src="{{ secure_asset('js/main.js') }}"></script>
        <script src="{{ secure_asset('js/keywordtool.js') }}"></script>
        <link rel="stylesheet" href="{{ secure_asset('css/style.css') }}"> --}}

        <script src="{!! asset('js/main.js') !!}"></script>
        <script src="{!! asset('js/keywordtool.js') !!}"></script>
        <link rel="stylesheet" href="{!! asset('css/style.css') !!}">


    </head>
    <body>
        <div>
            @include('partials.header')

            @yield('content')
    
            @include('partials.footer')
        </div>
    </body>
</html>
