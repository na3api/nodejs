<section class="row">
    <div class="col-lg-12 header_bottom">				
        <ul id="tabs" class="nav nav-tabs marg10" data-tabs="tabs">
            <li class="active" data-page="flats">
                <a href="#flats" data-toggle="tab" class="tab1">
                    <span class="tab1_img"></span>
                    {{Lang::get('main.flats')}}
                    <span class="nav_qwt">({{isset($count) ? $count['flats'] : 0}})</span>
                </a>
            </li>
            <li data-page="houses">
                <a href="#houses" data-toggle="tab" class="tab2">
                    <span class="tab2_img"></span>
                    {{Lang::get('main.houses')}}
                    <span class="nav_qwt">({{isset($count) ? $count['houses'] : 0}})</span>
                </a>
            </li>
            <li data-page="areas">
                <a href="#areas" data-toggle="tab" class="tab3">
                    <span class="tab3_img"></span>
                    {{Lang::get('main.areas')}}
                    <span class="nav_qwt">({{isset($count) ? $count['areas'] : 0}})</span>
                </a>
            </li>
            <li data-page="commerce">
                <a href="#commerce" data-toggle="tab"  class="tab4" >
                    <span class="tab4_img"></span>
                    {{Lang::get('main.menu_commerce')}}
                    <span class="nav_qwt">({{isset($count) ? $count['commerce'] : 0}})</span>
                </a>
            </li>
        </ul>
        <div id="my-tab-content" class="tab-content">
            @include('includes.flat_form')   	
            @include('includes.house_form')                 
            @include('includes.areas_form')                
            @include('includes.commerce')   
        </div>
    </div>				          
</section>