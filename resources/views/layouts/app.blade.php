<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{URL::to('css/app.css') }}" rel="stylesheet" type="text/css" >
    </head>

    <body>
        @include('inc.navbar')
        <div class="container">

        
        @yield('content')
    </div>

        <script src="/js/app.js"></script>
    </body>
</html>









    {{-- Text Editor
    A <script> betöltése nem sikerült --}}

    {{-- <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script src= {{ base_path('vendor\unisharp\laravel-ckeditor\ckeditor.js') }}></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script> --}}