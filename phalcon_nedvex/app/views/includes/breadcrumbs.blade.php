@if(isset($breadcrumbs))
    <div class="breadcrumbs"> 
    @foreach($breadcrumbs as $page)
        @if(is_array($page))
            <a href="{{isset($page[1]) ? $page[1] : '#'}}">{{isset($page[0]) ? $page[0] : 'Default'}}</a>            
        @else
            <span>{{$page}}</span> 
        @endif       
    @endforeach
    </div>
@endif