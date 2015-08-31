<div class="apart_exact" data-type="{{isset($item->EstateType) ? $item->EstateType : ''}}">
    <a href="/areas/{{isset($item->Id) ? $item->Id : ''}}" title="" class="apart_link">
        <div class="apart_hover"></div>	
        <div class="img_blc">
            <span href="#">{{isset($item->EstateType) ? Lang::get('enums.EstateType.'.$item->EstateType) : ''}}</span>
            <span href="#" data-info="{{json_encode($item)}}"  id="add_to_favorite" class="{{ isset($favorites) && isset($favorites[$item->Id]) ? 'favorited' : ''}}"></span>
            <span href="#"   class="feedback_button" data-type="item" data-id="{{$item->Id}}" data-name="{{isset($item->Name) ? $item->Name : ''}}" data-title="{{Lang::get('main.send_requests')}}"></span>
            <div class="invisible_block">
                <i class="area_img"></i>
                <p>{{isset($item->Zone) ? 'Зона: '.Lang::get('enums.Zone.'.$item->Zone) : ''}}</p>
                <p>Коммуникации: 
                <p>
                    <?php isset($item->WaterSupply) ? $comm[] = Lang::get('enums.WaterSupply.'.$item->WaterSupply) : '';
                    isset($item->GasType) ? $comm[] =  Lang::get('enums.GasType.'.$item->GasType) : '';
                    isset($item->Electricity) ?  $comm[] = Lang::get('enums.Electricity.'.$item->Electricity) : '';?>
                    @if(isset($comm))
                        @foreach($comm as $key=>$com)
                            {!!$key ? ', '.$com : $com!!}
                        @endforeach
                    @else
                        - 
                    @endif
                </p>
                </p>
            </div>
            <img src="{{isset($item->Imgs) ? $item->Imgs[0] : '/images/slide_img3.jpg'}}">
        </div>
        <div class="description_blc">
            <span class="apart_price">{!!isset($item->Price) ? (number_format($item->Price, 0, '', ' ' ).'<span class="rubel"></span>') : ''!!}</span>
            <span class="apart_name">{{isset($item->Name) ? $item->Name : ''}}</span>
            <span class="apart_place"><i></i>{{isset($item->Address) ? $item->Address : ''}}</span>

        </div>
        <div class="bottom_blc">
            <span>{{isset($item->ObjectSize) ? $item->ObjectSize.'м2' : ''}}</span>
            <span>{{isset($item->SeaDistance) ? Items::distance($item->SeaDistance).' до моря' : ''}} </span>
            <div class="clr"></div>
        </div>
    </a>			
</div>