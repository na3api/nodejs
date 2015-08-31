<div class="tab-pane-main" id="storages" data-page_cont="storages">
    {!! Form::open(array('url' => '/storages', 'id' => 'storages_form', 'method' => 'get')) !!}
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
                <select class="form-control select" name="storages[dealtype]" >
                    <option {{ !isset($storages['dealtype']) ? 'selected' : '' }} value="">Не важно</option>
                    <option  value="Sell" {{isset($storages['dealtype']) && $storages['dealtype'] == "Sell" ? 'selected' : '' }}>Продажа</option>
                    <option  value="Rent" {{isset($storages['dealtype']) && $storages['dealtype'] == "Rent" ? 'selected' : '' }}>Аренда</option>
                </select>
            </div>
        </div>    
        <div class="price">
            <ul id="tabs3" class="nav nav-tabs" data-tabs="tabs">
                <li class="active">
                    <a href="#storage_hole" data-toggle="tab">				        	
                        общая / руб					        	
                    </a>
                </li>
                <li>
                    <a href="#storage_meters" data-toggle="tab">			        	
                        руб / m<sup>2</sup>					        	
                    </a>
                </li>
            </ul>
            <div id="my-tab-content2" class="tab-content">
                <div class="tab-pane active" id="storage_hole">
                    <div  id="my-tab-content" class="tab-content">
                        <input class="text required no number" name="storages[costfrom]" placeholder="Не важно" value="{{ isset($storages['costfrom']) ? $storages['costfrom'] : ''}}"><span class="glyphicon glyphicon-minus"></span><input class="text required no number" name="storages[costto]" placeholder="Не важно" value="{{isset($storages['costto']) ? $storages['costto'] : ''}}">
                    </div>
                </div>
                <div class="tab-pane" id="storage_meters">
                    <div  id="my-tab-content" class="tab-content">
                        <input class="text number"  name="storages[PricePerMFrom]"  placeholder="Не важно" value="{{ isset($storages['PricePerMFrom']) ? $storages['PricePerMFrom'] : ''}}"><span class="glyphicon glyphicon-minus"></span><input class="text number" name="storages[PricePerMTo]" placeholder="Не важно" value="{{isset($storages['PricePerMTo']) ? $storages['PricePerMTo'] : ''}}">
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
                    <input class="text required no square_mask" name="storages[sizefrom]" placeholder="Не важно" value="{{ isset($storages['sizefrom']) ? $storages['sizefrom'] : ''}}"><span class="glyphicon glyphicon-minus"></span><input class="text required no square_mask" name="storages[sizeto]" placeholder="Не важно" value="{{ isset($storages['sizeto']) ? $storages['sizeto'] : ''}}">
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
            if (isset($storages['furnish'])) {
                $storages['f_furnish'] = explode(',', $storages['furnish']);
            }
            ?>
            <div class="btn-group" id="furnish">
                <button type="button" data-furnish="Raw" class="btn {{isset($storages['f_furnish']) && in_array("Raw", $storages['f_furnish']) ? 'active' : '' }}">Черновая</button>
                <button type="button" data-furnish="Clean" class="btn {{isset($storages['f_furnish']) && in_array("Clean", $storages['f_furnish']) ? 'active' : '' }}">Чистовая</button>
                <button type="button" data-furnish="Repair" class="btn {{isset($storages['f_furnish']) && in_array("Repair", $storages['f_furnish']) ? 'active' : '' }}">Ремонт</button>                     
            </div>
            <input type="hidden" name="storages[furnish]" value="{{ isset($storages['furnish']) ? $storages['furnish'] : ''}}" {{ isset($storages['furnish']) && $storages['furnish'] ? '' : 'disabled'}} >
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

                    <input type="hidden" name="storages[microdistrict][]" disabled  value="Донская">
                    <input type="hidden" name="storages[microdistrict][]" disabled  value="Завокзальный">
                    <input type="hidden" name="storages[microdistrict][]" disabled  value="Заречный">
                    <input type="hidden" name="storages[microdistrict][]" disabled  value="КСМ">
                    <input type="hidden" name="storages[microdistrict][]" disabled  value="Макаренко">
                    <input type="hidden" name="storages[microdistrict][]" disabled  value="Мамайкаф">
                    <input type="hidden" name="storages[microdistrict][]" disabled  value="Новый Сочи">
                    <input type="hidden" name="storages[microdistrict][]" disabled  value="Центр">
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
                    <input type="hidden" name="storages[microdistrict][]" disabled  value="Барановка село">
                    <input type="hidden" name="storages[microdistrict][]" disabled  value="Большой Ахун">
                    <input type="hidden" name="storages[microdistrict][]" disabled  value="Бытха">
                    <input type="hidden" name="storages[microdistrict][]" disabled  value="Верхний Юрт село">
                    <input type="hidden" name="storages[microdistrict][]" disabled  value="Измайловка село">
                    <input type="hidden" name="storages[microdistrict][]" disabled  value="Краевско-Армянское село">
                    <input type="hidden" name="storages[microdistrict][]" disabled  value="Кудепста пос.">
                    <input type="hidden" name="storages[microdistrict][]" disabled  value="Малая Объездная">
                    <input type="hidden" name="storages[microdistrict][]" disabled  value="Малый Ахун">
                    <input type="hidden" name="storages[microdistrict][]" disabled  value="Мацестинская Долина">
                    <input type="hidden" name="storages[microdistrict][]" disabled  value="Новая Мацеста">
                    <input type="hidden" name="storages[microdistrict][]" disabled  value="Пластунка село">
                    <input type="hidden" name="storages[microdistrict][]" disabled  value="Приморье">
                    <input type="hidden" name="storages[microdistrict][]" disabled  value="Раздольное село">
                    <input type="hidden" name="storages[microdistrict][]" disabled  value="Светлана">
                    <input type="hidden" name="storages[microdistrict][]" disabled  value="Соболевка">
                    <input type="hidden" name="storages[microdistrict][]" disabled  value='Совхоз "Приморский"'>
                    <input type="hidden" name="storages[microdistrict][]" disabled  value="Старая Мацеста">
                    <input type="hidden" name="storages[microdistrict][]" disabled  value="Фабрициуса">
                    <input type="hidden" name="storages[microdistrict][]" disabled  value="Хоста">
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
                    <input type="hidden" name="storages[microdistrict][]" disabled  value="Адлер-центр">
                    <input type="hidden" name="storages[microdistrict][]" disabled  value="Блиново">
                    <input type="hidden" name="storages[microdistrict][]" disabled  value="Верхневеселое село">
                    <input type="hidden" name="storages[microdistrict][]" disabled  value="Верхнеимеретинская Бухта">
                    <input type="hidden" name="storages[microdistrict][]" disabled  value="Веселое село">
                    <input type="hidden" name="storages[microdistrict][]" disabled  value="Высокое село">
                    <input type="hidden" name="storages[microdistrict][]" disabled  value="Голубые Дали">
                    <input type="hidden" name="storages[microdistrict][]" disabled  value="Красная Поляна пос.">
                    <input type="hidden" name="storages[microdistrict][]" disabled  value="Курортный городок">
                    <input type="hidden" name="storages[microdistrict][]" disabled  value="Мирный">
                    <input type="hidden" name="storages[microdistrict][]" disabled  value="Молдовка село">
                    <input type="hidden" name="storages[microdistrict][]" disabled  value="Нижнеимеретинская Бухта">
                    <input type="hidden" name="storages[microdistrict][]" disabled  value="Олимпийская деревня">
                    <input type="hidden" name="storages[microdistrict][]" disabled  value="Орел-Изумруд село">
                    <input type="hidden" name="storages[microdistrict][]" disabled  value='Совхоз "Южные культуры"'>
                    <input type="hidden" name="storages[microdistrict][]" disabled  value="Черемушки">
                    <input type="hidden" name="storages[microdistrict][]" disabled  value="Эсто-Садок пос.">
                </ul>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <h4>Лазаревский р-н</h4>
                <ul class="list-unstyled" id="dist_4">
                    <li>Волковка село</li>
                    <li>Головинка пос.</li>
                    <li>Горное Лоо село</li>
                    <li>Дагомыс пос.</li>
                    <input type="hidden" name="storages[microdistrict][]" disabled  value="Волковка село">
                    <input type="hidden" name="storages[microdistrict][]" disabled  value="Головинка пос.">
                    <input type="hidden" name="storages[microdistrict][]" disabled  value="Горное Лоо село">
                    <input type="hidden" name="storages[microdistrict][]" disabled  value="Дагомыс пос.">
                </ul>
            </div>
            @if (isset($storages['microdistrict']))
            <script>
                var microdistrict = JSON.parse('<?php echo addslashes(json_encode($storages['microdistrict'])) ?>');
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
                            <a href="#rooms" data-toggle="tab"> Тип объекта                          
                            </a>
                        </li>
                    </ul>
                    <?php
                    if (isset($storages['ObjectType'])) {
                        $storages['f_ObjectType'] = explode(',', $storages['ObjectType']);
                    }
                    ?>
                    <div class="btn-group" id="ObjectType">
                        <button type="button" data-ObjectType="Space" class="btn {{isset($storages['f_ObjectType']) && in_array("Space", $storages['f_ObjectType']) ? 'active' : '' }}">Помещение</button>
                        <button type="button" data-ObjectType="Building" class="btn {{isset($storages['f_ObjectType']) && in_array("Building", $storages['f_ObjectType']) ? 'active' : '' }}">здание</button>
                    </div>
                    <input type="hidden" name="storages[ObjectType]" value="{{ isset($storages['ObjectType']) ? $storages['ObjectType'] : ''}}" {{ isset($storages['ObjectType']) && $storages['ObjectType'] ? '' : 'disabled'}} >
                </div>
                <div>
                    <ul id="tabs2" class="nav nav-tabs" data-tabs="tabs">
                        <li class="active full_width">
                            <a href="#rooms" data-toggle="tab">Планировка				        	
                            </a>
                        </li>
                    </ul>
                    <?php
                    if (isset($storages['layout'])) {
                        $storages['f_layout'] = explode(',', $storages['layout']);
                    }
                    ?>
                    <div class="btn-group" id="layout">
                        <button type="button" data-layout="Open" class="btn {{isset($storages['f_layout'] ) && in_array("Open", $storages['f_layout'] ) ? 'active' : '' }}">Открытая</button>
                        <button type="button" data-layout="Cabinet" class="btn {{isset($storages['f_layout'] ) && in_array("Cabinet", $storages['f_layout'] ) ? 'active' : '' }}">Кабинетная</button>
                        <button type="button" data-layout="Combined" class="btn {{isset($storages['f_layout'] ) && in_array("Combined", $storages['f_layout'] ) ? 'active' : '' }}">{{Lang::get('main.mixed')}}</button>				       
                    </div>
                    <input type="hidden" name="storages[layout]" value="{{ isset($storages['layout']) ? $storages['layout'] : ''}}" {{ isset($storages['layout']) && $storages['layout'] ? '' : 'disabled'}} >
                </div>
                <div class="rooms_numbers prohod ">
                    <ul id="tabs2" class="nav nav-tabs" data-tabs="tabs">
                        <li class="active full_width">
                            <a href="#rooms" data-toggle="tab">                             
                                Высота потолков / м                            
                            </a>
                        </li>
                    </ul>
                    <div class="btn-group radio" id="CeilingHeight">
                        <button type="button" data-CeilingHeight="3" class="btn {{isset($storages['CeilingHeight']) && $storages['CeilingHeight'] == 3  ? 'active' : '' }}">от 3</button>
                        <button type="button" data-CeilingHeight="5" class="btn {{isset($storages['CeilingHeight']) && $storages['CeilingHeight'] == 5  ? 'active' : '' }}">от 5</button>
                        <button type="button" data-CeilingHeight="9" class="btn {{isset($storages['CeilingHeight']) && $storages['CeilingHeight'] == 9  ? 'active' : '' }}">от 9</button>                    
                    </div>
                    <input type="hidden" name="storages[CeilingHeight]" value="{{ isset($storages['CeilingHeight']) ? $storages['CeilingHeight'] : ''}}" {{ isset($storages['CeilingHeight']) && $storages['CeilingHeight'] ? '' : 'disabled'}} >
                </div>
                <div class="rooms_numbers distance">
                    <ul id="tabs2" class="nav nav-tabs" data-tabs="tabs">
                        <li class="active full_width">
                            <a href="#rooms" data-toggle="tab">					        	
                                Класс офиса					        	
                            </a>
                        </li>
                    </ul>
                    <?php
                    if (isset($storages['ObjectClass'])) {
                        $storages['f_ObjectClass'] = explode(',', $storages['ObjectClass']);
                    }
                    ?>
                    <div class="btn-group" id="ObjectClass">                
                        <button type="button" data-ObjectClass="A" class="btn {{isset($storages['f_ObjectClass'] ) && in_array("A", $storages['f_ObjectClass'] ) ? 'active' : '' }}">A</button>
                        <button type="button" data-ObjectClass="B" class="btn {{isset($storages['f_ObjectClass'] ) && in_array("B", $storages['f_ObjectClass'] ) ? 'active' : '' }}">B</button>
                        <button type="button" data-ObjectClass="C" class="btn {{isset($storages['f_ObjectClass'] ) && in_array("C", $storages['f_ObjectClass'] ) ? 'active' : '' }}">C</button>          
                    </div>
                    <input type="hidden" name="storages[ObjectClass]" value="{{ isset($storages['ObjectClass']) ? $storages['ObjectClass'] : ''}}" {{ isset($storages['ObjectClass']) && $storages['ObjectClass'] ? '' : 'disabled'}} >
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
                                <input type="checkbox" class="communication" name="storages[WaterSupply]" {{isset($storages['WaterSupply'])  ? 'checked' : '' }} value="Connected">
                                <span></span>
                            </div>
                            <div class="input_checkbox">
                                <label>Газ</label>
                                <input type="checkbox" class="communication" name="storages[GasType]" {{isset($storages['GasType'])  ? 'checked' : '' }}  value="Connected">
                                <span></span>
                            </div>
                            <div class="input_checkbox">
                                <label>Канализация</label>
                                <input type="checkbox" class="communication" name="storages[Sewage]" {{isset($storages['Sewage'])  ? 'checked' : '' }}  value="Connected">
                                <span></span>
                            </div>
                            <div class="input_checkbox">
                                <label>Отопление</label>
                                <input type="checkbox" class="communication" name="storages[Heating]" {{isset($storages['Heating']) ? 'checked' : '' }}  value="Connected">
                                <span></span>
                            </div>
                            <div class="input_checkbox">
                                <label>Электричество</label>
                                <input type="checkbox" class="communication"  name="storages[Electricity]" {{isset($storages['Electricity'])  ? 'checked' : '' }}  value="Connected">
                                <span></span>
                            </div>
                        </div>
                    </div>                     
                </div>
                <div class="check_blc"> 
                    <div class="input_checkbox" style="display: none;">
                        <label>Транспортная доступность для крупной техники</label>
                        <input type="checkbox" class="full_form" name="storages[TransportAccessibility]" {{ isset($storages['TransportAccessibility']) && $storages['TransportAccessibility'] ? 'checked' : ''}} value="1">
                               <span></span>
                    </div>
                    <div class="input_checkbox" style="display: none;">
                        <label>{{Lang::get('main.first_floor')}}</label>
                        <input type="checkbox" class="full_form" name="storages[First]" {{ isset($storages['First']) && $storages['First'] ? 'checked' : ''}} value="1">
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
                <label>Действующий бизнес</label>
                <input type="checkbox"  name="storages[Tenants]" {{ isset($storages['Tenants']) && $storages['Tenants'] ? 'checked' : ''}} value="1">
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