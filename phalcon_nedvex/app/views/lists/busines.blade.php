<div class="apart_exact" data-type="{{isset($item->EstateType) ? $item->EstateType : ''}}">
    <a href="/busines/{{isset($item->Id) ? $item->Id : ''}}" title="{{isset($item->Name) ? $item->Name : ''}}" class="apart_link">
        <div class="apart_hover"></div>	
        <div class="img_blc">
            <span href="#" class="title_busines">{{isset($item->EstateType) ? Lang::get('enums.EstateType.'.$item->EstateType) : ''}}</span>
            <span href="#" data-info="{{json_encode($item)}}" id="add_to_favorite" class="{{ isset($favorites) && isset($favorites[$item->Id]) ? 'favorited' : ''}}"></span>
            <span href="#" class="feedback_button" data-type="item" data-id="{{$item->Id}}" data-name="{{isset($item->Name) ? $item->Name : ''}}" data-title="{{Lang::get('main.send_requests')}}"></span>
            <div class="invisible_block busines_invisible">
                <i class="bussines_img"></i>
                {!!isset($item->PartOf) ? '<p>В составе '.Lang::get('enums.PartOF.'.$item->PartOf).'</p>' : ''!!}
                {!!isset($item->Passability) ? '<p>'.Lang::get('enums.Passability.'.$item->Passability).' проходимость</p>' : ''!!}
                <p>{{isset($item->Furnish) ? Lang::get('enums.Furnish.'.$item->Furnish) : ''}}</p>               
            </div>
            <img src="{{isset($item->Imgs) ? $item->Imgs[0] : '/images/slide_busines.jpg'}}">
        </div>
        <div class="description_blc">
            <span class="apart_price">
                @if(isset($item->DealType) && $item->DealType == 'Rent')
                    <span class="rent">{{Lang::get('main.rent')}}</span>
                @endif
                {!!isset($item->Price) ? number_format($item->Price, 0, '', ' ' ).(isset($item->DealType) && $item->DealType == 'Rent' ? '<span class="rubel">/мес</span>' : ' <span class="rubel"></span>') : ''!!}</span>
            <span class="apart_name">{{isset($item->Name) ? $item->Name : ''}}</span>
            <span class="apart_place"><i></i>{{isset($item->Address) ? $item->Address : ''}}</span>
        </div>
        <div class="bottom_blc">
            {!! isset($item->Floor) ? '<span>'.$item->Floor . ' ' .Lang::get('main.floor').'</span>' : ''!!}
            {!! isset($item->ObjectSize) ? '<span>'. $item->ObjectSize.'м2</span>' : ''!!}
            {!! isset($item->SeaDistance) ? '<span>'. Items::distance($item->SeaDistance).' до моря</span>' : ''!!}
            <div class="clr"></div>
        </div>
    </a>			
</div>