<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>{{title is defined ? title : 'Nedvex' }}</title>
        <meta name="keywords" content="{{keywords is defined ? keywords : '' }}">
        <meta name="description" content="{{description is defined ? description : ''}}">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        
        {{ stylesheet_link("css/bootstrap.css") }}
        {{ stylesheet_link("css/style.css") }}
        {{ stylesheet_link("css/footer.css") }}
        {{ stylesheet_link("css/fotorama.css") }}
        {{ stylesheet_link("css/owl.theme.css") }}
        {{ stylesheet_link("css/owl.carousel.css") }}
        {{ stylesheet_link("css/main.css") }}
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