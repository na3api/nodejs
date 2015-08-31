<section class="tablet_width">
    <div class="container-fluid">
        <div class="container"> 
            @include('includes.breadcrumbs',  ['breadcrumbs' => $breadcrumbs])
            <h1 class="title_apartment h_line">{{isset($item->Name) ? $item->Name : ''}}</h1>
            <div class="panel panel-default apartment_info "> 
                <div class="panel-body">
                    <div class="col-sm-6">
                        <div id="carousel1" class="slide_house carousel slide slider" data-ride="carousel">
                            <div class="thumbs">
                                <div class="thumbs_control">
                                    <div class="thumbs_arrowL"></div>
                                    <div class="thumbs_arrowR"></div>
                                </div>
                                <ol class="carousel-indicators">
                                    @if(isset($item->Imgs))
                                        @forelse($item->Imgs as $key=> $image)
                                            <li data-target="#carousel1" data-slide-to="{{$key}}" class="{{!$key ? 'active' : ''}}"><img alt="{{isset($item->Name) ? $item->Name : ''}}" src="{{$image}}"></li>
                                        @empty
                                            <li data-target="#carousel1" data-slide-to="0" class=""><img alt="{{isset($item->Name) ? $item->Name : ''}}" src="/images/slide_img2.jpg"></li>
                                        @endforelse 
                                    @else
                                        <li data-target="#carousel1" data-slide-to="0" class=""><img alt="{{isset($item->Name) ? $item->Name : ''}}" src="/images/slide_img2.jpg"></li>
                                    @endif
                                </ol>
                            </div>
                            <div class="carousel-inner">
                                @if(isset($item->Imgs))
                                    @forelse($item->Imgs as $key=> $image)
                                    <div class="item  {{!$key ? 'active' : ''}}">
                                        <img alt="{{isset($item->Name) ? $item->Name : ''}}" src="{{$image}}">
                                    </div>
                                    @empty
                                    <div class="item">
                                        <img  alt="{{isset($item->Name) ? $item->Name : ''}}" src="/images/slide_img2.jpg">
                                    </div>
                                    @endforelse 
                                @else
                                    <div class="item active">
                                        <img  alt="{{isset($item->Name) ? $item->Name : ''}}" src="/images/slide_img2.jpg">
                                    </div>
                                @endif
                            </div>
                            <a class="left carousel-control" href="#carousel1" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel1" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6 pl_25">
                        <p class="price_apartment">{!! isset($item->Price) ? number_format($item->Price, 0, '', ' ' ).' <span class="big_rubel"></span>' : '' !!} 
                            <span class="label label-default">ID: {{isset($item->ProductNumber) ? $item->ProductNumber : ''}}</span>
                        </p>
                        <div class="row">
                            <div class="col-sm-12"> 
                                <div class="adress full_adress">{!! isset($item->Address) ? '<span></span>' . $item->Address : ''!!}</div>
                            </div>
                        </div>
                        <div class="benefits">
                            {!!isset($item->SeaDistance) ? '<span class="distance_to_sea">'.Lang::get('main.to_sea').': '.Items::distance($item->SeaDistance).'</span>' : ''!!}
                            {!!isset($item->MountyView)  && $item->MountyView ? '<span class="view_mountains">'.Lang::get('enums.MountyView').'</span>' : ''!!}
                            {!!isset($item->SeaView) && $item->SeaView? '<span class="view_sea">'.Lang::get('enums.SeaView').'</span>' : ''!!}
                        </div>
                        <div class="specifications">
                            <h5>{{Lang::get('main.house_and_land')}}</h5>
                            <ul class="list-unstyled">
                                {!!isset($item->OverallSize) && $item->OverallSize ? '<li>'.Lang::get('main.square_house').': '.$item->OverallSize.' м2</li>' : '' !!} 
                                {!!isset($item->LandArea) && $item->LandArea ? '<li>'.Lang::get('main.square_land').': '.$item->LandArea.' соток</li>' : '' !!} 
                                {!!isset($item->LandPurpose) && $item->LandPurpose ? '<li>' . Lang::get('enums.LandPurpose.'.$item->LandPurpose).'</li>' : ''!!}     
                                {!!isset($item->LandOwnership) ? '<li>'.Lang::get('enums.LandOwnership.'.$item->LandOwnership).'</li>' : '' !!} 
                                {!!isset($item->TotalFloors) ? '<li>'.$item->TotalFloors.' '.Items::endingWords( 'floor', $item->TotalFloors).'</li>' : ''!!}             
                                {!!isset($item->YearBuilt) ? '<li>'.Lang::get('main.YearBuilt').' '.$item->YearBuilt .'</li>' : '' !!} 
                            </ul>
                            <ul class="list-unstyled">
                                {!!isset($item->Furnish) && $item->Furnish ? '<li>'.Lang::get('enums.Furnish.'.$item->Furnish).'</li>' : ''!!}
                                {!!isset($item->Pool) && $item->Pool ? '<li>'.Lang::get('enums.Pool').'</li>' : ''!!}              
                                {!!isset($item->BathroomNumber) && $item->BathroomNumber ? '<li>'.$item->BathroomNumber.' '.Items::endingWords( 'bathroom', $item->BathroomNumber).'</li>' : '' !!} 
                                {!!isset($item->Furniture) && $item->Furniture ? '<li>'.Lang::get('enums.Furniture.'.$item->Furniture).'</li>' : ''!!}
                                {!!isset($item->RoadDistance) && $item->RoadDistance ? '<li>'.Lang::get('main.RoadDistance').' '.$item->RoadDistance.' м</li>' : '' !!} 
                            </ul>
                            <div class="clr"></div>
                            <h5 class="title_comunication">{{Lang::get('main.Communication')}}</h5>
                            <ul class="list-unstyled">
                                {!!isset($item->WaterSupply) ? '<li>' . Lang::get('enums.WaterSupply.'.$item->WaterSupply).'</li>' : ''!!}
                                {!!isset($item->GasType) ? '<li>' . Lang::get('enums.GasType.'.$item->GasType).'</li>' : ''!!}        
                                {!!isset($item->Electricity) ? '<li>' . Lang::get('enums.Electricity.'.$item->Electricity).'</li>' : ''!!}        
                            </ul>
                            <ul class="list-unstyled">
                                {!!isset($item->Sewage) && $item->Sewage ? '<li>' . Lang::get('enums.Sewage').'</li>' : ''!!}
                                {!!isset($item->Heating) ? '<li>' . Lang::get('enums.Heating.'.$item->Heating).'</li>' : ''!!}        
                            </ul>
                            
                            <div class="clr"></div>
                        </div>
                        <button type="button" class="btn  btn_like"></button>
                        <button type="button" class="btn btn_gold btn_subscription feedback_button" data-type="item" data-id="{{$item->Id}}" data-name="{{isset($item->Name) ? $item->Name : ''}}" data-title="{{Lang::get('main.send_requests')}}"><span>Оставить заявку</span></button>
                        <button type="button" class="btn btn_gold btn_order feedback_button" data-type="item" data-id="{{$item->Id}}" data-name="{{isset($item->Name) ? $item->Name : ''}}" data-title="{{Lang::get('main.showing_request')}}"><span>Заказать просмотр</span></button>
                        <div class="clearfix"></div>
                        <div class="object_description">
                            @if(isset($item->Description)  && $item->Description)
                                <h5 class="title h_line">{{Lang::get('main.object_info')}}</h5>
                                <p>{!!$item->Description!!}</p>  
                            @endif
                        </div>
                    </div>

                </div>
            </div> 
            @if(isset($item->Microdistrict))
            <div class="panel panel-default about_distric" >
                <div class="panel-heading"><h2>{{Lang::get('main.dist_info')}}</h2></div>
                <div class="panel-body"> 
                    <p>{!!$item->Microdistrict!!}</p>
                </div>
            </div>
            @endif
        </div>  
</section>   