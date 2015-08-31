@if(isset($pagination) && isset($pagination['page']))
<div class="pagination_blc">
    <ul class="pagination">
        @if($pagination['current_page'] > 1)
            <li><a href="/{{$pagination['page']}}/{{$pagination['current_page']-1}}/page{{isset($pagination['post']) ? '?'.http_build_query($pagination['post']) : ''}}" class="first"></a></li>
        @endif
        @for($i = 1; $i <= ceil($pagination['total_count']/$pagination['page_size']); $i++)
            <li><a href="/{{$pagination['page']}}/{{$i}}/page{{isset($pagination['post']) ? '?'.http_build_query($pagination['post']) : ''}}" class="{{$i == $pagination['current_page'] ? 'active' : ''}}">{{$i}}</a></li>
        @endfor
        @if(($i-1) > $pagination['current_page'])
            <li><a href="/{{$pagination['page']}}/{{$pagination['current_page']+1}}/page{{isset($pagination['post']) ? '?'.http_build_query($pagination['post']) : ''}}" class="last"></a></li>
        @endif
    </ul>
</div>
@endif
 