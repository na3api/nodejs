<div class="apart_exact" data-type="{{$item->EstateType}}">
    <a href="/{{Lang::get('main.url_'.$item->EstateType)}}/{{$item->Id}}" title="" class="apart_link">
        <div class="apart_hover"></div>	
        <div class="img_blc">
            <span href="#">{{isset($item->HouseType) ? Lang::get('enums.HouseType.'.$item->HouseType) : $item->EstateType}}</span>
            <span href="#" data-info="{{json_encode($item)}}" id="add_to_favorite" class="{{ isset($favorites) && isset($favorites[$item->Id]) ? 'favorited' : ''}}"></span>
            <span href="#"   class="feedback_button" data-type="item" data-id="{{$item->Id}}" data-name="{{isset($item->Name) ? $item->Name : ''}}" data-title="{{Lang::get('main.send_requests')}}"></span>
            <div class="invisible_block">
                <i></i>
                <p>{{isset($item->TotalFloors) ? $item->TotalFloors.' этажа' : ''}}</p>
                <p>{{isset($item->Furnish) ? Lang::get('enums.Furnish.'.$item->Furnish) : ''}}</p>
            </div>
            <img src="{{isset($item->Imgs) ? $item->Imgs[0] : './images/houses.png'}}">
        </div>
        <div class="description_blc">
            <span class="apart_price">{!!isset($item->Price) ? number_format($item->Price, 0, '', ' ' ).' <span class="rubel"></span>' : ''!!}</span>
            <span class="apart_name">{{isset($item->Name) ? $item->Name : ''}}</span>
            <span class="apart_place"><i></i>{{isset($item->Address) ? $item->Address : ''}}</span>
        </div>
        <div class="bottom_blc">
            <span>{{isset($item->HouseType) ? Lang::get('enums.HouseType.'.$item->HouseType) : ''}}</span>
            <span>{{isset($item->ObjectSize) ? $item->ObjectSize.'м2' : ''}}</span>
            <span>{{isset($item->SeaDistance) ? Items::distance($item->SeaDistance).' до моря' : ''}} </span>
            <div class="clr"></div>
        </div>
    </a>			
</div>