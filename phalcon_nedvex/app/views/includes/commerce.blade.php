<div class="tab-pane-main" id="commerce" data-page_cont="commerce" >

    <div id="">
        <ul id="tabsCommercial" class="nav nav-tabs" data-tabs="tabs" style="position:relative;">
            <li data-commerce_tab="busines" class="active">
                <a href="#busines" data-toggle="tab">                          
                    Торговые площади                          
                </a>
            </li>
            <li data-commerce_tab="offices">
                <a href="#offices" data-toggle="tab">                        
                    Офисные площади                          
                </a>
            </li>
            <li data-commerce_tab="hotels">
                <a href="#hotels" data-toggle="tab">                        
                    Гостиницы                             
                </a>
            </li>
            <li data-commerce_tab="storages">
                <a href="#storages" data-toggle="tab">                        
                    Склады                             
                </a>
            </li>
            <div class="clr"></div>
        </ul>
        <div id="my-tab-content5" class="tab-content commerce_forms">
            @include('includes.busines_form') 
            @include('includes.offices_form') 
            @include('includes.hotels_form') 
            @include('includes.storages_form') 
        </div>  
    </div>

