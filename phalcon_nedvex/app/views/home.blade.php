@extends('layouts.main')
@extends('includes.header')
@section('content')
    @include('includes.top_propositions')
    @include('includes.how_works')
    @include('includes.advantages')
    @include('includes.partners')
    @include('includes.reviews')
    @if($watched)
        @include('includes.watched', ['items' => $watched])
    @endif
@stop
@extends('includes.footer')
 