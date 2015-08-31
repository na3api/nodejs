<section >
    <script>
        var slider_sizes = {!! isset($slider_size) ? json_encode($slider_size) : 1!!}
    </script>
    <div class="container-fluid">
        <div class="container">  
            <h1 class="title_apartment h_line home">{{ isset($list_name) ? $list_name : Lang::get('main.hot_proposition') }}</h1> 

            <ul class="nav nav-tabs hot_offers">
                @if(isset($list_name) && $list_name  ==  Lang::get('main.favorites') || 1==1)
                <li class="active"><a href="#all" data-type="all" >{{Lang::get('main.all')}}</a></li>               
                <li><a href="#Flat" data-type="Flat">{{Lang::get('main.flats')}}</a></li>
                @else
                <li class="active"><a href="#Flat" data-type="Flat">{{Lang::get('main.flats')}}</a></li>
                @endif
                <li><a href="#House" data-type="House">{{Lang::get('main.houses')}}</a></li>
                <li><a href="#Land" data-type="Land">{{Lang::get('main.areas')}}</a></li>
                <li><a href="#Busines" data-type="Busines">{{Lang::get('main.busines')}}</a></li>
                <li><a href="#Office" data-type="Office">{{Lang::get('main.offices')}}</a></li>
                <li><a href="#Hotel" data-type="Hotel">{{Lang::get('main.hotels')}}</a></li>
                <li><a href="#Store" data-type="Store">{{Lang::get('main.storages')}}</a></li>
            </ul>
        </div>
        <!-- Tab panes -->
        <div class="tab-content" id="top_propositions">
            <div class="tab-pane active" id="hot_rooms"> 
                <div id="carousel1" class="carousel home slide" data-ride="carousel" data-interval="false">
                    <ol class="carousel-indicators"> 
                    </ol>
                    <div class="container ">
                        <div class="carousel-inner top">
                            @if(isset($items) && $items)
                            <div id="data_container" style="display: none;">

                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                @foreach($items as $id => $item)
                                    @if($item->EstateType == 'Flat')
                                        @include('lists.flats', ['item' => $item])
                                    @elseif ($item->EstateType == 'House')
                                        @include('lists.houses', ['item' => $item])
                                    @elseif ($item->EstateType == 'Earth')
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
                                @endforeach

                            </div>
                            @else
                                <p>{{Lang::get('main.msg_empty_slider')}}</p>
                            @endif
                        </div>

                    </div>
                    <a class="left carousel-control" href="#carousel1" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel1" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>  

        </div>
    </div>
</section> 