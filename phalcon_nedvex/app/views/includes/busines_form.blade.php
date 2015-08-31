<div class="tab-pane-main active" id="busines" data-page_cont="busines">
    {!! Form::open(array('url' => '/busines', 'id' => 'busines_form', 'method' => 'get')) !!}
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
                <select class="form-control select" name="busines[dealtype]" >
                    <option {{ !isset($busines['dealtype']) ? 'selected' : '' }} value="">Не важно</option>
                    <option  value="Sell" {{isset($busines['dealtype']) && $busines['dealtype'] == "Sell" ? 'selected' : '' }}>Продажа</option>
                    <option  value="Rent" {{isset($busines['dealtype']) && $busines['dealtype'] == "Rent" ? 'selected' : '' }}>Аренда</option>
                </select>
            </div>
        </div>    
        <div class="price">
            <ul id="tabs3" class="nav nav-tabs" data-tabs="tabs">
                <li class="active">
                    <a href="#busine_hole" data-toggle="tab">				        	
                        общая / руб					        	
                    </a>
                </li>
                <li>
                    <a href="#busines_meters" data-toggle="tab">			        	
                        руб / m<sup>2</sup>					        	
                    </a>
                </li>
            </ul>
            <div id="my-tab-content2" class="tab-content">
                <div class="tab-pane active" id="busine_hole">
                    <div  id="my-tab-content" class="tab-content">
                        <input class="text required no number" name="busines[costfrom]" placeholder="Не важно" value="{{ isset($busines['costfrom']) ? $busines['costfrom'] : ''}}"><span class="glyphicon glyphicon-minus"></span><input class="text required no number" name="busines[costto]" placeholder="Не важно" value="{{isset($busines['costto']) ? $busines['costto'] : ''}}">
                    </div>
                </div>
                <div class="tab-pane" id="busines_meters">
                    <div  id="my-tab-content" class="tab-content">
                        <input class="text number"  name="busines[PricePerMFrom]"  placeholder="Не важно" value="{{ isset($busines['PricePerMFrom']) ? $busines['PricePerMFrom'] : ''}}"><span class="glyphicon glyphicon-minus"></span><input class="text number" name="busines[PricePerMTo]" placeholder="Не важно" value="{{isset($busines['PricePerMTo']) ? $busines['PricePerMTo'] : ''}}">
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
                    <input class="text required no square_mask" name="busines[sizefrom]" placeholder="Не важно" value="{{ isset($busines['sizefrom']) ? $busines['sizefrom'] : ''}}"><span class="glyphicon glyphicon-minus"></span><input class="text required no square_mask" name="busines[sizeto]" placeholder="Не важно" value="{{ isset($busines['sizeto']) ? $busines['sizeto'] : ''}}">
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
            if (isset($busines['furnish'])) {
                $busines['f_furnish'] = explode(',', $busines['furnish']);
            }
            ?>
            <div class="btn-group" id="furnish">
                <button type="button" data-furnish="Raw" class="btn {{isset($busines['f_furnish']) && in_array("Raw", $busines['f_furnish']) ? 'active' : '' }}">Черновая</button>
                <button type="button" data-furnish="Clean" class="btn {{isset($busines['f_furnish']) && in_array("Clean", $busines['f_furnish']) ? 'active' : '' }}">Чистовая</button>
                <button type="button" data-furnish="Repair" class="btn {{isset($busines['f_furnish']) && in_array("Repair", $busines['f_furnish']) ? 'active' : '' }}">Ремонт</button>                     
            </div>
            <input type="hidden" name="busines[furnish]" value="{{ isset($busines['furnish']) ? $busines['furnish'] : ''}}" {{ isset($busines['furnish']) && $busines['furnish'] ? '' : 'disabled'}} >
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

                    <input type="hidden" name="busines[microdistrict][]" disabled  value="Донская">
                    <input type="hidden" name="busines[microdistrict][]" disabled  value="Завокзальный">
                    <input type="hidden" name="busines[microdistrict][]" disabled  value="Заречный">
                    <input type="hidden" name="busines[microdistrict][]" disabled  value="КСМ">
                    <input type="hidden" name="busines[microdistrict][]" disabled  value="Макаренко">
                    <input type="hidden" name="busines[microdistrict][]" disabled  value="Мамайкаф">
                    <input type="hidden" name="busines[microdistrict][]" disabled  value="Новый Сочи">
                    <input type="hidden" name="busines[microdistrict][]" disabled  value="Центр">
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
                    <input type="hidden" name="busines[microdistrict][]" disabled  value="Барановка село">
                    <input type="hidden" name="busines[microdistrict][]" disabled  value="Большой Ахун">
                    <input type="hidden" name="busines[microdistrict][]" disabled  value="Бытха">
                    <input type="hidden" name="busines[microdistrict][]" disabled  value="Верхний Юрт село">
                    <input type="hidden" name="busines[microdistrict][]" disabled  value="Измайловка село">
                    <input type="hidden" name="busines[microdistrict][]" disabled  value="Краевско-Армянское село">
                    <input type="hidden" name="busines[microdistrict][]" disabled  value="Кудепста пос.">
                    <input type="hidden" name="busines[microdistrict][]" disabled  value="Малая Объездная">
                    <input type="hidden" name="busines[microdistrict][]" disabled  value="Малый Ахун">
                    <input type="hidden" name="busines[microdistrict][]" disabled  value="Мацестинская Долина">
                    <input type="hidden" name="busines[microdistrict][]" disabled  value="Новая Мацеста">
                    <input type="hidden" name="busines[microdistrict][]" disabled  value="Пластунка село">
                    <input type="hidden" name="busines[microdistrict][]" disabled  value="Приморье">
                    <input type="hidden" name="busines[microdistrict][]" disabled  value="Раздольное село">
                    <input type="hidden" name="busines[microdistrict][]" disabled  value="Светлана">
                    <input type="hidden" name="busines[microdistrict][]" disabled  value="Соболевка">
                    <input type="hidden" name="busines[microdistrict][]" disabled  value='Совхоз "Приморский"'>
                    <input type="hidden" name="busines[microdistrict][]" disabled  value="Старая Мацеста">
                    <input type="hidden" name="busines[microdistrict][]" disabled  value="Фабрициуса">
                    <input type="hidden" name="busines[microdistrict][]" disabled  value="Хоста">
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
                    <input type="hidden" name="busines[microdistrict][]" disabled  value="Адлер-центр">
                    <input type="hidden" name="busines[microdistrict][]" disabled  value="Блиново">
                    <input type="hidden" name="busines[microdistrict][]" disabled  value="Верхневеселое село">
                    <input type="hidden" name="busines[microdistrict][]" disabled  value="Верхнеимеретинская Бухта">
                    <input type="hidden" name="busines[microdistrict][]" disabled  value="Веселое село">
                    <input type="hidden" name="busines[microdistrict][]" disabled  value="Высокое село">
                    <input type="hidden" name="busines[microdistrict][]" disabled  value="Голубые Дали">
                    <input type="hidden" name="busines[microdistrict][]" disabled  value="Красная Поляна пос.">
                    <input type="hidden" name="busines[microdistrict][]" disabled  value="Курортный городок">
                    <input type="hidden" name="busines[microdistrict][]" disabled  value="Мирный">
                    <input type="hidden" name="busines[microdistrict][]" disabled  value="Молдовка село">
                    <input type="hidden" name="busines[microdistrict][]" disabled  value="Нижнеимеретинская Бухта">
                    <input type="hidden" name="busines[microdistrict][]" disabled  value="Олимпийская деревня">
                    <input type="hidden" name="busines[microdistrict][]" disabled  value="Орел-Изумруд село">
                    <input type="hidden" name="busines[microdistrict][]" disabled  value='Совхоз "Южные культуры"'>
                    <input type="hidden" name="busines[microdistrict][]" disabled  value="Черемушки">
                    <input type="hidden" name="busines[microdistrict][]" disabled  value="Эсто-Садок пос.">
                </ul>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <h4>Лазаревский р-н</h4>
                <ul class="list-unstyled" id="dist_4">
                    <li>Волковка село</li>
                    <li>Головинка пос.</li>
                    <li>Горное Лоо село</li>
                    <li>Дагомыс пос.</li>
                    <input type="hidden" name="busines[microdistrict][]" disabled  value="Волковка село">
                    <input type="hidden" name="busines[microdistrict][]" disabled  value="Головинка пос.">
                    <input type="hidden" name="busines[microdistrict][]" disabled  value="Горное Лоо село">
                    <input type="hidden" name="busines[microdistrict][]" disabled  value="Дагомыс пос.">
                </ul>
            </div>
            @if (isset($busines['microdistrict']))
            <script>
                var microdistrict = JSON.parse('<?php echo addslashes(json_encode($busines['microdistrict'])) ?>');
            </script>


            @endif
            <div class="clr"></div>	
        </div>	
    </section>

    <section class="hided_form">
        <section>
            <section>
                <div class="vid">
                    <ul id="tabs2" class="nav nav-tabs" data-tabs="tabs">
                        <li class="active full_width">
                            <a href="#rooms" data-toggle="tab">                   Вид                           
                            </a>
                        </li>
                    </ul>
                    <div class="btn-group">
                        <button type="button" id="mountview" class="btn {{ isset($busines['mountview']) && $busines['mountview'] ? 'active' : ''}}">На горы</button>
                        <button type="button" id="seaview" class="btn {{ isset($busines['seaview']) && $busines['seaview'] ? 'active' : ''}}">На море</button>
                    </div>
                    <input type="hidden" name="busines[mountview]" {{ isset($busines['mountview']) && $busines['mountview'] ? 'value="1" ' : 'disabled'}}  >
                    <input type="hidden" name="busines[seaview]" {{ isset($busines['seaview']) && $busines['seaview'] ? 'value="1" ' : 'disabled'}} >              
                </div>
                <div>
                    <ul id="tabs2" class="nav nav-tabs" data-tabs="tabs">
                        <li class="active full_width">
                            <a href="#rooms" data-toggle="tab">Планировка				        	
                            </a>
                        </li>
                    </ul>
                    <?php
                    if (isset($busines['layout'])) {
                        $busines['f_layout'] = explode(',', $busines['layout']);
                    }
                    ?>
                    <div class="btn-group" id="layout">
                        <button type="button" data-layout="Open" class="btn {{isset($busines['f_layout'] ) && in_array("Open", $busines['f_layout'] ) ? 'active' : '' }}">Открытая</button>
                        <button type="button" data-layout="Cabinet" class="btn {{isset($busines['f_layout'] ) && in_array("Cabinet", $busines['f_layout'] ) ? 'active' : '' }}">Кабинетная</button>
                        <button type="button" data-layout="Combined" class="btn {{isset($busines['f_layout'] ) && in_array("Combined", $busines['f_layout'] ) ? 'active' : '' }}">{{Lang::get('main.mixed')}}</button>				       
                    </div>
                    <input type="hidden" name="busines[layout]" value="{{ isset($busines['layout']) ? $busines['layout'] : ''}}" {{ isset($busines['layout']) && $busines['layout'] ? '' : 'disabled'}} >
                </div>
                <div class="rooms_numbers prohod ">
                    <ul id="tabs2" class="nav nav-tabs" data-tabs="tabs">
                        <li class="active full_width">
                            <a href="#rooms" data-toggle="tab">                             
                                Проходимость                             
                            </a>
                        </li>
                    </ul>
                    <?php
                    if (isset($busines['passability'])) {
                        $busines['f_passability'] = explode(',', $busines['passability']);
                    }
                    ?>
                    <div class="btn-group" id="passability">
                        <button type="button" data-passability="Low" class="btn {{isset($busines['f_passability']) && in_array("Low", $busines['f_passability']) ? 'active' : '' }}">Низкая</button>
                        <button type="button" data-passability="Normal" class="btn {{isset($busines['f_passability']) && in_array("Normal", $busines['f_passability']) ? 'active' : '' }}">Средняя</button>
                        <button type="button" data-passability="High" class="btn {{isset($busines['f_passability']) && in_array("High", $busines['f_passability']) ? 'active' : '' }}">Высокая</button>                    
                    </div>
                    <input type="hidden" name="busines[passability]" value="{{ isset($busines['passability']) ? $busines['passability'] : ''}}" {{ isset($busines['passability']) && $busines['passability'] ? '' : 'disabled'}} >
                </div>
                <div class="rooms_numbers distance">
                    <ul id="tabs2" class="nav nav-tabs" data-tabs="tabs">
                        <li class="active full_width">
                            <a href="#rooms" data-toggle="tab">					        	
                                Расстояние до моря					        	
                            </a>
                        </li>
                    </ul>
                    <div class="btn-group radio" id="seadistance">
                        <button type="button" data-seadistance="500" class="btn {{isset($busines['seadistance']) && $busines['seadistance'] == 500 ? 'active' : '' }}">До 500 м</button>
                        <button type="button" data-seadistance="1000" class="btn {{isset($busines['seadistance']) && $busines['seadistance'] == 1000 ? 'active' : '' }}">До 1 км</button>
                        <button type="button" data-seadistance="5000" class="btn {{isset($busines['seadistance']) && $busines['seadistance'] == 5000? 'active' : '' }}">До 5 км</button>
                    </div>
                    <input type="hidden" name="busines[seadistance]" value="{{ isset($busines['seadistance']) ? $busines['seadistance'] : ''}}" {{ isset($busines['seadistance']) && $busines['seadistance'] ? '' : 'disabled'}} >
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
                                <input type="checkbox" class="communication" name="busines[WaterSupply]" {{isset($busines['WaterSupply'])  ? 'checked' : '' }} value="Connected">
                                <span></span>
                            </div>
                            <div class="input_checkbox">
                                <label>Газ</label>
                                <input type="checkbox" class="communication" name="busines[GasType]" {{isset($busines['GasType'])  ? 'checked' : '' }}  value="Connected">
                                <span></span>
                            </div>
                            <div class="input_checkbox">
                                <label>Канализация</label>
                                <input type="checkbox" class="communication" name="busines[Sewage]" {{isset($busines['Sewage'])  ? 'checked' : '' }}  value="Connected">
                                <span></span>
                            </div>
                            <div class="input_checkbox">
                                <label>Отопление</label>
                                <input type="checkbox" class="communication" name="busines[Heating]" {{isset($busines['Heating']) ? 'checked' : '' }}  value="Connected">
                                <span></span>
                            </div>
                            <div class="input_checkbox">
                                <label>Электричество</label>
                                <input type="checkbox" class="communication"  name="busines[Electricity]" {{isset($busines['Electricity'])  ? 'checked' : '' }}  value="Connected">
                                <span></span>
                            </div>
                        </div>
                    </div>                          
                </div>
                <div class="check_blc"> 
                    <div class="input_checkbox">
                        <label>Оборудование</label>
                        <input type="checkbox" name="busines[equipment]" {{ isset($busines['equipment']) && $busines['equipment'] ? 'checked' : ''}} value="1">
                               <span></span>
                    </div>
                    <div class="input_checkbox">
                        <label>Первый этаж</label>
                        <input type="checkbox" name="busines[First]" {{ isset($busines['First']) && $busines['First'] ? 'checked' : ''}} value="1">
                               <span></span>
                    </div>
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
                <input type="checkbox" name="busines[SeparatedEntrance]" {{ isset($busines['SeparatedEntrance']) && $busines['SeparatedEntrance'] ? 'checked' : ''}} value="1">
                       <span></span>
            </div>
            <div class="input_checkbox">
                <label>Действующий бизнес</label>
                <input type="checkbox" name="busines[Tenants]" {{ isset($busines['Tenants']) && $busines['Tenants'] ? 'checked' : ''}} value="1">
                       <span></span>
            </div>
        </div>
        <div class="submit_blc">
            <span>{{isset($busines) && isset($items) ? 'Найдено: '.count($items).' объекта' : ''}}</span>
            <input type="submit" value="ПОИСК">
        </div>
        <div class="clr"></div>
    </section>
    <input type="hidden" name="form_type" id="form_type" value="short">
    {!! Form::close() !!}
</div>