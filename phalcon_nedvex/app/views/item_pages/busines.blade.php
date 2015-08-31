<section class="tablet_width">
    <div class="container-fluid">
        <div class="container"> 
            @include('includes.breadcrumbs',  ['breadcrumbs' => $breadcrumbs])
            <h1 class="title_apartment h_line">{{isset($item->Name) ? $item->Name : ''}}</h1>
            <div class="panel panel-default apartment_info"> 
                <div class="panel-body">
                    <div class="col-sm-6"> 
                        <div id="carousel1" class="carousel slide slider" data-ride="carousel">
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
                                    <li data-target="#carousel1" data-slide-to="0" class=""><img alt="{{isset($item->Name) ? $item->Name : ''}}" src="/images/slide_busines.jpg"></li>
                                    @endforelse 
                                    @else
                                    <li data-target="#carousel1" data-slide-to="0" class=""><img alt="{{isset($item->Name) ? $item->Name : ''}}" src="/images/slide_busines.jpg"></li>
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
                                    <img  alt="{{isset($item->Name) ? $item->Name : ''}}" src="/images/slide_busines.jpg">
                                </div>
                                @endforelse 
                                @else
                                <div class="item active">
                                    <img  alt="{{isset($item->Name) ? $item->Name : ''}}" src="/images/slide_busines.jpg">
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
                        <p class="price_apartment">{!!isset($item->Price) ? number_format($item->Price, 0, '', ' ' ).(isset($item->DealType) && $item->DealType == 'Rent' ? ' <span class="big_rubel">/мес</span>' : '<span class="big_rubel"></span>') : ''!!} 
                            <span class="label label-default">{{isset($item->ProductNumber) ? 'ID: '.$item->ProductNumber : ''}}</span>
                        </p>
                        @if(isset($item->DealType) && $item->DealType == 'Rent')
                        <span class="rent area_rent">{{Lang::get('main.rent')}}</span>
                        @endif                        
                        <div class="row">
                            <div class="col-sm-12">
                                {!! isset($item->PricePerM) ? '<div class="square1"><div>м<sup>2</sup></div>'. number_format($item->PricePerM, 0, '', ' ' ).' <span class="rubel_black"></span></div>' : ''!!}
                                <div class="adress">{!! isset($item->Address) ? '<span></span>' . $item->Address : ''!!}</div>
                            </div>
                        </div>
                        <div class="benefits">
                            {!!isset($item->SeaDistance) ? '<span class="distance_to_sea">'.Lang::get('main.to_sea').': '.Items::distance($item->SeaDistance).'</span>' : ''!!}
                            {!!isset($item->MountyView)  && $item->MountyView ? '<span class="view_mountains">'.Lang::get('enums.MountyView').'</span>' : ''!!}
                            {!!isset($item->SeaView) && $item->SeaView? '<span class="view_sea">'.Lang::get('enums.SeaView').'</span>' : ''!!}
                        </div> 
                        <div class="specifications">
                            <h5>{{Lang::get('main.accommodation')}}</h5>
                            <ul class="list-unstyled">
                                {!!isset($item->Floor) && $item->Floor ? '<li>'.$item->Floor.' '.Lang::get('main.floor').'</li>' : '' !!} 
                                {!!isset($item->UsefulSize) && $item->UsefulSize ? '<li>'.Lang::get('main.square').': '.$item->UsefulSize.' м2</li>' : '' !!} 
                                {!!isset($item->OverallSize) && $item->OverallSize ? '<li>'.Lang::get('main.over_square').': '.$item->OverallSize.' м2</li>' : '' !!} 
                                {!!isset($item->ManagingCompany) && $item->ManagingCompany ? '<li>'.Lang::get('enums.ManagingCompany').'</li>' : '' !!} 
                            </ul>
                            <ul class="list-unstyled"> 
                                {!!isset($item->PartOf) ? '<li>'.Lang::get('enums.PartOf.'.$item->PartOf).'</li>' : ''!!}
                                {!!isset($item->SeparatedEntrance) && $item->SeparatedEntrance ? '<li>'.Lang::get('enums.SeparatedEntrance').'</li>' : ''!!}
                                {!!isset($item->CeilingHeight) && $item->CeilingHeight ? '<li>'.Lang::get('main.CeilingHeight').' '.$item->CeilingHeight.' м</li>' : ''!!}
                                {!!isset($item->Tenants) && $item->Tenants ? '<li>'.Lang::get('enums.Tenants').'</li>' : ''!!}                               
                            </ul>
                            <div class="clr"></div>
                            <h5 class="title_comunication">{{Lang::get('main.build_and_teritory')}}</h5>
                            <ul class="list-unstyled">
                                {!!isset($item->YearBuilt) ? '<li>'.Lang::get('main.YearBuilt').' '.$item->YearBuilt. (isset($item->BuildingMaterials) ? (', '.Lang::get('enums.BuildingMaterials.'.$item->BuildingMaterials)) : '' ) .'</li>' : '' !!} 
                                {!!isset($item->LandOwnership) ? '<li>'.Lang::get('enums.LandOwnership.'.$item->LandOwnership).'</li>' : '' !!} 
                                {!!isset($item->FacadeLength) ? '<li>'.Lang::get('main.FacadeLength').' '.$item->FacadeLength.' м</li>' : '' !!} 
                            </ul>
                            <ul class="list-unstyled"> 
                                {!!isset($item->TotalFloors) ? '<li>'.$item->TotalFloors.' '.Items::endingWords( 'floor', $item->TotalFloors).'</li>' : ''!!}
                                {!!isset($item->CarLots) && $item->CarLots ? '<li>'.$item->CarLots.' '.Items::endingWords( 'CarLots', $item->CarLots).'</li>' : ''!!}
                            </ul>
                            <div class="clr"></div>
                            <h5 class="title_comunication">{{Lang::get('main.Communication')}}</h5>
                            <ul class="list-unstyled">
                                {!!isset($item->WaterSupply) ? '<li>' . Lang::get('enums.WaterSupply.'.$item->WaterSupply).'</li>' : ''!!}
                                {!!isset($item->GasType) ? '<li>' . Lang::get('enums.GasType.'.$item->GasType).'</li>' : ''!!}        
                                {!!isset($item->ElectricityPower) && $item->ElectricityPower ? '<li>' . Lang::get('main.Electricity').' ' .$item->ElectricityPower.'КВт</li>' : ''!!}
                            </ul>
                            <ul class="list-unstyled">
                                {!!isset($item->Ventilation) ? '<li>' . Lang::get('enums.Ventilation.'.$item->Ventilation).'</li>' : ''!!}
                                {!!isset($item->Sewage) && $item->Sewage ? '<li>' . Lang::get('enums.Sewage').'</li>' : ''!!}
                                {!!isset($item->Conditioning)  ? '<li>' . Lang::get('enums.Conditioning.'.$item->Conditioning).'</li>' : ''!!}
                            </ul>
                            <div class="clr"></div>
                        </div>
                        <button type="button" class="btn  btn_like {{ isset($favorites) && isset($item->Id) && isset($favorites[$item->Id]) ? 'favorited' : ''}}" data-info="{{ isset($item) ? json_encode($item) : ''}}"  id="add_to_favorite" ></button>
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