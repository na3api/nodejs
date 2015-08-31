<div class="tab-pane-main" id="areas" data-page_cont="areas" >
    {!! Form::open(array('url' => '/areas', 'id' => 'areas_form', 'method' => 'get')) !!}
    <section style="position:relative" class="float_for_section">    				    
        <div class="rooms_numbers">
            <ul id="tabs2" class="nav nav-tabs" data-tabs="tabs">
                <li class="active full_width">
                    <a href="#rooms" data-toggle="tab">					        	
                        тип сделки					        	
                    </a>
                </li>
            </ul>
            <div class="tab_contento">
                <select class="form-control select" name="areas[dealtype]" >
                    <option {{ !isset($areas['dealtype']) ? 'selected' : '' }} value="">Не важно</option>
                    <option  value="1" {{isset($areas['dealtype']) && $areas['dealtype'] == 1 ? 'selected' : '' }}>Продажа</option>
                    <option  value="2" {{isset($areas['dealtype']) && $areas['dealtype'] == 2 ? 'selected' : '' }}>Аренда</option>
                </select>
            </div>
        </div>
        <div class="rooms_numbers areas_adapt_rooms" >
            <ul id="tabs3" class="nav nav-tabs" data-tabs="tabs">
                <li class="active for_adaptive full_width">
                    <a href="#hole" data-toggle="tab" class="color_for_tab">                          
                        Целевое назначение                            
                    </a>
                </li>
                <li style="display:none" class="show_tab ">
                    <a href="#meters" data-toggle="tab" class="color_for_tab">                        
                        зона
                    </a>
                </li>
            </ul>
            <div id="my-tab-content2" class="tab-content" style="position:relative;">
                <div class="tab-pane active" id="hole">
                    <select class="form-control select first" name="areas[LandPurpose]" >
                        <option {{ !isset($areas['LandPurpose']) ? 'selected' : '' }} value="">Не важно</option>
                        <option  value="OwnBuilding" {{isset($areas['LandPurpose']) && $areas['LandPurpose'] == "OwnBuilding"? 'selected' : '' }}>Индивидуальное жилищное строительство</option>
                        <option  value="Commerce" {{isset($areas['LandPurpose']) && $areas['LandPurpose'] == "Commerce" ? 'selected' : '' }}>Коммерческое использование</option>
                        <option  value="Flats" {{isset($areas['LandPurpose']) && $areas['LandPurpose'] == "Flats" ? 'selected' : '' }}>Многоквартирное строительство</option>
                        <option  value="Garden" {{isset($areas['LandPurpose']) && $areas['LandPurpose'] == "Garden" ? 'selected' : '' }}>Промышленное назназначение</option>
                        <option  value="Other" {{isset($areas['LandPurpose']) && $areas['LandPurpose'] == "Other" ? 'selected' : '' }}>Другое</option>
                    </select>
                    <select class="form-control select second_select" name="areas[Zone]" {{ !isset($areas['Zone']) ? 'disabled' : '' }}>
                        <option value="" {{ !isset($areas['Zone']) ? 'selected' : '' }}>Не важно</option>
                        <option value="G1" {{isset($areas['Zone']) && $areas['Zone'] == "G1" ? 'selected' : '' }}>Ж-1</option>
                        <option value="G2" {{isset($areas['Zone']) && $areas['Zone'] == "G2" ? 'selected' : '' }}>Ж-2</option>
                        <option value="G3" {{isset($areas['Zone']) && $areas['Zone'] == "G3" ? 'selected' : '' }}>Ж-3</option>
                        <option value="G4" {{isset($areas['Zone']) && $areas['Zone'] == "G4" ? 'selected' : '' }}>Ж-4</option>
                        <option value="G5" {{isset($areas['Zone']) && $areas['Zone'] == "G5" ? 'selected' : '' }}>Ж-5</option>
                        <option value="G6" {{isset($areas['Zone']) && $areas['Zone'] == "G6" ? 'selected' : '' }}>Ж-6</option>
                    </select>
                    @if(isset($areas['Zone']))
                        <script>var areas_zone = {{$areas['Zone']}}</script>
                    @endif
                    <div class="clr"></div>
                </div>
            </div>

        </div>
        <div class="price ">
            <ul id="tabs3" class="nav nav-tabs" data-tabs="tabs">
                <li class="active ">
                    <a href="#areas_hole" data-toggle="tab">				        	
                        общая / руб					        	
                    </a>
                </li>
                <li>
                    <a href="#areas_meters" data-toggle="tab">			        	
                        руб / сотка
                    </a>
                </li>
            </ul>
            <div id="my-tab-content2" class="tab-content">
                <div class="tab-pane active" id="areas_hole">
                    <div  id="my-tab-content" class="tab-content">
                        <input class="text number" name="areas[costfrom]" placeholder="Не важно" value="{{ isset($areas['costfrom']) ? $areas['costfrom'] : ''}}"><span class="glyphicon glyphicon-minus"></span><input class="text number" name="areas[costto]" placeholder="Не важно" value="{{isset($areas['costto']) ? $areas['costto'] : ''}}">
                    </div>
                </div>
                <div class="tab-pane" id="areas_meters">
                    <div  id="my-tab-content" class="tab-content">
                        <input class="text number"  name="areas[PricePerMFrom]"  placeholder="Не важно" value="{{ isset($areas['PricePerMFrom']) ? $areas['PricePerMFrom'] : ''}}"><span class="glyphicon glyphicon-minus"></span><input class="text number" name="areas[PricePerMTo]" placeholder="Не важно" value="{{isset($areas['PricePerMTo']) ? $areas['PricePerMTo'] : ''}}">
                    </div>
                </div>
            </div>
        </div>	
        <div class="square">
            <ul id="tabs4" class="nav nav-tabs" data-tabs="tabs">
                <li class="active full_width">
                    <a href="#squarem" data-toggle="tab">					        	
                        Площадь ЗУ /сотки					        	
                    </a>
                </li>
            </ul>
            <div class="tab-pane active" id="squarem">
                <div  id="my-tab-content" class="tab-content">					          
                    <input class="text square_mask" name="areas[AreaFrom]" placeholder="Не важно" value="{{ isset($areas['AreaFrom']) ? $areas['AreaFrom'] : ''}}"><span class="glyphicon glyphicon-minus"></span><input class="text square_mask" name="areas[AreaTo]" placeholder="Не важно" value="{{ isset($areas['AreaTo']) ? $areas['AreaTo'] : ''}}">
                </div>
            </div>
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

                    <input type="hidden" name="areas[microdistrict][]" disabled  value="Донская">
                    <input type="hidden" name="areas[microdistrict][]" disabled  value="Завокзальный">
                    <input type="hidden" name="areas[microdistrict][]" disabled  value="Заречный">
                    <input type="hidden" name="areas[microdistrict][]" disabled  value="КСМ">
                    <input type="hidden" name="areas[microdistrict][]" disabled  value="Макаренко">
                    <input type="hidden" name="areas[microdistrict][]" disabled  value="Мамайкаф">
                    <input type="hidden" name="areas[microdistrict][]" disabled  value="Новый Сочи">
                    <input type="hidden" name="areas[microdistrict][]" disabled  value="Центр">
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
                    <input type="hidden" name="areas[microdistrict][]" disabled  value="Барановка село">
                    <input type="hidden" name="areas[microdistrict][]" disabled  value="Большой Ахун">
                    <input type="hidden" name="areas[microdistrict][]" disabled  value="Бытха">
                    <input type="hidden" name="areas[microdistrict][]" disabled  value="Верхний Юрт село">
                    <input type="hidden" name="areas[microdistrict][]" disabled  value="Измайловка село">
                    <input type="hidden" name="areas[microdistrict][]" disabled  value="Краевско-Армянское село">
                    <input type="hidden" name="areas[microdistrict][]" disabled  value="Кудепста пос.">
                    <input type="hidden" name="areas[microdistrict][]" disabled  value="Малая Объездная">
                    <input type="hidden" name="areas[microdistrict][]" disabled  value="Малый Ахун">
                    <input type="hidden" name="areas[microdistrict][]" disabled  value="Мацестинская Долина">
                    <input type="hidden" name="areas[microdistrict][]" disabled  value="Новая Мацеста">
                    <input type="hidden" name="areas[microdistrict][]" disabled  value="Пластунка село">
                    <input type="hidden" name="areas[microdistrict][]" disabled  value="Приморье">
                    <input type="hidden" name="areas[microdistrict][]" disabled  value="Раздольное село">
                    <input type="hidden" name="areas[microdistrict][]" disabled  value="Светлана">
                    <input type="hidden" name="areas[microdistrict][]" disabled  value="Соболевка">
                    <input type="hidden" name="areas[microdistrict][]" disabled  value='Совхоз "Приморский"'>
                    <input type="hidden" name="areas[microdistrict][]" disabled  value="Старая Мацеста">
                    <input type="hidden" name="areas[microdistrict][]" disabled  value="Фабрициуса">
                    <input type="hidden" name="areas[microdistrict][]" disabled  value="Хоста">
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
                    <input type="hidden" name="areas[microdistrict][]" disabled  value="Адлер-центр">
                    <input type="hidden" name="areas[microdistrict][]" disabled  value="Блиново">
                    <input type="hidden" name="areas[microdistrict][]" disabled  value="Верхневеселое село">
                    <input type="hidden" name="areas[microdistrict][]" disabled  value="Верхнеимеретинская Бухта">
                    <input type="hidden" name="areas[microdistrict][]" disabled  value="Веселое село">
                    <input type="hidden" name="areas[microdistrict][]" disabled  value="Высокое село">
                    <input type="hidden" name="areas[microdistrict][]" disabled  value="Голубые Дали">
                    <input type="hidden" name="areas[microdistrict][]" disabled  value="Красная Поляна пос.">
                    <input type="hidden" name="areas[microdistrict][]" disabled  value="Курортный городок">
                    <input type="hidden" name="areas[microdistrict][]" disabled  value="Мирный">
                    <input type="hidden" name="areas[microdistrict][]" disabled  value="Молдовка село">
                    <input type="hidden" name="areas[microdistrict][]" disabled  value="Нижнеимеретинская Бухта">
                    <input type="hidden" name="areas[microdistrict][]" disabled  value="Олимпийская деревня">
                    <input type="hidden" name="areas[microdistrict][]" disabled  value="Орел-Изумруд село">
                    <input type="hidden" name="areas[microdistrict][]" disabled  value='Совхоз "Южные культуры"'>
                    <input type="hidden" name="areas[microdistrict][]" disabled  value="Черемушки">
                    <input type="hidden" name="areas[microdistrict][]" disabled  value="Эсто-Садок пос.">
                </ul>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <h4>Лазаревский р-н</h4>
                <ul class="list-unstyled" id="dist_4">
                    <li>Волковка село</li>
                    <li>Головинка пос.</li>
                    <li>Горное Лоо село</li>
                    <li>Дагомыс пос.</li>
                    <input type="hidden" name="areas[microdistrict][]" disabled  value="Волковка село">
                    <input type="hidden" name="areas[microdistrict][]" disabled  value="Головинка пос.">
                    <input type="hidden" name="areas[microdistrict][]" disabled  value="Горное Лоо село">
                    <input type="hidden" name="areas[microdistrict][]" disabled  value="Дагомыс пос.">
                </ul>
            </div>
            @if (isset($areas['microdistrict']))
            <script>
                var microdistrict = JSON.parse('<?php echo addslashes(json_encode($areas['microdistrict'])) ?>');
            </script>


            @endif
            <div class="clr"></div>	
        </div>
        <div class="clr"></div>	
    </section>

    <section class="hided_form">
        <section>
            <section>                
                <div class="rayon balcony">
                    <ul id="tabs2" class="nav nav-tabs" data-tabs="tabs">
                        <li class="active full_width">
                            <a href="#area" data-toggle="tab">					        	
                                {{Lang::get('main.Communication')}}					        	
                            </a>
                        </li>
                    </ul>
                    <div id="balcony" style="position:relative;">
                        <a class="btn"><span class="select_title">Не важно</span><span class="select_btn" ></span></a>
                        <div class="areas_list communication_list">
                            <div class="input_checkbox">
                                <label>Водоснабжение</label>
                                <input type="checkbox" class="communication" name="areas[WaterSupply]" {{isset($areas['WaterSupply'])  ? 'checked' : '' }} value="Connected">
                                <span></span>
                            </div>
                            <div class="input_checkbox">
                                <label>Газ</label>
                                <input type="checkbox" class="communication" name="areas[GasType]" {{isset($areas['GasType'])  ? 'checked' : '' }}  value="Connected">
                                <span></span>
                            </div>
                            <div class="input_checkbox">
                                <label>Канализация</label>
                                <input type="checkbox" class="communication" name="areas[Sewage]" {{isset($areas['Sewage'])  ? 'checked' : '' }}  value="Connected">
                                <span></span>
                            </div>
                            <div class="input_checkbox">
                                <label>Отопление</label>
                                <input type="checkbox" class="communication" name="areas[Heating]" {{isset($areas['Heating']) ? 'checked' : '' }}  value="Connected">
                                <span></span>
                            </div>
                            <div class="input_checkbox">
                                <label>Электричество</label>
                                <input type="checkbox" class="communication"  name="areas[Electricity]" {{isset($areas['Electricity'])  ? 'checked' : '' }}  value="Connected">
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
                        <button type="button" data-seadistance="500" class="btn {{isset($areas['seadistance']) && $areas['seadistance'] == 500 ? 'active' : '' }}">До 500 м</button>
                        <button type="button" data-seadistance="1000" class="btn {{isset($areas['seadistance']) && $areas['seadistance'] == 1000 ? 'active' : '' }}">До 1 км</button>
                        <button type="button" data-seadistance="5000" class="btn {{isset($areas['seadistance']) && $areas['seadistance'] == 5000? 'active' : '' }}">До 5 км</button>
                    </div>
                    <input type="hidden" name="areas[seadistance]" value="{{ isset($areas['seadistance']) ? $areas['seadistance'] : ''}}" {{ isset($areas['seadistance']) && $areas['seadistance'] ? '' : 'disabled'}} >
                </div>
                <div class="rooms_numbers">
                    <ul id="tabs2" class="nav nav-tabs" data-tabs="tabs">
                        <li class="active full_width">
                            <a href="#rooms" data-toggle="tab">					        	
                                Длина фасада					        	
                            </a>
                        </li>
                    </ul>
                    <div class="btn-group radio" id="facadelength">
                        <button type="button" data-facadelength="10" class="btn {{isset($areas['facadelength']) && $areas['facadelength'] == 10 ? 'active' : '' }}">До 10 м</button>
                        <button type="button" data-facadelength="50" class="btn {{isset($areas['facadelength']) && $areas['facadelength'] == 50 ? 'active' : '' }}">До 50 км</button>
                        <button type="button" data-facadelength="100" class="btn {{isset($areas['facadelength']) && $areas['facadelength'] == 100? 'active' : '' }}">До 100 км</button>
                    </div>
                    <input type="hidden" name="areas[facadelength]" value="{{ isset($areas['facadelength']) ? $areas['facadelength'] : ''}}" {{ isset($areas['facadelength']) && $areas['facadelength'] ? '' : 'disabled'}} >
                </div>
                <div class='clr'></div>
            </section>

        </section>

    </section>
    <section class="boottom_blc">
        <div class="check_blc">
            <div class="slide_btn"><span></span><z>{{Lang::get('main.extend_search')}}</z></div>
            <div class="input_checkbox" style="display: none;">
                <label>{{Lang::get('main.elite_build')}}</label>
                <input type="checkbox" class="full_form" name="areas[elite]" {{ isset($areas['elite']) && $areas['elite'] ? 'checked' : ''}} value="1">
                       <span></span>
            </div>
            <div class="input_checkbox" style="display: none;">
                <label>Ипотека</label>
                <input type="checkbox" class="full_form" name="areas[mortgage]" {{ isset($areas['mortgage']) && $areas['mortgage'] ? 'checked' : ''}} value="1">
                       <span></span>
            </div>
        </div>
        <div class="submit_blc">
            <span>{{isset($houses) && isset($items) ? 'Найдено: '.count($items).' объекта' : ''}}</span>
            <input type="submit" value="ПОИСК">
        </div>
        <div class="clr"></div>
    </section>
    <input type="hidden" name="form_type" id="form_type" value="short">
    {!! Form::close() !!}
</div>

