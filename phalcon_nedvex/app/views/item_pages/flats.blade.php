<section class="tablet_width">
    <div class="container-fluid">
        <div class="container"> 
            @include('includes.breadcrumbs',  ['breadcrumbs' => $breadcrumbs])
            <h1 class="title_apartment h_line">{{isset($item->Name) ? $item->Name : ''}}</h1>
            <div class="panel panel-default apartment_info"> 
                <div class="panel-body">
                    <div class="col-sm-6">
                        <ul class="nav nav-tabs slider-tabs">
                            <li class="active"><a href="#room_photo" data-toggle="tab">Фотографии квартиры</a></li>
<!--                            <li><a href="#house_photo" data-toggle="tab">Фотографии дома</a></li> -->
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content slider">
                            <div class="tab-pane active" id="room_photo">
                           
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
                                                <li data-target="#carousel1" data-slide-to="0" class=""><img alt="{{isset($item->Name) ? $item->Name : ''}}" src="/images/slide_img1.jpg"></li>
                                            @endforelse 
                                        @else
                                            <li data-target="#carousel1" data-slide-to="0" class=""><img alt="{{isset($item->Name) ? $item->Name : ''}}" src="/images/slide_img1.jpg"></li>
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
                                                <img  alt="{{isset($item->Name) ? $item->Name : ''}}" src="/images/slide_img1.jpg">
                                            </div>
                                            @endforelse 
                                        @else
                                            <div class="item active">
                                                <img  alt="{{isset($item->Name) ? $item->Name : ''}}" src="/images/slide_img1.jpg">
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
                            <div class="tab-pane" id="house_photo">
                                <div id="carousel2" class="carousel slide" data-ride="carousel">
                                    <div class="thumbs">
                                        <div class="thumbs_control">
                                            <div class="thumbs_arrowL"></div>
                                            <div class="thumbs_arrowR"></div>
                                        </div>
                                        <ol class="carousel-indicators">
                                            <li data-target="#carousel2" data-slide-to="0" class=""><img data-src="holder.js/900x500/auto/index.htm#555:#333/text:Third slide" alt="Third slide" src="/images/slide_img1.jpg"></li>
                                            <li data-target="#carousel2" data-slide-to="1" class=""><img data-src="holder.js/900x500/auto/index.htm#555:#333/text:Third slide" alt="Third slide" src="/images/slide_img2.jpg"></li>
                                            <li data-target="#carousel2" data-slide-to="2" class="active"><img data-src="holder.js/900x500/auto/index.htm#555:#333/text:Third slide" alt="Third slide" src="/images/slide_img1.jpg"></li>
                                            <li data-target="#carousel2" data-slide-to="3" class=""><img data-src="holder.js/900x500/auto/index.htm#555:#333/text:Third slide" alt="Third slide" src="/images/slide_img2.jpg"></li>
                                        </ol>
                                    </div>
                                    <div class="carousel-inner">
                                        <div class="item">
                                            <img data-src="holder.js/900x500/auto/index.htm#777:#555/text:First slide" alt="First slide" src="/images/slide_img1.jpg">
                                        </div>
                                        <div class="item">
                                            <img data-src="holder.js/900x500/auto/index.htm#666:#444/text:Second slide" alt="Second slide" src="/images/slide_img2.jpg">
                                        </div>
                                        <div class="item active">
                                            <img data-src="holder.js/900x500/auto/index.htm#555:#333/text:Third slide" alt="Third slide" src="/images/slide_img1.jpg">
                                        </div>
                                        <div class="item">
                                            <img data-src="holder.js/900x500/auto/index.htm#555:#333/text:Third slide" alt="Third slide" src="/images/slide_img2.jpg">
                                        </div>
                                    </div>
                                    <a class="left carousel-control" href="#carousel2" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left"></span>
                                    </a>
                                    <a class="right carousel-control" href="#carousel2" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right"></span>
                                    </a>
                                </div>
                            </div> 
                        </div>
                    </div> 
                    <div class="col-sm-6 pl_25">
                        <p class="price_apartment">{!! isset($item->Price) ? number_format($item->Price, 0, '', ' ' ).' <span class="big_rubel"></span>' : '' !!} 
                            <span class="label label-default">ID: {{isset($item->ProductNumber) ? $item->ProductNumber : ''}}</span>
                        </p>
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
                            <h5>{{Lang::get('main.kharactristik')}}:</h5>
                            <ul class="list-unstyled">
                                {!!isset($item->OverallSize) && $item->OverallSize ? '<li>'.Lang::get('main.over_square').': '.$item->OverallSize.' м2</li>' : '' !!} 
                                {!!isset($item->LivingArea) && $item->LivingArea ? '<li>'.Lang::get('main.live_square').': '.$item->LivingArea.' м2</li>' : '' !!} 
                                {!!isset($item->BalconyLength) && isset($item->BalconyWidth) ? '<li>'.Lang::get('main.balcony').': '.($item->BalconyWidth*$item->BalconyLength).' м2</li>' : '' !!} 
                                <li>{{Lang::get('main.floor')}}: {{isset($item->Floor) ? $item->Floor : ''}}/{{isset($item->TotalFloors) ? $item->TotalFloors : ''}}</li>
                                {!!isset($item->OpenPlan) && $item->OpenPlan ? '<li>'.Lang::get('main.OpenPlan').'</li>' : ''!!}

                            </ul>
                            <ul class="list-unstyled"> 
                                {!!isset($item->FlatType) && $item->FlatType ? '<li>'.Lang::get('enums.FlatType.'.$item->FlatType).'</li>' : ''!!}
                                {!!isset($item->Furniture) && $item->Furniture ? '<li>'.Lang::get('enums.Furniture.'.$item->Furniture).'</li>' : ''!!}
                                {!!isset($item->Furnish) && $item->Furnish ? '<li>'.Lang::get('enums.Furnish.'.$item->Furnish).'</li>' : ''!!}
                                {!!isset($item->BathroomType) && $item->BathroomType ? '<li>'.Lang::get('enums.BathroomType.'.$item->BathroomType).'</li>' : ''!!}
                                {!!isset($item->Balcony) && $item->Balcony ? '<li>'.Lang::get('main.yes_balcon').'</li>' : '<li>'.Lang::get('main.no_balcon').'</li>'!!}
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
            <div class="panel panel-default about_house ">
                <div class="panel-heading"><h2>{{Lang::get('main.build_info')}}</h2></div>
                <div class="panel-body">
                    <div class="col-sm-6">     
                        {!! isset($item->ComplexDescription) ? '<h5 class="title h_line">'.Lang::get('main.desc').'</h5>'.$item->ComplexDescription : ''!!}
                    </div>
                    <div class="col-sm-6 house_specifications">
                        <h5 class="title h_line">{{Lang::get('main.complex_info')}}</h5>
                        <ul class="list-unstyled">
                            {!!isset($item->KorpusClass) ? '<li>'.Lang::get('enums.KorpusClass.'.$item->KorpusClass).'</li>' : ''!!}
                            {!!isset($item->KorpusYearOfEnding) ? '<li>'.Lang::get('main.KorpusYearOfEnding').' '. $item->KorpusYearOfEnding.(isset($item->KorpusConstructionEnding) ? ', '.$item->KorpusConstructionEnding : '').'</li>' : ''!!}           
                            {!!isset($item->KorpusYearBuilt) ? '<li>'.Lang::get('main.KorpusYearBuilt').' '. $item->KorpusYearBuilt.'</li>' : ''!!}
                            {!!isset($item->KorpusBuildingMaterials) ? '<li>'. Lang::get('enums.BuildingMaterials.'.$item->KorpusBuildingMaterials).'</li>' : ''!!}
                            {!!isset($item->ComplexDocumentsType) && $item->ComplexDocumentsType ? '<li>'. Lang::get('enums.ComplexDocumentsType.'.$item->ComplexDocumentsType).'</li>' : ''!!}
                            {!!isset($item->ComplexMortgage) && $item->ComplexMortgage ? '<li>'. Lang::get('main.Mortgage').'</li>' : ''!!}
                            {!!isset($item->ComplexInstalmentPayments) && $item->ComplexInstalmentPayments ? '<li>'. Lang::get('main.Instalment').'</li>' : ''!!}
                            {!!isset($item->ComplexMilitaryMortgage) && $item->ComplexMilitaryMortgage ? '<li>'. Lang::get('main.MilitaryMortgage').'</li>' : ''!!}
                            {!!isset($item->ComplexMotherCapital) && $item->ComplexMotherCapital ? '<li>'. Lang::get('main.MotherCapital').'</li>' : ''!!}
                        </ul>
                        <ul class="list-unstyled">
                            {!!isset($item->ComplexHouseTerritory) && $item->ComplexTerriroty ? '<li>'.Lang::get('enums.ComplexTerriroty.'.$item->ComplexTerriroty).'</li>' : ''!!}                      
                            {!!isset($item->ComplexHouseParking) && $item->ComplexHouseParking ? '<li>'.Lang::get('main.ComplexHouseParking').'</li>' : ''!!}                      
                            {!!isset($item->ComplexUndergroundParking) && $item->ComplexUndergroundParking ? '<li>'.Lang::get('main.ComplexUndergroundParking').'</li>' : ''!!}                      
                            {!!isset($item->ComplexMultisectionalParking) && $item->ComplexMultisectionalParking ? '<li>'.Lang::get('main.ComplexMultisectionalParking').'</li>' : ''!!}                      
                            {!!isset($item->ComplexGreenery) && $item->ComplexGreenery ? '<li>'.Lang::get('main.ComplexGreenery').'</li>' : ''!!}                      
                            {!!isset($item->ComplexKidsPlayground) && $item->ComplexKidsPlayground ? '<li>'.Lang::get('main.ComplexKidsPlayground').'</li>' : ''!!}                      
                            {!!isset($item->ComplexSportPlayground) && $item->ComplexSportPlayground ? '<li>'.Lang::get('main.ComplexSportPlayground').'</li>' : ''!!}                      
                            {!!isset($item->ComplexSPA) && $item->ComplexSPA ? '<li>SPA</li>' : ''!!}                      
                            {!!isset($item->ComplexFitness) && $item->ComplexFitness ? '<li>'.Lang::get('main.ComplexFitness').'</li>' : ''!!}                      
                            {!!isset($item->ComplexPool) && $item->ComplexPool ? '<li>'.Lang::get('main.ComplexPool').'</li>' : ''!!}                      
                            {!!isset($item->ComplexKinderGarden) && $item->ComplexKinderGarden ? '<li>'.Lang::get('main.ComplexKinderGarden').'</li>' : ''!!}                      
                        </ul>
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