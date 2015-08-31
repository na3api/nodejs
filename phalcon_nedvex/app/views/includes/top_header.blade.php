<div class="row">
    <div class="col-lg-12 header_top">
        <div>
            <a href="/favorites" title="{{Lang::get('main.favorites')}}" class="header_top_links"><span class="star"></span>{{Lang::get('main.favorites')}}</a>
            @if(Auth::check())
                <span>{{$user->name}}</span><a href="/logout" >Выход</a>    
            @endif
        </div>
        <div>
            <a class="header_top_links marg20 feedback_button"  data-type="primary" data-title="Получить консультацию специалиста по недвижимости"><span class="mail"></span>{{Lang::get('main.send_request')}}</a>
            <a class="header_top_links "data-toggle="modal" data-target=".modal4"><span class="phone" ></span>{{Lang::get('main.send_phone')}}</a>
        </div>
        <div class="clr"></div>
    </div>
</div>