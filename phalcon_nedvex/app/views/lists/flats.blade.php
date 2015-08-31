<div class="apart_exact" data-type="{{$item->EstateType}}">
    <a href="/{{Lang::get('main.url_'.$item->EstateType)}}/{{$item->Id}}" title="{{isset($item->Name) ? $item->Name : ''}}" class="apart_link">
        <div class="apart_hover"></div>	
        <div class="img_blc">
            <span href="#">{{isset($item->EstateType) ? Lang::get('enums.EstateType.'.$item->EstateType) : ''}}</span>
            <span href="#" data-info="{{json_encode($item)}}" id="add_to_favorite" class="{{ isset($favorites) && isset($favorites[$item->Id]) ? 'favorited' : ''}}"></span>
            <span href="#"  class="feedback_button" data-type="item" data-id="{{$item->Id}}" data-name="{{isset($item->Name) ? $item->Name : ''}}" data-title="{{Lang::get('main.send_requests')}}"></span>
            
            <div class="invisible_block">
                <i></i>
                <p>{{isset($item->Floor) ? $item->Floor : ''}}/{{isset($item->TotalFloors) ? $item->TotalFloors : ''}} этаж</p>
                <p>{{isset($item->Furnish) ? Lang::get('enums.Furnish.'.$item->Furnish) : ''}}</p>
<!--                <p>IV кв. 2015 г</p>-->
            </div>
            <img src="{{isset($item->Imgs) ? $item->Imgs[0] : '/images/aparts.png'}}">
        </div>
        <div class="description_blc">
            <span class="apart_price">{!!isset($item->Price) ? number_format($item->Price, 0, '', ' ' ).'<span class="rubel"></span>' : ''!!}</span>
            <span class="apart_name">{{isset($item->Name) ? $item->Name : ''}}</span>
            <span class="apart_place">{!! isset($item->Address) ? '<i></i>'.$item->Address : ''!!}</span>

        </div>
        <div class="bottom_blc">
            <span>{{isset($item->FlatType) ? Lang::get('enums.FlatType.'.$item->FlatType) : ''}}</span>
            <span>{{isset($item->OverallSize) ? $item->OverallSize.'м2' : ''}}</span>
            <span>{{isset($item->SeaDistance) ? Items::distance($item->SeaDistance).' до моря' : ''}} </span>
            <div class="clr"></div>
        </div>
    </a>			
</div>