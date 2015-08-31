@extends('layouts.main')
@extends('includes.header')
@section('content')
<section class="container" onload="document.getElementById('responseform').submit();">
    <h1 class="h_line">Вход</h1>
    <?php
    $wctx = $_POST['wctx'];
    if ($wctx == null) {
        printf("<p>" .
                " Active Directory Authentication plugin configuration may not be correct." .
                " Please cross check the configuration values" .
                "</p>");
        return;
    }

// Parse wctx to construct request params
    $parts = explode(":", $wctx);
    $jtoken = $parts[0];
    $return_url = $parts[1];
    $base_url = base64_decode($parts[2]);
    $remember = $parts[3];
    $task = base64_decode($parts[4]);
    $option = $parts[5];

    $wresult_encoded = $_POST['wresult'];
    $wresult_encoded = str_replace('\"', '"', $wresult_encoded);
    $wresult_encoded = str_replace('"', '&quot;', $wresult_encoded);
    $wresult_encoded = str_replace('<', '&lt;', $wresult_encoded);
    ?>
    {!! Form::open(array('url' => $base_url, 'id' => 'responseform', 'method' => 'post', 'class'=>"form-horizontal")) !!}
    {!! csrf_field() !!}
    <input type="hidden" name="option" value="<?php echo $option; ?>" />
    <input type="hidden" name="task" value="<?php echo $task; ?>" />
    <input type="hidden" name="authhandler" value="AdfsLogin" />
    <input type="hidden" name="<?php echo $jtoken; ?>" value="1" />
    <input type="hidden" name="return" value="<?php echo $return_url; ?>" />
    <input type="hidden" name="remember" value="<?php echo $remember; ?>" />
    <input type="hidden" name="wa" value="<?php echo $_POST['wa']; ?>" />
    <input type="hidden" name="wresult" value="<?php echo $wresult_encoded; ?>" />
    <input type="hidden" name="wctx" value="<?php echo $_POST['wctx']; ?>" />
    {!! Form::close() !!}
</section>
@stop
@extends('includes.footer')   