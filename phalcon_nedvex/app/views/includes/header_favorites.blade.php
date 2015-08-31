@section('header')
<header class="container-fluid">     
    <script>
        var page = '<?php echo isset($page) ? $page : 'home' ?>';
        var microdistrict;
    </script>
    <div class="container">
        @include('includes.top_header')
        @include('includes.top_menu')
        @include('includes.sub_menu')
        <section class="row favorites_head">
            <div class="choosen_head ">
                <div class="c_h_first">
                    <ul>
                        <li>Cохраняйте</li>
                        <li>понравившиеся </li>
                        <li>объекты в избранное</li>
                    </ul>
                </div>
                <div class="c_h_second">
                <ul>
                        <li>Все ваши объекты в</br>одном месте</li>
                        <li>Вы всегда в курсе </li>
                        <li>последних изменений.</li>
                    </ul></div>
                <div class="c_h_third">
                    <span></span>
                    <ul>
                        <li>Вы всегда можете</li>
                        <li>Получить бесплатную консультацию</li>
                        <li>от специалиста и подборку лучших</li>
                        <li>объектов под ваш запрос</li>
                        <li><a href="#" class="feedback_button" data-type="favorites" data-title="Бесплатная консультация">Бесплатная консультация</a></li>
                    </ul>
                    </ul>
                </div>
                <div class="clr"></div>
            </div>
        </section>
    </div>
</header>
@if(isset($error))
<!--{{$error}}-->
@endif
@stop
