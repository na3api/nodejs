<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>{{title}}</title>
        <meta name="keywords" content="{{keywords}}">
        <meta name="description" content="{{description}}">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        
        <link rel="stylesheet" href="css/bootstrap.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/footer.css" />
        <link rel="stylesheet" href="css/fotorama.css" />
        <link rel="stylesheet" href="css/owl.theme.css" />
        <link rel="stylesheet" href="css/owl.carousel.css" />
        <link rel="stylesheet" href="css/main.css" /> 
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,400italic,500,500italic,700,700italic&subset=cyrillic-ext,latin' rel='stylesheet' type='text/css'>
    </head
    <body> 
        {{ content() }}
    </body>
    
    {{ javascript_include("js/jquery.js") }}
    {{ javascript_include("js/jquery.mask.js") }}
    {{ javascript_include("js/validation.js") }}
    {{ javascript_include("js/selectbox.js") }}
    {{ javascript_include("js/fotorama.js") }}
    {{ javascript_include("js/owl.carousel.js") }}
    {{ javascript_include("js/main.js") }}
    {{ javascript_include("js/bootstrap-select.js") }}
    {{ javascript_include("js/bootstrap.js") }}
     
    
</html>   