@extends('layouts.main')
@extends('includes.header_favorites')
@section('content')
    @include('includes.top_propositions', ['items' => $favorites, 'list_name' =>  Lang::get('main.favorites'), 'slider_size' => $slider_size ])
@stop
@extends('includes.footer')