@section('header')
<header class="container-fluid">           
    <script>
        var page = '<?php echo isset($page) ? $page : 'home' ?>';
        var form_type = '<?php echo isset($form_type) ? $form_type : 'short' ?>';
        var w_monitor = screen.width;
        var microdistrict;
        var slider_size;
    </script>
    <div class="container">
        @include('includes.top_header')
        @include('includes.top_menu')
        @include('includes.sub_menu')
        @include('includes.search_forms')    
    </div>
</header>
@if(isset($error))
<!--{{$error}}-->
@endif
@stop
