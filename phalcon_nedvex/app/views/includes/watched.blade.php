@if(isset($items) && $items)
<section class="watched">
    <div class="container-fluid">
        <div class="container watch_title">  
            <h1 class="">{{Lang::get('main.you_watched')}}</h1> 
        </div>
        <div class="tab-content" id="top_propositions">
            <div class="tab-pane active" id="hot_rooms"> 
                <div id="carousel2" class="carousel home slide" data-ride="carousel" data-interval="false">
                    <ol class="carousel-indicators"> 
                        @for($i = 0; $i < floor(count($items)/Config::get('settings.watched_slider_size')); $i++ )
                            <li data-target="#carousel2" data-slide-to="{{$i}}" class="{{!$i?'active':''}}"></li>
                        @endfor
                    </ol>
                    <div class="container ">
                        <div class="carousel-inner">
                                <div class="item active apartments_page">
                                <?php $count=0 ?>
                                @foreach($items as $id => $item)                                
                                    @if($count == Config::get('settings.watched_slider_size'))
                                        </div>
                                        <div class="item apartments_page">
                                        <?php $count=0 ?>
                                    @endif
                                    @if($item->EstateType == 'Flat')
                                        @include('lists.flats', ['item' => $item])
                                    @elseif ($item->EstateType == 'House')
                                        @include('lists.houses', ['item' => $item])
                                    @elseif ($item->EstateType == 'Land')
                                        @include('lists.areas', ['item' => $item])
                                    @elseif ($item->EstateType == 'Busines')
                                        @include('lists.busines', ['item' => $item])
                                    @elseif ($item->EstateType == 'Office')
                                        @include('lists.offices', ['item' => $item])
                                    @elseif ($item->EstateType == 'Hotel')
                                        @include('lists.hotels', ['item' => $item])
                                    @elseif ($item->EstateType == 'Store')
                                        @include('lists.storages', ['item' => $item])
                                    @endif
                                    <?php $count++ ?>
                                @endforeach
                                </div>
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
        <div id="owl-demo" class="owl-carousel"> 
          
                                <?php $count=0 ?>
                                @foreach($items as $id => $item)
                                <div class="item   apartments_page">                                
                                    
                                    @if($item->EstateType == 'Flat')
                                        @include('lists.flats', ['item' => $item])
                                    @elseif ($item->EstateType == 'House')
                                        @include('lists.houses', ['item' => $item])
                                    @elseif ($item->EstateType == 'Land')
                                        @include('lists.areas', ['item' => $item])
                                    @elseif ($item->EstateType == 'Busines')
                                        @include('lists.busines', ['item' => $item])
                                    @elseif ($item->EstateType == 'Office')
                                        @include('lists.offices', ['item' => $item])
                                    @elseif ($item->EstateType == 'Hotel')
                                        @include('lists.hotels', ['item' => $item])
                                    @elseif ($item->EstateType == 'Store')
                                        @include('lists.storages', ['item' => $item])
                                    @endif
                                    <?php $count++ ?>
                                      </div>
                                @endforeach
                              

        </div> 
    </div>
</section> 
@endif