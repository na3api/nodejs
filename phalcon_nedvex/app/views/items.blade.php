@extends('layouts.main')
@extends('includes.header')
@section('content')

<section class="container apartments_page">
    <h1 class="h_line">{{$list_title}}</h1>
    @if($items)
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <div>
            @forelse($items as $item)
                @include('lists.'.$page, ['item' => $item])
            @empty
            <p>Нет объектов</p>
            @endforelse
        </div>
    @else
    <p>Нет объектов</p>
    @endif
    <div class="clr"></div>
@if(isset($pagination) && $items)
    @include('includes.pagination',  ['pagination' => $pagination])
@endif
</section>
@stop
@extends('includes.footer')