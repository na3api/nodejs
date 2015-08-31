@extends('layouts.main')
@extends('includes.header')
@section('content')
<section class="container rieltors_page">
    <h1 class="registration_header">Регистрация</h1>
    <div class="auth">			
        {!! Form::open(array('url' => '/register', 'id' => 'registration_form', 'method' => 'post')) !!}
         {!! csrf_field() !!}
        <div class="control-group">
            
            <div class="controls">
                <input type="text" class="required" name="name" id="inputName" value="{{ old('name') }}" placeholder="Ваше Имя">
            </div>
        </div>
        <div class="control-group">
            
            <div class="controls">
                <input type="text"  class="required email"  data-ajax = '{"url":"/check_email"}'  name="email" value="{{ old('email') }}" id="inputEmail" placeholder="Email">
            </div>
        </div>
        <div class="control-group">
            
            <div class="controls">
                <input type="text"  class="required" name="phone" id="inputPhone" placeholder="Телефон" value="{{ old('phone') }}">
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <input type="password" class="required pass" data-min="6" name="password" id="inputPassword" placeholder="Пароль">
            </div>
        </div>
        
        <div class="control-group">
            <div class="controls">
                
                <button type="submit" class="btn submit btn_gold">Зарегистрироваться</button>
            </div>
            <p class="submit_text">У меня уже есть учетная запись.<a href="#">Войти</a></p>
        </div>
        {!! Form::close() !!}
    </div>
    <div class='social_block'>
        <p>или зарегистрируйтесь с помощью социальных сетей</p>
        <ul class="socials">
            <li><a class="vk"></a></li>
            <li><a class="fb"></a></li>
            <li><a class="od"></a></li>
            <li><a class="yandex"></a></li>
            <li><a class="google"></a></li>
            <li><a class="mail_soc"></a></li>
        </ul>
    </div>
</section>
@stop
@extends('includes.footer')   