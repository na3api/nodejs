<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>{{isset($title) ? $title : ''}}</title>
        <meta name="keywords" content="{{isset($keywords) ? $keywords : ''}}">
        <meta name="description" content="{{isset($description) ? $description : ''}}">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

        <link rel="stylesheet" href="{{URL::asset('css/bootstrap.css')}}" />
        <link rel="stylesheet" href="{{URL::asset('css/style.css')}}" />
        <link rel="stylesheet" href="{{URL::asset('css/footer.css')}}" />
        <link rel="stylesheet" href="{{URL::asset('css/fotorama.css')}}" />
        <link rel="stylesheet" href="{{URL::asset('css/owl.theme.css')}}" />
        <link rel="stylesheet" href="{{URL::asset('css/owl.carousel.css')}}" />
        <link rel="stylesheet" href="{{URL::asset('css/main.css')}}" /> 
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,400italic,500,500italic,700,700italic&subset=cyrillic-ext,latin' rel='stylesheet' type='text/css'>
    </head>

    <body>
        @yield('header')        
        @yield('content')     
        @yield('footer')
        @include('includes.popups')
    </body>
    <script src="{{URL::asset('js/jquery.js')}}"></script>
    <script src="{{URL::asset('js/jquery.mask.js')}}"></script>
    <script src="{{URL::asset('js/validation.js')}}"></script>
    <script src="{{URL::asset('/js/selectbox.js')}}"></script>    
    <script src="{{URL::asset('js/fotorama.js')}}"></script>
    <script src="{{URL::asset('js/owl.carousel.js')}}"></script>
    <script src="{{URL::asset('js/main.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap-select.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap.js')}}"></script>
</html>