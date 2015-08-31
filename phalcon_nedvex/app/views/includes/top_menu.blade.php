<div class="row ">
    <div class="col-lg-12 header_midlle">
        <div class="logo">
            <a href="/" title="{{Config::get('settings.site_name')}}"><img src="/images/Logo.png"></a>
        </div>
        <div class="">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header"></div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                        <ul class="nav navbar-nav">
                            <li><a href="/about" title="{{Lang::get('main.top_meny_about')}}">{{Lang::get('main.top_meny_about')}}</a></li>
                            <li><a href="/realtors" title="{{Lang::get('main.top_meny_realtors')}}">{{Lang::get('main.top_meny_realtors')}}</a></li>
                            <li><a href="/reviews" title="{{Lang::get('main.top_meny_reviews')}}">{{Lang::get('main.top_meny_reviews')}}</a></li>
                            <li><a href="/contacts" title="{{Lang::get('main.top_meny_contacts')}}">{{Lang::get('main.top_meny_contacts')}}</a></li>
                        </ul>
                    </div>
                </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
        <div class=" h_m_contacts" >
            <span>{{Config::get('settings.header_phone')}}</span>
            <span>{{Lang::get('main.header_phone')}}</span>
        </div>
    </div>
</div>