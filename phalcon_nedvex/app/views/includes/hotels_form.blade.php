<div class="tab-pane-main" id="hotels" data-page_cont="hotels">
    {!! Form::open(array('url' => '/hotels', 'id' => 'hotels_form', 'method' => 'get')) !!}
    <section style="position:relative">
        <div class="rooms_numbers">
            <ul id="tabs2" class="nav nav-tabs" data-tabs="tabs">
                <li class="active full_width">
                    <a href="#rooms" data-toggle="tab">                             
                        тип сделки                              
                    </a>
                </li>
            </ul>
            <div class="tab_contento">
                <select class="form-control select" name="hotels[dealtype]" >
                    <option {{ !isset($hotels['dealtype']) ? 'selected' : '' }} value="">Не важно</option>
                    <option  value="Sell" {{isset($hotels['dealtype']) && $hotels['dealtype'] == "Sell" ? 'selected' : '' }}>Продажа</option>
                    <option  value="Rent" {{isset($hotels['dealtype']) && $hotels['dealtype'] == "Rent" ? 'selected' : '' }}>Аренда</option>
                </select>
            </div>
        </div>    
        <div class="price">
            <ul id="tabs3" class="nav nav-tabs" data-tabs="tabs">
                <li class="active">
                    <a href="#hotels_hole" data-toggle="tab">				        	
                        общая / руб					        	
                    </a>
                </li>
                <li>
                    <a href="#hotels_meters" data-toggle="tab">			        	
                        руб / m<sup>2</sup>					        	
                    </a>
                </li>
            </ul>
            <div id="my-tab-content2" class="tab-content">
                <div class="tab-pane active" id="hotels_hole">
                    <div  id="my-tab-content" class="tab-content">
                        <input class="text required no number" name="hotels[costfrom]" placeholder="Не важно" value="{{ isset($hotels['costfrom']) ? $hotels['costfrom'] : ''}}"><span class="glyphicon glyphicon-minus"></span><input class="text required no number" name="hotels[costto]" placeholder="Не важно" value="{{isset($hotels['costto']) ? $hotels['costto'] : ''}}">
                    </div>
                </div>
                <div class="tab-pane" id="hotels_meters">
                    <div  id="my-tab-content" class="tab-content">
                        <input class="text number"  name="hotels[PricePerMFrom]"  placeholder="Не важно" value="{{ isset($hotels['PricePerMFrom']) ? $hotels['PricePerMFrom'] : ''}}"><span class="glyphicon glyphicon-minus"></span><input class="text number" name="hotels[PricePerMTo]" placeholder="Не важно" value="{{isset($hotels['PricePerMTo']) ? $hotels['PricePerMTo'] : ''}}">
                    </div>
                </div>
            </div>
        </div>				     
        <div class="square">
            <ul id="tabs4" class="nav nav-tabs" data-tabs="tabs">
                <li class="active full_width">
                    <a href="#squarem" data-toggle="tab">					        	
                        Площадь / m<sup>2</sup>					        	
                    </a>
                </li>
            </ul>
            <div class="tab-pane active" id="squarem">
                <div  id="my-tab-content" class="tab-content">					          
                    <input class="text required no  square_mask" name="hotels[sizefrom]" placeholder="Не важно" value="{{ isset($hotels['sizefrom']) ? $hotels['sizefrom'] : ''}}"><span class="glyphicon glyphicon-minus"></span><input class="text required no  square_mask" name="hotels[sizeto]" placeholder="Не важно" value="{{ isset($hotels['sizeto']) ? $hotels['sizeto'] : ''}}">
                </div>
            </div>
        </div>
        <div class="otdelka">
            <ul id="tabs2" class="nav nav-tabs" data-tabs="tabs">
                <li class="active full_width">
                    <a href="#rooms" data-toggle="tab">                     Отделка                         
                    </a>
                </li>
            </ul>
            <?php
            if (isset($hotels['furnish'])) {
                $hotels['f_furnish'] = explode(',', $hotels['furnish']);
            }
            ?>
            <div class="btn-group" id="furnish">
                <button type="button" data-furnish="Raw" class="btn {{isset($hotels['f_furnish']) && in_array("Raw", $hotels['f_furnish']) ? 'active' : '' }}">Черновая</button>
                <button type="button" data-furnish="Clean" class="btn {{isset($hotels['f_furnish']) && in_array("Clean", $hotels['f_furnish']) ? 'active' : '' }}">Чистовая</button>
                <button type="button" data-furnish="Repair" class="btn {{isset($hotels['f_furnish']) && in_array("Repair", $hotels['f_furnish']) ? 'active' : '' }}">Ремонт</button>                     
            </div>
            <input type="hidden" name="hotels[furnish]" value="{{ isset($hotels['furnish']) ? $hotels['furnish'] : ''}}" {{ isset($hotels['furnish']) && $hotels['furnish'] ? '' : 'disabled'}} >
        </div>
        <div class="rayon">
            <ul id="tabs2" class="nav nav-tabs" data-tabs="tabs">
                <li class="active full_width">
                    <a href="#area" data-toggle="tab">					        	
                        Район					        	
                    </a>
                </li>
            </ul>
            <div id="area">
                <a class="btn"><span class="select_title">Все районы</span> <span class="select_btn" ></span></a>
                <div class="areas_list" >
                    <div class="input_checkbox">
                        <label>Центральный р-н</label>
                        <input type="checkbox" class="district" value="1">
                        <span></span>
                    </div>
                    <div class="input_checkbox">
                        <label>Хостинский р-н</label>
                        <input type="checkbox" class="district" value="2">
                        <span></span>
                    </div>
                    <div class="input_checkbox">
                        <label>Адлерский р-н</label>
                        <input type="checkbox" class="district"  value="3">
                        <span></span>
                    </div>
                    <div class="input_checkbox">
                        <label>Лазаревский р-н</label>
                        <input type="checkbox" class="district" value="4">
                        <span></span>
                    </div>
                    <a class="more_areas" href='#'>{{Lang::get('main.extend_search')}}</a>
                </div>
            </div>				          	
        </div>
        <div class="area_list_hole ">
            <div class="col_lg-12 a_l_h_btns text-right">
                <span></span>
                <a href="#" class="area_save_btn">сохранить</a>
                <a href="#" class="area_close_btn">закрыть</a>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-6">
                <h4>Центральный р-н</h4>
                <ul class="list-unstyled" id="dist_1">
                    <li>Донская</li>
                    <li>Завокзальный</li>
                    <li>Заречный</li>
                    <li>КСМ</li>
                    <li>Макаренко</li>
                    <li>Мамайкаф</li>
                    <li>Новый Сочи</li>
                    <li>Центр</li>

                    <input type="hidden" name="hotels[microdistrict][]" disabled  value="Донская">
                    <input type="hidden" name="hotels[microdistrict][]" disabled  value="Завокзальный">
                    <input type="hidden" name="hotels[microdistrict][]" disabled  value="Заречный">
                    <input type="hidden" name="hotels[microdistrict][]" disabled  value="КСМ">
                    <input type="hidden" name="hotels[microdistrict][]" disabled  value="Макаренко">
                    <input type="hidden" name="hotels[microdistrict][]" disabled  value="Мамайкаф">
                    <input type="hidden" name="hotels[microdistrict][]" disabled  value="Новый Сочи">
                    <input type="hidden" name="hotels[microdistrict][]" disabled  value="Центр">
                </ul>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <h4>Хостинский р-н</h4>
                <ul class="list-unstyled" id="dist_2">
                    <li>Барановка село</li>
                    <li>Большой Ахун</li>
                    <li>Бытха</li>
                    <li>Верхний Юрт село</li>
                    <li>Измайловка село</li>
                    <li>Краевско-Армянское село</li>
                    <li>Кудепста пос.</li>
                    <li>Малая Объездная</li>
                    <li>Малый Ахун</li>
                    <li>Мацестинская Долина</li>
                    <li>Новая Мацеста</li>
                    <li>Пластунка село</li>
                    <li>Приморье</li>
                    <li>Раздольное село</li>
                    <li>Светлана</li>
                    <li>Соболевка</li>
                    <li>Совхоз "Приморский"</li>
                    <li>Старая Мацеста</li>
                    <li>Фабрициуса</li>
                    <li>Хоста</li>
                    <input type="hidden" name="hotels[microdistrict][]" disabled  value="Барановка село">
                    <input type="hidden" name="hotels[microdistrict][]" disabled  value="Большой Ахун">
                    <input type="hidden" name="hotels[microdistrict][]" disabled  value="Бытха">
                    <input type="hidden" name="hotels[microdistrict][]" disabled  value="Верхний Юрт село">
                    <input type="hidden" name="hotels[microdistrict][]" disabled  value="Измайловка село">
                    <input type="hidden" name="hotels[microdistrict][]" disabled  value="Краевско-Армянское село">
                    <input type="hidden" name="hotels[microdistrict][]" disabled  value="Кудепста пос.">
                    <input type="hidden" name="hotels[microdistrict][]" disabled  value="Малая Объездная">
                    <input type="hidden" name="hotels[microdistrict][]" disabled  value="Малый Ахун">
                    <input type="hidden" name="hotels[microdistrict][]" disabled  value="Мацестинская Долина">
                    <input type="hidden" name="hotels[microdistrict][]" disabled  value="Новая Мацеста">
                    <input type="hidden" name="hotels[microdistrict][]" disabled  value="Пластунка село">
                    <input type="hidden" name="hotels[microdistrict][]" disabled  value="Приморье">
                    <input type="hidden" name="hotels[microdistrict][]" disabled  value="Раздольное село">
                    <input type="hidden" name="hotels[microdistrict][]" disabled  value="Светлана">
                    <input type="hidden" name="hotels[microdistrict][]" disabled  value="Соболевка">
                    <input type="hidden" name="hotels[microdistrict][]" disabled  value='Совхоз "Приморский"'>
                    <input type="hidden" name="hotels[microdistrict][]" disabled  value="Старая Мацеста">
                    <input type="hidden" name="hotels[microdistrict][]" disabled  value="Фабрициуса">
                    <input type="hidden" name="hotels[microdistrict][]" disabled  value="Хоста">
                </ul>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <h4>Адлерский р-н</h4>
                <ul class="list-unstyled" id="dist_3">
                    <li>Адлер-центр</li>
                    <li>Блиново</li>
                    <li>Верхневеселое село</li>
                    <li>Верхнеимеретинская Бухта</li>
                    <li>Веселое село</li>
                    <li>Высокое село</li>
                    <li>Голубые Дали</li>
                    <li>Красная Поляна пос.</li>
                    <li>Курортный городок</li>
                    <li>Мирный</li>
                    <li>Молдовка село</li>
                    <li>Нижнеимеретинская Бухта</li>
                    <li>Олимпийская деревня</li>
                    <li>Орел-Изумруд село</li>
                    <li>Совхоз "Южные культуры"</li>
                    <li>Черемушки</li>
                    <li>Эсто-Садок пос.</li>
                    <input type="hidden" name="hotels[microdistrict][]" disabled  value="Адлер-центр">
                    <input type="hidden" name="hotels[microdistrict][]" disabled  value="Блиново">
                    <input type="hidden" name="hotels[microdistrict][]" disabled  value="Верхневеселое село">
                    <input type="hidden" name="hotels[microdistrict][]" disabled  value="Верхнеимеретинская Бухта">
                    <input type="hidden" name="hotels[microdistrict][]" disabled  value="Веселое село">
                    <input type="hidden" name="hotels[microdistrict][]" disabled  value="Высокое село">
                    <input type="hidden" name="hotels[microdistrict][]" disabled  value="Голубые Дали">
                    <input type="hidden" name="hotels[microdistrict][]" disabled  value="Красная Поляна пос.">
                    <input type="hidden" name="hotels[microdistrict][]" disabled  value="Курортный городок">
                    <input type="hidden" name="hotels[microdistrict][]" disabled  value="Мирный">
                    <input type="hidden" name="hotels[microdistrict][]" disabled  value="Молдовка село">
                    <input type="hidden" name="hotels[microdistrict][]" disabled  value="Нижнеимеретинская Бухта">
                    <input type="hidden" name="hotels[microdistrict][]" disabled  value="Олимпийская деревня">
                    <input type="hidden" name="hotels[microdistrict][]" disabled  value="Орел-Изумруд село">
                    <input type="hidden" name="hotels[microdistrict][]" disabled  value='Совхоз "Южные культуры"'>
                    <input type="hidden" name="hotels[microdistrict][]" disabled  value="Черемушки">
                    <input type="hidden" name="hotels[microdistrict][]" disabled  value="Эсто-Садок пос.">
                </ul>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <h4>Лазаревский р-н</h4>
                <ul class="list-unstyled" id="dist_4">
                    <li>Волковка село</li>
                    <li>Головинка пос.</li>
                    <li>Горное Лоо село</li>
                    <li>Дагомыс пос.</li>
                    <input type="hidden" name="hotels[microdistrict][]" disabled  value="Волковка село">
                    <input type="hidden" name="hotels[microdistrict][]" disabled  value="Головинка пос.">
                    <input type="hidden" name="hotels[microdistrict][]" disabled  value="Горное Лоо село">
                    <input type="hidden" name="hotels[microdistrict][]" disabled  value="Дагомыс пос.">
                </ul>
            </div>
            @if (isset($hotels['microdistrict']))
            <script>
                var microdistrict = JSON.parse('<?php echo addslashes(json_encode($hotels['microdistrict'])) ?>');
            </script>


            @endif
            <div class="clr"></div>	
        </div>	
    </section>

    <section class="hided_form">
        <section>
            <section>
                <div class="rooms_numbers stars">
                    <ul id="tabs2" class="nav nav-tabs" data-tabs="tabs">
                        <li class="active full_width">
                            <a href="#rooms" data-toggle="tab" aria-expanded="true">                                
                                Количество звезд                             
                            </a>
                        </li>
                    </ul>
                    <div class="btn-group radio" id="HotelStars">
                        <button type="button" data-HotelStars="1" class="btn {{isset($hotels['HotelStars']) && $hotels['HotelStars'] == 1  ? 'active' : '' }}">1</button>
                        <button type="button" data-HotelStars="2" class="btn {{isset($hotels['HotelStars']) && $hotels['HotelStars'] == 2  ? 'active' : '' }}">2</button>
                        <button type="button" data-HotelStars="3" class="btn {{isset($hotels['HotelStars']) && $hotels['HotelStars'] == 3  ? 'active' : '' }}">3</button>
                        <button type="button" data-HotelStars="4" class="btn {{isset($hotels['HotelStars']) && $hotels['HotelStars'] == 4  ? 'active' : '' }}">4</button>
                        <button type="button" data-HotelStars="5" class="btn {{isset($hotels['HotelStars']) && $hotels['HotelStars'] == 5  ? 'active' : '' }}">5</button>
                    </div>
                    <input type="hidden" name="hotels[HotelStars]" value="{{ isset($hotels['HotelStars']) ? $hotels['HotelStars'] : ''}}" {{ isset($hotels['HotelStars']) && $hotels['HotelStars'] ? '' : 'disabled'}}>
                </div>
                <div class="rooms_numbers prohod ">
                    <ul id="tabs2" class="nav nav-tabs" data-tabs="tabs">
                        <li class="active full_width">
                            <a href="#rooms" data-toggle="tab">                             
                                Количество номеров                            
                            </a>
                        </li>
                    </ul>
                    <?php
                    if (isset($hotels['NumberOfRooms'])) {
                        $hotels['OfRooms'] = explode(',', $hotels['NumberOfRooms']);
                    }
                    ?>
                    <div class="btn-group radio" id="NumberOfRooms">
                        <button type="button" data-NumberOfRooms="10" class="btn {{isset($hotels['OfRooms']) && in_array(10, $hotels['OfRooms']) ? 'active' : '' }}">от 10</button>
                        <button type="button" data-NumberOfRooms="20" class="btn {{isset($hotels['OfRooms']) && in_array(20, $hotels['OfRooms']) ? 'active' : '' }}">от 20</button>
                        <button type="button" data-NumberOfRooms="30" class="btn {{isset($hotels['OfRooms']) && in_array(30, $hotels['OfRooms']) ? 'active' : '' }}">от 30</button>                    
                    </div>
                    <input type="hidden" name="hotels[NumberOfRooms]" value="{{ isset($hotels['NumberOfRooms']) ? $hotels['NumberOfRooms'] : ''}}" {{ isset($hotels['NumberOfRooms']) && $hotels['NumberOfRooms'] ? '' : 'disabled'}} >
                </div>          

                <div>
                    <ul id="tabs2" class="nav nav-tabs" data-tabs="tabs">
                        <li class="active full_width">
                            <a href="#rooms" data-toggle="tab">Планировка				        	
                            </a>
                        </li>
                    </ul>
                    <?php
                    if (isset($hotels['layout'])) {
                        $hotels['f_layout'] = explode(',', $hotels['layout']);
                    }
                    ?>
                    <div class="btn-group" id="layout">
                        <button type="button" data-layout="Open" class="btn {{isset($hotels['f_layout'] ) && in_array("Open", $hotels['f_layout'] ) ? 'active' : '' }}">Открытая</button>
                        <button type="button" data-layout="Cabinet" class="btn {{isset($hotels['f_layout'] ) && in_array("Cabinet", $hotels['f_layout'] ) ? 'active' : '' }}">Кабинетная</button>
                        <button type="button" data-layout="Combined" class="btn {{isset($hotels['f_layout'] ) && in_array("Combined", $hotels['f_layout'] ) ? 'active' : '' }}">{{Lang::get('main.mixed')}}</button>				       
                    </div>
                    <input type="hidden" name="hotels[layout]" value="{{ isset($hotels['layout']) ? $hotels['layout'] : ''}}" {{ isset($hotels['layout']) && $hotels['layout'] ? '' : 'disabled'}} >
                </div>

                <div class="vid">
                    <ul id="tabs2" class="nav nav-tabs" data-tabs="tabs">
                        <li class="active full_width">
                            <a href="#rooms" data-toggle="tab" aria-expanded="true">                   Вид                           
                            </a>
                        </li>
                    </ul>
                    <div class="btn-group">
                        <button type="button" id="mountview" class="btn {{ isset($hotels['mountview']) && $hotels['mountview'] ? 'active' : ''}}">На горы</button>
                        <button type="button" id="seaview" class="btn {{ isset($hotels['seaview']) && $hotels['seaview'] ? 'active' : ''}}">На море</button>
                    </div>
                    <input type="hidden" name="hotels[mountview]" {!! isset($hotels['mountview']) && $hotels['mountview'] ? 'value="1" ' : 'disabled'!!}  >
                    <input type="hidden" name="hotels[seaview]" {!! isset($hotels['seaview']) && $hotels['seaview'] ? 'value="1" ' : 'disabled'!!} >              
                </div>
                <div class='clr'></div>
            </section>
            <section>
                <div class="rayon balcony">
                    <ul id="tabs2" class="nav nav-tabs" data-tabs="tabs">
                        <li class="active full_width">
                            <a aria-expanded="true" href="#area" data-toggle="tab">                             
                                {{Lang::get('main.Communication')}}                             
                            </a>
                        </li>
                    </ul>
                    <div id="balcony" style="position:relative;">
                        <a class="btn"><span class="select_title">Не важно</span><span class="select_btn"></span></a>
                        <div class="areas_list communication_list">
                            <div class="input_checkbox">
                                <label>Водоснабжение</label>
                                <input type="checkbox" class="communication" name="hotels[WaterSupply]" {{isset($hotels['WaterSupply'])  ? 'checked' : '' }} value="Connected">
                                <span></span>
                            </div>
                            <div class="input_checkbox">
                                <label>Газ</label>
                                <input type="checkbox" class="communication" name="hotels[GasType]" {{isset($hotels['GasType'])  ? 'checked' : '' }}  value="Connected">
                                <span></span>
                            </div>
                            <div class="input_checkbox">
                                <label>Канализация</label>
                                <input type="checkbox" class="communication" name="hotels[Sewage]" {{isset($hotels['Sewage'])  ? 'checked' : '' }}  value="Connected">
                                <span></span>
                            </div>
                            <div class="input_checkbox">
                                <label>Отопление</label>
                                <input type="checkbox" class="communication" name="hotels[Heating]" {{isset($hotels['Heating']) ? 'checked' : '' }}  value="Connected">
                                <span></span>
                            </div>
                            <div class="input_checkbox">
                                <label>Электричество</label>
                                <input type="checkbox" class="communication"  name="hotels[Electricity]" {{isset($hotels['Electricity'])  ? 'checked' : '' }}  value="Connected">
                                <span></span>
                            </div>
                        </div>
                    </div>                          
                </div>
                <div class="furniture">
                    <ul id="tabs2" class="nav nav-tabs" data-tabs="tabs">
                        <li class="active full_width">
                            <a href="#rooms" data-toggle="tab">                    Мебель                               
                            </a>
                        </li>
                    </ul>
                    <?php
                    if (isset($hotels['furniture'])) {
                        $hotels['f_furniture'] = explode(',', $hotels['furniture']);
                    }
                    ?>
                    <div class="btn-group" id="furniture">
                        <button type="button" class="btn {{isset($hotels['f_furniture']) && in_array("Full", $hotels['f_furniture']) ? 'active' : '' }}" data-furniture="Full">{{Lang::get('enums.Furniture.Full')}}</button>
                        <button type="button" class="btn {{isset($hotels['f_furniture']) && in_array("Part", $hotels['f_furniture']) ? 'active' : '' }}" data-furniture="Part">Частично</button>
                        <button type="button" class="btn {{isset($hotels['f_furniture']) && in_array("None", $hotels['f_furniture']) ? 'active' : '' }}" data-furniture="None">Без мебели</button>
                    </div>
                    <input type="hidden" name="hotels[furniture]"  value="{{ isset($hotels['furniture']) ? $hotels['furniture'] : ''}}" {{ isset($hotels['furniture']) && $hotels['furniture'] ? '' : 'disabled'}} >              
                </div>
                <div class='clr'></div>
            </section>           	
        </section>
    </section>
    <section class="boottom_blc">
        <div class="check_blc">
            <div class="slide_btn"><span></span><z>{{Lang::get('main.extend_search')}}</z></div>
            <div class="input_checkbox">
                <label>Отдельный вход</label>
                <input type="checkbox" name="hotels[SeparatedEntrance]" {{ isset($hotels['SeparatedEntrance']) && $hotels['SeparatedEntrance'] ? 'checked' : ''}} value="1">
                       <span></span>
            </div>
            <div class="input_checkbox">
                <label>Действующий бизнес</label>
                <input type="checkbox" name="hotels[Tenants]" {{ isset($hotels['Tenants']) && $hotels['Tenants'] ? 'checked' : ''}} value="1">
                       <span></span>
            </div>
            <div class="input_checkbox" style="display: none;">
                <label>{{Lang::get('main.first_floor')}}</label>
                <input type="checkbox"  class="full_form" name="hotels[First]" {{ isset($hotels['First']) && $hotels['First'] ? 'checked' : ''}} value="1">
                       <span></span>
            </div>
        </div>
        <div class="submit_blc">
            <span>{{isset($hotels) && isset($items) ? 'Найдено: '.count($items).' объекта' : ''}}</span>
            <input type="submit" value="ПОИСК">
        </div>
        <div class="clr"></div>
    </section>
    <input type="hidden" name="form_type" id="form_type" value="short">  
    {!! Form::close() !!}
</div>