<div class="tab-pane-main" id="houses" data-page_cont="houses" >
    {!! Form::open(array('url' => '/houses', 'id' => 'houses_form', 'method' => 'get')) !!}
    <section style="position:relative">    
        <div class="price">
            <ul id="tabs3" class="nav nav-tabs" data-tabs="tabs">
                <li class="active">
                    <a href="#house_hole" data-toggle="tab">				        	
                        общая / руб					        	
                    </a>
                </li>
                <li>
                    <a href="#house_meters" data-toggle="tab">			        	
                        руб / m<sup>2</sup>					        	
                    </a>
                </li>
            </ul>
            <div id="my-tab-content2" class="tab-content">
                <div class="tab-pane active" id="house_hole">
                    <div  id="my-tab-content" class="tab-content">
                        <input class="text number" name="houses[PriceFrom]" placeholder="Не важно" value="{{ isset($houses['PriceFrom']) ? $houses['PriceFrom'] : ''}}"><span class="glyphicon glyphicon-minus"></span><input class="text number" name="houses[PriceTo]" placeholder="Не важно" value="{{isset($houses['PriceTo']) ? $houses['PriceTo'] : ''}}">
                    </div>
                </div>
                <div class="tab-pane" id="house_meters">
                    <div  id="my-tab-content" class="tab-content">
                        <input class="text number"  name="houses[PricePerMFrom]"  placeholder="Не важно" value="{{ isset($houses['PricePerMFrom']) ? $houses['PricePerMFrom'] : ''}}"><span class="glyphicon glyphicon-minus"></span><input class="text number" name="houses[PricePerMTo]" placeholder="Не важно" value="{{isset($houses['PricePerMTo']) ? $houses['PricePerMTo'] : ''}}">
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
                    <input class="text square_mask" name="houses[sizefrom]" placeholder="Не важно" value="{{ isset($houses['sizefrom']) ? $houses['sizefrom'] : ''}}"><span class="glyphicon glyphicon-minus"></span><input class="text square_mask" name="houses[sizeto]" placeholder="Не важно" value="{{ isset($houses['sizeto']) ? $houses['sizeto'] : ''}}">
                </div>
            </div>
        </div>
        <div class="rooms_numbers">
            <ul id="tabs2" class="nav nav-tabs" data-tabs="tabs">
                <li class="active full_width">
                    <a href="#rooms" data-toggle="tab">					        	
                        Тип дома					        	
                    </a>
                </li>
            </ul>
            <?php
            if (isset($houses['housetype'])) {
                $houses['f_house_type'] = explode(',', $houses['housetype']);
            }
            ?>
            <div class="btn-group" id="housetype">
                <button type="button" data-housetype="Standalone" class="btn {{isset($houses['f_house_type']) && in_array("Standalone", $houses['f_house_type']) ? 'active' : '' }}">Дом</button>
                <button type="button" data-housetype="Townhouse" class="btn {{isset($houses['f_house_type']) && in_array("Townhouse", $houses['f_house_type']) ? 'active' : '' }}">Таунхаус</button>
                <button type="button" data-housetype="Partial" class="btn {{isset($houses['f_house_type']) && in_array("Partial", $houses['f_house_type']) ? 'active' : '' }}">Часть дома</button>
                <button type="button" data-housetype="Duplex" class="btn {{isset($houses['f_house_type']) && in_array("Duplex", $houses['f_house_type']) ? 'active' : '' }}">Дуплекс</button>
            </div>
            <input type="hidden" name="houses[housetype]" value="{{ isset($houses['housetype']) ? $houses['housetype'] : ''}}" {{ isset($houses['housetype']) && $houses['housetype'] ? '' : 'disabled'}} >
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

                    <input type="hidden" name="houses[microdistrict][]" disabled  value="Донская">
                    <input type="hidden" name="houses[microdistrict][]" disabled  value="Завокзальный">
                    <input type="hidden" name="houses[microdistrict][]" disabled  value="Заречный">
                    <input type="hidden" name="houses[microdistrict][]" disabled  value="КСМ">
                    <input type="hidden" name="houses[microdistrict][]" disabled  value="Макаренко">
                    <input type="hidden" name="houses[microdistrict][]" disabled  value="Мамайкаф">
                    <input type="hidden" name="houses[microdistrict][]" disabled  value="Новый Сочи">
                    <input type="hidden" name="houses[microdistrict][]" disabled  value="Центр">
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
                    <input type="hidden" name="houses[microdistrict][]" disabled  value="Барановка село">
                    <input type="hidden" name="houses[microdistrict][]" disabled  value="Большой Ахун">
                    <input type="hidden" name="houses[microdistrict][]" disabled  value="Бытха">
                    <input type="hidden" name="houses[microdistrict][]" disabled  value="Верхний Юрт село">
                    <input type="hidden" name="houses[microdistrict][]" disabled  value="Измайловка село">
                    <input type="hidden" name="houses[microdistrict][]" disabled  value="Краевско-Армянское село">
                    <input type="hidden" name="houses[microdistrict][]" disabled  value="Кудепста пос.">
                    <input type="hidden" name="houses[microdistrict][]" disabled  value="Малая Объездная">
                    <input type="hidden" name="houses[microdistrict][]" disabled  value="Малый Ахун">
                    <input type="hidden" name="houses[microdistrict][]" disabled  value="Мацестинская Долина">
                    <input type="hidden" name="houses[microdistrict][]" disabled  value="Новая Мацеста">
                    <input type="hidden" name="houses[microdistrict][]" disabled  value="Пластунка село">
                    <input type="hidden" name="houses[microdistrict][]" disabled  value="Приморье">
                    <input type="hidden" name="houses[microdistrict][]" disabled  value="Раздольное село">
                    <input type="hidden" name="houses[microdistrict][]" disabled  value="Светлана">
                    <input type="hidden" name="houses[microdistrict][]" disabled  value="Соболевка">
                    <input type="hidden" name="houses[microdistrict][]" disabled  value='Совхоз "Приморский"'>
                    <input type="hidden" name="houses[microdistrict][]" disabled  value="Старая Мацеста">
                    <input type="hidden" name="houses[microdistrict][]" disabled  value="Фабрициуса">
                    <input type="hidden" name="houses[microdistrict][]" disabled  value="Хоста">
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
                    <input type="hidden" name="houses[microdistrict][]" disabled  value="Адлер-центр">
                    <input type="hidden" name="houses[microdistrict][]" disabled  value="Блиново">
                    <input type="hidden" name="houses[microdistrict][]" disabled  value="Верхневеселое село">
                    <input type="hidden" name="houses[microdistrict][]" disabled  value="Верхнеимеретинская Бухта">
                    <input type="hidden" name="houses[microdistrict][]" disabled  value="Веселое село">
                    <input type="hidden" name="houses[microdistrict][]" disabled  value="Высокое село">
                    <input type="hidden" name="houses[microdistrict][]" disabled  value="Голубые Дали">
                    <input type="hidden" name="houses[microdistrict][]" disabled  value="Красная Поляна пос.">
                    <input type="hidden" name="houses[microdistrict][]" disabled  value="Курортный городок">
                    <input type="hidden" name="houses[microdistrict][]" disabled  value="Мирный">
                    <input type="hidden" name="houses[microdistrict][]" disabled  value="Молдовка село">
                    <input type="hidden" name="houses[microdistrict][]" disabled  value="Нижнеимеретинская Бухта">
                    <input type="hidden" name="houses[microdistrict][]" disabled  value="Олимпийская деревня">
                    <input type="hidden" name="houses[microdistrict][]" disabled  value="Орел-Изумруд село">
                    <input type="hidden" name="houses[microdistrict][]" disabled  value='Совхоз "Южные культуры"'>
                    <input type="hidden" name="houses[microdistrict][]" disabled  value="Черемушки">
                    <input type="hidden" name="houses[microdistrict][]" disabled  value="Эсто-Садок пос.">
                </ul>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <h4>Лазаревский р-н</h4>
                <ul class="list-unstyled" id="dist_4">
                    <li>Волковка село</li>
                    <li>Головинка пос.</li>
                    <li>Горное Лоо село</li>
                    <li>Дагомыс пос.</li>
                    <input type="hidden" name="houses[microdistrict][]" disabled  value="Волковка село">
                    <input type="hidden" name="houses[microdistrict][]" disabled  value="Головинка пос.">
                    <input type="hidden" name="houses[microdistrict][]" disabled  value="Горное Лоо село">
                    <input type="hidden" name="houses[microdistrict][]" disabled  value="Дагомыс пос.">
                </ul>
            </div>
            @if (isset($houses['microdistrict']))
            <script>
                var microdistrict = JSON.parse('<?php echo addslashes(json_encode($houses['microdistrict'])) ?>');
            </script>


            @endif
            <div class="clr"></div>	
        </div>	
    </section>

    <section class="hided_form">
        <section>
            <section>
                <div>
                    <ul id="tabs2" class="nav nav-tabs" data-tabs="tabs">
                        <li class="active full_width">
                            <a href="#rooms" data-toggle="tab">						Отделка				        	
                            </a>
                        </li>
                    </ul>
                    <?php
                    if (isset($houses['furnish'])) {
                        $houses['f_furnish'] = explode(',', $houses['furnish']);
                    }
                    ?>
                    <div class="btn-group" id="furnish">
                        <button type="button" data-furnish="Raw" class="btn {{isset($houses['f_furnish'] ) && in_array("Raw", $houses['f_furnish'] ) ? 'active' : '' }}">Черновая</button>
                        <button type="button" data-furnish="Clean" class="btn {{isset($houses['f_furnish'] ) && in_array("Clean", $houses['f_furnish'] ) ? 'active' : '' }}">Чистовая</button>
                        <button type="button" data-furnish="Repair" class="btn {{isset($houses['f_furnish'] ) && in_array("Repair", $houses['f_furnish'] ) ? 'active' : '' }}">Ремонт</button>				       
                    </div>
                    <input type="hidden" name="houses[furnish]" value="{{ isset($houses['furnish']) ? $houses['furnish'] : ''}}" {{ isset($houses['furnish']) && $houses['furnish'] ? '' : 'disabled'}} >
                </div>
                <div class="rayon balcony">
                    <ul id="tabs2" class="nav nav-tabs" data-tabs="tabs">
                        <li class="active full_width">
                            <a href="#area" data-toggle="tab">					        	
                                {{Lang::get('main.Communication')}}					        	
                            </a>
                        </li>
                    </ul>
                    <div id="balcony"  style="position:relative;">
                        <a class="btn"><span class="select_title">Не важно</span> <span class="select_btn" ></span></a>
                        <div class="areas_list communication_list">
                            <div class="input_checkbox">
                                <label>Водоснабжение</label>
                                <input type="checkbox" class="communication" name="houses[WaterSupply]" {{isset($houses['WaterSupply'])  ? 'checked' : '' }} value="Connected">
                                <span></span>
                            </div>
                            <div class="input_checkbox">
                                <label>Газ</label>
                                <input type="checkbox" class="communication" name="houses[GasType]" {{isset($houses['GasType'])  ? 'checked' : '' }}  value="Connected">
                                <span></span>
                            </div>
                            <div class="input_checkbox">
                                <label>Канализация</label>
                                <input type="checkbox" class="communication" name="houses[Sewage]" {{isset($houses['Sewage'])  ? 'checked' : '' }}  value="Connected">
                                <span></span>
                            </div>
                            <div class="input_checkbox">
                                <label>Отопление</label>
                                <input type="checkbox" class="communication" name="houses[Heating]" {{isset($houses['Heating']) ? 'checked' : '' }}  value="Connected">
                                <span></span>
                            </div>
                            <div class="input_checkbox">
                                <label>Электричество</label>
                                <input type="checkbox" class="communication"  name="houses[Electricity]" {{isset($houses['Electricity'])  ? 'checked' : '' }}  value="Connected">
                                <span></span>
                            </div>
                        </div>
                    </div>
     			          	
                </div>
                <div class="rooms_numbers">
                    <ul id="tabs2" class="nav nav-tabs" data-tabs="tabs">
                        <li class="active full_width">
                            <a href="#rooms" data-toggle="tab">					        	
                                Расстояние до моря					        	
                            </a>
                        </li>
                    </ul>
                    <div class="btn-group radio" id="seadistance">
                        <button type="button" data-seadistance="500" class="btn {{isset($houses['seadistance']) && $houses['seadistance'] == 500 ? 'active' : '' }}">До 500 м</button>
                        <button type="button" data-seadistance="1000" class="btn {{isset($houses['seadistance']) && $houses['seadistance'] == 1000 ? 'active' : '' }}">До 1 км</button>
                        <button type="button" data-seadistance="5000" class="btn {{isset($houses['seadistance']) && $houses['seadistance'] == 5000? 'active' : '' }}">До 5 км</button>
                    </div>
                    <input type="hidden" name="houses[seadistance]" value="{{ isset($houses['seadistance']) ? $houses['seadistance'] : ''}}" {{ isset($houses['seadistance']) && $houses['seadistance'] ? '' : 'disabled'}} >
                </div>
                   
                <div class='clr responsive_none'></div>
           
                <div class="vid">
                    <ul id="tabs2" class="nav nav-tabs" data-tabs="tabs">
                        <li class="active full_width">
                            <a href="#rooms" data-toggle="tab">					  Вид				        	
                            </a>
                        </li>
                    </ul>
                    <div class="btn-group">
                        <button type="button" id="mountview" class="btn {{ isset($houses['mountview']) && $houses['mountview'] ? 'active' : ''}}">На горы</button>
                        <button type="button" id="seaview" class="btn {{ isset($houses['seaview']) && $houses['seaview'] ? 'active' : ''}}">На море</button>
                    </div>
                    <input type="hidden" name="houses[mountview]" {!! isset($houses['mountview']) && $houses['mountview'] ? 'value="1" ' : 'disabled'!!}  >
                    <input type="hidden" name="houses[seaview]" {!! isset($houses['seaview']) && $houses['seaview'] ? 'value="1" ' : 'disabled'!!} >              
                </div>
                <div class="square">
                    <ul id="tabs4" class="nav nav-tabs" data-tabs="tabs">
                        <li class="active full_width">
                            <a href="#squarem" data-toggle="tab">					        	
                                Площадь ЗУ / m<sup>2</sup>					        	
                            </a>
                        </li>
                    </ul>
                    <div class="tab-pane active" id="squarem">
                        <div  id="my-tab-content" class="tab-content">					          
                            <input class="text square_mask" name="houses[areafrom]" placeholder="Не важно" value="{{ isset($houses['areafrom']) ? $houses['areafrom'] : ''}}"><span class="glyphicon glyphicon-minus"></span><input class="text square_mask" name="houses[areato]" placeholder="Не важно" value="{{ isset($houses['areato']) ? $houses['areato'] : ''}}">
                        </div>
                    </div>
                </div>
                <div class="rooms_numbers">
                    <ul id="tabs2" class="nav nav-tabs" data-tabs="tabs">
                        <li class="active full_width">
                            <a href="#rooms" data-toggle="tab">					        	
                                Право на землю					        	
                            </a>
                        </li>
                    </ul>
                    <?php
                    if (isset($houses['ownership'])) {
                        $houses['owner'] = explode(',', $houses['ownership']);
                    }
                    ?>
                    <div class="btn-group" id="ownership">
                        <button type="button" data-ownership="Owner" class="btn {{isset($houses['owner']) && in_array("Owner", $houses['owner']) ? 'active' : '' }}">Собственность</button>
                        <button type="button" data-ownership="Rent" class="btn {{isset($houses['owner']) && in_array("Rent", $houses['owner']) ? 'active' : '' }}">Аренда</button>                    
                    </div>
                    <input type="hidden" name="houses[ownership]" value="{{ isset($houses['ownership']) ? $houses['ownership'] : ''}}" {{ isset($houses['ownership']) && $houses['ownership'] ? '' : 'disabled'}} >
                </div>
                <div class='clr'></div>
            </section>           	
        </section>
    </section>
    <section class="boottom_blc">
        <div class="check_blc">
            <div class="slide_btn"><span></span><z>{{Lang::get('main.extend_search')}}</z></div>
            <div class="input_checkbox">
                <label>{{Lang::get('main.elite_build')}}</label>
                <input type="checkbox" name="houses[elite]" {{ isset($houses['elite']) && $houses['elite'] ? 'checked' : ''}} value="1">
                       <span></span>
            </div>
            <div class="input_checkbox">
                <label>Ипотека</label>
                <input type="checkbox" name="houses[mortgage]" {{ isset($houses['mortgage']) && $houses['mortgage'] ? 'checked' : ''}} value="1">
                       <span></span>
            </div>
        </div>
        <div class="submit_blc">
            <span>{{isset($pagination['total_count']) && $pagination['total_count'] ? 'Найдено: '.$pagination['total_count'].' объекта' : ''}}</span>
            <input type="submit" value="ПОИСК">
        </div>
        <div class="clr"></div>
    </section>
    <input type="hidden" name="form_type" id="form_type" value="short">
    {!! Form::close() !!}
</div>

