@extends('layouts.main')
@extends('includes.header')
@section('content')
<section class="container">
    <h1 class="h_line">Вход</h1>
    {!! Form::open(array('url' => '/login', 'id' => 'auth_form', 'method' => 'post', 'class'=>"form-horizontal")) !!}
        {!! csrf_field() !!}
        <div class="control-group">
            <label class="control-label" for="inputEmail">Email</label>
            <div class="controls">
                <input type="text" name="email" class="required email" value="{{ old('email') }}" placeholder="Email">
                {!! $errors->first('email') ? '<label class="message">'.$errors->first('email').'</label>' : ''!!}
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="inputPassword">Password</label>
            <div class="controls">
                <input type="password" class="required" data-min="6" name="password" placeholder="Пароль">
                {!! $errors->first('password') ? '<label class="message">'.$errors->first('email').'</label>' : ''!!}
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <label class="checkbox">
                    <input type="checkbox" name="remember" {!! old('remember') ? 'checked': '' !!} value="1"> Запомнить меня
                </label>
                <button type="submit" class="btn">Вход</button>
                <a href="/registration">Регистрация</a>
                <a href="{{$adfs_url}}">Adfs</a>
                <a href="{{$url}}">{{$url}}</a>
            </div>
        </div>
    {!! Form::close() !!}
</section>
@stop
@extends('includes.footer')   