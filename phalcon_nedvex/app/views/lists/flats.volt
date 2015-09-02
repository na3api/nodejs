<div class="apart_exact" data-type="{{item.EstateType}}">
    <a href="/{{ t_main._("url_"~item.EstateType)}}/{{item.Id}}" title="{{item.Name is defined ? item.Name : ''}}" class="apart_link">
        <div class="apart_hover"></div>	
        <div class="img_blc">
            <span href="#">{{item.EstateType is defined ? t_enums._('EstateType/'~item.EstateType) : ''}}</span>
            <span href="#" data-info="" id="add_to_favorite" class="{{ favorites is defined AND favorites.item.Id is defined ? 'favorited' : ''}}"></span>
            <span href="#"  class="feedback_button" data-type="item" data-id="{{item.Id}}" data-name="{{item.Name is defined ? item.Name : ''}}" data-title="{{t_main._('send_requests')}}"></span>
            
            <div class="invisible_block">
              
            </div>
            <img src="{{isset(item.Imgs) ? item.Imgs[0] : '/images/aparts.png'}}">
        </div>
        <div class="description_blc">
            <span class="apart_price">{!!isset(item.Price) ? number_format(item.Price, 0, '', ' ' ).'<span class="rubel"></span>' : ''!!}</span>
            <span class="apart_name">{{isset(item.Name) ? item.Name : ''}}</span>
            <span class="apart_place">{!! isset(item.Address) ? '<i></i>'.item.Address : ''!!}</span>

        </div>
        <div class="bottom_blc">
            <span>{{isset(item.FlatType) ? Lang::get('enums.FlatType.'.item.FlatType) : ''}}</span>
            <span>{{isset(item.OverallSize) ? item.OverallSize.'м2' : ''}}</span>
            <span>{{isset(item.SeaDistance) ? Items::distance(item.SeaDistance).' до моря' : ''}} </span>
            <div class="clr"></div>
        </div>
    </a>			
</div>