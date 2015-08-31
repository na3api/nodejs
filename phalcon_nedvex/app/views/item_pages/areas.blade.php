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
                                    <li data-target="#carousel1" data-slide-to="0" class=""><img alt="{{isset($item->Name) ? $item->Name : ''}}" src="/images/slide_img3.jpg"></li>
                                    @endforelse 
                                    @else
                                    <li data-target="#carousel1" data-slide-to="0" class=""><img alt="{{isset($item->Name) ? $item->Name : ''}}" src="/images/slide_img3.jpg"></li>
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
                                    <img  alt="{{isset($item->Name) ? $item->Name : ''}}" src="/images/slide_img3.jpg">
                                </div>
                                @endforelse 
                                @else
                                <div class="item active">
                                    <img  alt="{{isset($item->Name) ? $item->Name : ''}}" src="/images/slide_img3.jpg">
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
                            <span class="label label-default">ID: {{isset($item->ProductNumber) ? $item->ProductNumber : '-'}}</span>
                        </p>
                        <div class="row">
                            <div class="col-sm-12"> 
                                <div class="adress full_adress">{!! isset($item->Address) ? '<span></span>' . $item->Address : ''!!}</div>
                            </div>
                        </div>
                        <div class="benefits">
                            {!! isset($item->SeaDistance) ? '<span class="distance_to_sea">'.Lang::get('main.to_sea').': '.Items::distance($item->SeaDistance).'</span>' : '' !!}
                            {!!isset($item->MountyView)  && $item->MountyView ? '<span class="view_mountains">'.Lang::get('enums.MountyView').'</span>' : ''!!}
                            {!!isset($item->SeaView) && $item->SeaView? '<span class="view_sea">'.Lang::get('enums.SeaView').'</span>' : ''!!}
                        </div>
                        <div class="specifications">
                            <h5>Участок</h5>
                            <ul class="list-unstyled">
                                {!!isset($item->LandArea) && $item->LandArea ? '<li>Площадь участка '.$item->LandArea.' соток</li>' : ''!!}
                                {!!isset($item->LandCategory) && $item->LandCategory ? '<li>' . Lang::get('enums.LandCategory.'.$item->LandCategory).'</li>' : ''!!}
                                {!!isset($item->LandRights) && $item->LandRights ? '<li>' . Lang::get('enums.LandRights.'.$item->LandRights).'</li>' : ''!!}
                                {!!isset($item->LandPlacement) && $item->LandPlacement ? '<li>' . Lang::get('enums.LandPlacement.'.$item->LandPlacement).'</li>' : ''!!}
                                {!!isset($item->TemporaryConstruction) && $item->TemporaryConstruction ? '<li>'. Lang::get('enums.TemporaryConstruction.'.$item->TemporaryConstruction).'</li>' : ''!!}
                            </ul>
                            <ul class="list-unstyled">
                                {!!isset($item->RoadDistance) && $item->RoadDistance ? '<li>Расстояние до дороги '.$item->RoadDistance.' м</li>' : ''!!}
                                {!!isset($item->Relief) && $item->Relief ? '<li>' . Lang::get('enums.Relief.'.$item->Relief).'</li>' : ''!!}
                                {!!isset($item->LandPurpose) && $item->LandPurpose ? '<li>' . Lang::get('enums.LandPurpose.'.$item->LandPurpose).'</li>' : ''!!}
                                {!!isset($item->Zone) && $item->Zone ? '<li>' . Lang::get('enums.Zone.'.$item->Zone).'</li>' : ''!!}

                            </ul>
                            <div class="clr"></div>
                            <h5 class="title_comunication">Коммуникации</h5>
                            <ul class="list-unstyled">
                                {!!isset($item->WaterSupply) ? '<li>' . Lang::get('enums.WaterSupply.'.$item->WaterSupply).'</li>' : ''!!}
                                {!!isset($item->GasType) ? '<li>' . Lang::get('enums.GasType.'.$item->GasType).'</li>' : ''!!}
                            </ul>
                            <ul class="list-unstyled">
                                {!!isset($item->ElectricityPower) && $item->ElectricityPower ? '<li>' . Lang::get('main.Electricity').' ' .$item->ElectricityPower.'КВт</li>' : ''!!}
                                {!!isset($item->Sewage) && $item->Sewage ? '<li>' . Lang::get('enums.Sewage').'</li>' : ''!!}
                            </ul>
                            <div class="clr"></div>
                        </div>
                        <button type="button" class="btn  btn_like {{ isset($favorites) && isset($item->Id) && isset($favorites[$item->Id]) ? 'favorited' : ''}}" data-info="{{ isset($item) ? json_encode($item) : ''}}"  id="add_to_favorite" ></button>
                        <button type="button" class="btn btn_gold btn_subscription feedback_button" data-type="item" data-id="{{$item->Id}}" data-name="{{isset($item->Name) ? $item->Name : ''}}" data-title="{{Lang::get('main.send_requests')}}"><span>Оставить заявку</span></button>
                        <button type="button" class="btn btn_gold btn_order feedback_button" data-type="item" data-id="{{$item->Id}}" data-name="{{isset($item->Name) ? $item->Name : ''}}" data-title="{{Lang::get('main.showing_request')}}"><span>Заказать просмотр</span></button>
                        <div class="clearfix"></div>
                        <div class="object_description">
                            @if(isset($item->Description)  && $item->Description)
                                <h5 class="title h_line">Описание объекта</h5>
                                <p>{!!$item->Description!!}</p>  
                            @endif
                        </div>
                    </div>

                </div>
            </div> 
            @if(isset($item->Microdistrict))
            <div class="panel panel-default about_distric" >
                <div class="panel-heading"><h2>Информация о районе</h2></div>
                <div class="panel-body"> 
                    <p>{!!$item->Microdistrict!!}</p>
                </div>
            </div>
            @endif
        </div>  
</section>   