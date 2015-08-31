<div class="tab-pane-main" id="offices" data-page_cont="offices">
    {!! Form::open(array('url' => '/offices', 'id' => 'offices_form', 'method' => 'get')) !!}
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
                <select class="form-control select" name="offices[dealtype]" >
                    <option {{ !isset($offices['dealtype']) ? 'selected' : '' }} value="">Не важно</option>
                    <option  value="Sell" {{isset($offices['dealtype']) && $offices['dealtype'] == "Sell" ? 'selected' : '' }}>Продажа</option>
                    <option  value="Rent" {{isset($offices['dealtype']) && $offices['dealtype'] == "Rent" ? 'selected' : '' }}>Аренда</option>
                </select>
            </div>
        </div>    
        <div class="price">
            <ul id="tabs3" class="nav nav-tabs" data-tabs="tabs">
                <li class="active">
                    <a href="#office_hole" data-toggle="tab">				        	
                        общая / руб					        	
                    </a>
                </li>
                <li>
                    <a href="#office_meters" data-toggle="tab">			        	
                        руб / m<sup>2</sup>					        	
                    </a>
                </li>
            </ul>
            <div id="my-tab-content2" class="tab-content">
                <div class="tab-pane active" id="office_hole">
                    <div  id="my-tab-content" class="tab-content">
                        <input class="text required no number" name="offices[costfrom]" placeholder="Не важно" value="{{ isset($offices['costfrom']) ? $offices['costfrom'] : ''}}"><span class="glyphicon glyphicon-minus"></span><input class="text required no number" name="offices[costto]" placeholder="Не важно" value="{{isset($offices['costto']) ? $offices['costto'] : ''}}">
                    </div>
                </div>
                <div class="tab-pane" id="office_meters">
                    <div  id="my-tab-content" class="tab-content">
                        <input class="text number"  name="offices[PricePerMFrom]"  placeholder="Не важно" value="{{ isset($offices['PricePerMFrom']) ? $offices['PricePerMFrom'] : ''}}"><span class="glyphicon glyphicon-minus"></span><input class="text number" name="offices[PricePerMTo]" placeholder="Не важно" value="{{isset($offices['PricePerMTo']) ? $offices['PricePerMTo'] : ''}}">
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
                    <input class="text required no square_mask" name="offices[sizefrom]" placeholder="Не важно" value="{{ isset($offices['sizefrom']) ? $offices['sizefrom'] : ''}}"><span class="glyphicon glyphicon-minus"></span><input class="text required no square_mask" name="offices[sizeto]" placeholder="Не важно" value="{{ isset($offices['sizeto']) ? $offices['sizeto'] : ''}}">
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
            if (isset($offices['furnish'])) {
                $offices['f_furnish'] = explode(',', $offices['furnish']);
            }
            ?>
            <div class="btn-group" id="furnish">
                <button type="button" data-furnish="Raw" class="btn {{isset($offices['f_furnish']) && in_array("Raw", $offices['f_furnish']) ? 'active' : '' }}">Черновая</button>
                <button type="button" data-furnish="Clean" class="btn {{isset($offices['f_furnish']) && in_array("Clean", $offices['f_furnish']) ? 'active' : '' }}">Чистовая</button>
                <button type="button" data-furnish="Repair" class="btn {{isset($offices['f_furnish']) && in_array("Repair", $offices['f_furnish']) ? 'active' : '' }}">Ремонт</button>                     
            </div>
            <input type="hidden" name="offices[furnish]" value="{{ isset($offices['furnish']) ? $offices['furnish'] : ''}}" {{ isset($offices['furnish']) && $offices['furnish'] ? '' : 'disabled'}} >
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

                    <input type="hidden" name="offices[microdistrict][]" disabled  value="Донская">
                    <input type="hidden" name="offices[microdistrict][]" disabled  value="Завокзальный">
                    <input type="hidden" name="offices[microdistrict][]" disabled  value="Заречный">
                    <input type="hidden" name="offices[microdistrict][]" disabled  value="КСМ">
                    <input type="hidden" name="offices[microdistrict][]" disabled  value="Макаренко">
                    <input type="hidden" name="offices[microdistrict][]" disabled  value="Мамайкаф">
                    <input type="hidden" name="offices[microdistrict][]" disabled  value="Новый Сочи">
                    <input type="hidden" name="offices[microdistrict][]" disabled  value="Центр">
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
                    <input type="hidden" name="offices[microdistrict][]" disabled  value="Барановка село">
                    <input type="hidden" name="offices[microdistrict][]" disabled  value="Большой Ахун">
                    <input type="hidden" name="offices[microdistrict][]" disabled  value="Бытха">
                    <input type="hidden" name="offices[microdistrict][]" disabled  value="Верхний Юрт село">
                    <input type="hidden" name="offices[microdistrict][]" disabled  value="Измайловка село">
                    <input type="hidden" name="offices[microdistrict][]" disabled  value="Краевско-Армянское село">
                    <input type="hidden" name="offices[microdistrict][]" disabled  value="Кудепста пос.">
                    <input type="hidden" name="offices[microdistrict][]" disabled  value="Малая Объездная">
                    <input type="hidden" name="offices[microdistrict][]" disabled  value="Малый Ахун">
                    <input type="hidden" name="offices[microdistrict][]" disabled  value="Мацестинская Долина">
                    <input type="hidden" name="offices[microdistrict][]" disabled  value="Новая Мацеста">
                    <input type="hidden" name="offices[microdistrict][]" disabled  value="Пластунка село">
                    <input type="hidden" name="offices[microdistrict][]" disabled  value="Приморье">
                    <input type="hidden" name="offices[microdistrict][]" disabled  value="Раздольное село">
                    <input type="hidden" name="offices[microdistrict][]" disabled  value="Светлана">
                    <input type="hidden" name="offices[microdistrict][]" disabled  value="Соболевка">
                    <input type="hidden" name="offices[microdistrict][]" disabled  value='Совхоз "Приморский"'>
                    <input type="hidden" name="offices[microdistrict][]" disabled  value="Старая Мацеста">
                    <input type="hidden" name="offices[microdistrict][]" disabled  value="Фабрициуса">
                    <input type="hidden" name="offices[microdistrict][]" disabled  value="Хоста">
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
                    <input type="hidden" name="offices[microdistrict][]" disabled  value="Адлер-центр">
                    <input type="hidden" name="offices[microdistrict][]" disabled  value="Блиново">
                    <input type="hidden" name="offices[microdistrict][]" disabled  value="Верхневеселое село">
                    <input type="hidden" name="offices[microdistrict][]" disabled  value="Верхнеимеретинская Бухта">
                    <input type="hidden" name="offices[microdistrict][]" disabled  value="Веселое село">
                    <input type="hidden" name="offices[microdistrict][]" disabled  value="Высокое село">
                    <input type="hidden" name="offices[microdistrict][]" disabled  value="Голубые Дали">
                    <input type="hidden" name="offices[microdistrict][]" disabled  value="Красная Поляна пос.">
                    <input type="hidden" name="offices[microdistrict][]" disabled  value="Курортный городок">
                    <input type="hidden" name="offices[microdistrict][]" disabled  value="Мирный">
                    <input type="hidden" name="offices[microdistrict][]" disabled  value="Молдовка село">
                    <input type="hidden" name="offices[microdistrict][]" disabled  value="Нижнеимеретинская Бухта">
                    <input type="hidden" name="offices[microdistrict][]" disabled  value="Олимпийская деревня">
                    <input type="hidden" name="offices[microdistrict][]" disabled  value="Орел-Изумруд село">
                    <input type="hidden" name="offices[microdistrict][]" disabled  value='Совхоз "Южные культуры"'>
                    <input type="hidden" name="offices[microdistrict][]" disabled  value="Черемушки">
                    <input type="hidden" name="offices[microdistrict][]" disabled  value="Эсто-Садок пос.">
                </ul>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <h4>Лазаревский р-н</h4>
                <ul class="list-unstyled" id="dist_4">
                    <li>Волковка село</li>
                    <li>Головинка пос.</li>
                    <li>Горное Лоо село</li>
                    <li>Дагомыс пос.</li>
                    <input type="hidden" name="offices[microdistrict][]" disabled  value="Волковка село">
                    <input type="hidden" name="offices[microdistrict][]" disabled  value="Головинка пос.">
                    <input type="hidden" name="offices[microdistrict][]" disabled  value="Горное Лоо село">
                    <input type="hidden" name="offices[microdistrict][]" disabled  value="Дагомыс пос.">
                </ul>
            </div>
            @if (isset($offices['microdistrict']))
            <script>
                var microdistrict = JSON.parse('<?php echo addslashes(json_encode($offices['microdistrict'])) ?>');
            </script>


            @endif
            <div class="clr"></div>	
        </div>	
    </section>

    <section class="hided_form">
        <section>
            <section>
                <div class="rooms_numbers prohod ">
                    <ul id="tabs2" class="nav nav-tabs" data-tabs="tabs">
                        <li class="active full_width">
                            <a href="#rooms" data-toggle="tab">                             
                                ТИп объекта                            
                            </a>
                        </li>
                    </ul>
                    <?php
                    if (isset($offices['ObjectType'])) {
                        $offices['f_ObjectType'] = explode(',', $offices['ObjectType']);
                    }
                    ?>
                    <div class="btn-group" id="ObjectType">
                        <button type="button" data-ObjectType="Space" class="btn {{isset($offices['f_ObjectType']) && in_array("Space", $offices['f_ObjectType']) ? 'active' : '' }}">Помещение</button>
                        <button type="button" data-ObjectType="Building" class="btn {{isset($offices['f_ObjectType']) && in_array("Building", $offices['f_ObjectType']) ? 'active' : '' }}">Здание</button>

                    </div>
                    <input type="hidden" name="offices[ObjectType]" value="{{ isset($offices['ObjectType']) ? $offices['ObjectType'] : ''}}" {{ isset($offices['ObjectType']) && $offices['ObjectType'] ? '' : 'disabled'}} >
                </div>

                <div>
                    <ul id="tabs2" class="nav nav-tabs" data-tabs="tabs">
                        <li class="active full_width">
                            <a href="#rooms" data-toggle="tab">Планировка				        	
                            </a>
                        </li>
                    </ul>
                    <?php
                    if (isset($offices['layout'])) {
                        $offices['f_layout'] = explode(',', $offices['layout']);
                    }
                    ?>
                    <div class="btn-group" id="layout">
                        <button type="button" data-layout="Open" class="btn {{isset($offices['f_layout'] ) && in_array("Open", $offices['f_layout'] ) ? 'active' : '' }}">Открытая</button>
                        <button type="button" data-layout="Cabinet" class="btn {{isset($offices['f_layout'] ) && in_array("Cabinet", $offices['f_layout'] ) ? 'active' : '' }}">Кабинетная</button>
                        <button type="button" data-layout="Combined" class="btn {{isset($offices['f_layout'] ) && in_array("Combined", $offices['f_layout'] ) ? 'active' : '' }}">{{Lang::get('main.mixed')}}</button>				       
                    </div>
                    <input type="hidden" name="offices[layout]" value="{{ isset($offices['layout']) ? $offices['layout'] : ''}}" {{ isset($offices['layout']) && $offices['layout'] ? '' : 'disabled'}} >
                </div>
                <div class="vid">
                    <ul id="tabs2" class="nav nav-tabs" data-tabs="tabs">
                        <li class="active full_width">
                            <a href="#rooms" data-toggle="tab">                   Вид                           
                            </a>
                        </li>
                    </ul>
                    <div class="btn-group">
                        <button type="button" id="mountview" class="btn {{ isset($offices['mountview']) && $offices['mountview'] ? 'active' : ''}}">На горы</button>
                        <button type="button" id="seaview" class="btn {{ isset($offices['seaview']) && $offices['seaview'] ? 'active' : ''}}">На море</button>
                    </div>
                    <input type="hidden" name="offices[mountview]" {!! isset($offices['mountview']) && $offices['mountview'] ? 'value="1" ' : 'disabled'!!}  >
                    <input type="hidden" name="offices[seaview]" {!! isset($offices['seaview']) && $offices['seaview'] ? 'value="1" ' : 'disabled'!!} >              
                </div>

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
                                <input type="checkbox" class="communication" name="offices[WaterSupply]" {{isset($offices['WaterSupply'])  ? 'checked' : '' }} value="Connected">
                                <span></span>
                            </div>
                            <div class="input_checkbox">
                                <label>Газ</label>
                                <input type="checkbox" class="communication" name="offices[GasType]" {{isset($offices['GasType'])  ? 'checked' : '' }}  value="Connected">
                                <span></span>
                            </div>
                            <div class="input_checkbox">
                                <label>Канализация</label>
                                <input type="checkbox" class="communication" name="offices[Sewage]" {{isset($offices['Sewage'])  ? 'checked' : '' }}  value="Connected">
                                <span></span>
                            </div>
                            <div class="input_checkbox">
                                <label>Отопление</label>
                                <input type="checkbox" class="communication" name="offices[Heating]" {{isset($offices['Heating']) ? 'checked' : '' }}  value="Connected">
                                <span></span>
                            </div>
                            <div class="input_checkbox">
                                <label>Электричество</label>
                                <input type="checkbox" class="communication"  name="offices[Electricity]" {{isset($offices['Electricity'])  ? 'checked' : '' }}  value="Connected">
                                <span></span>
                            </div>
                        </div>
                    </div>                          
                </div>
                <div class='clr'></div>
            </section>
            <section>
                <div class="rooms_numbers">
                    <ul id="tabs2" class="nav nav-tabs" data-tabs="tabs">
                        <li class="active full_width">
                            <a href="#rooms" data-toggle="tab" aria-expanded="true">                                
                                Класс офиса                             
                            </a>
                        </li>
                    </ul>
                    <?php
                    if (isset($offices['ObjectClass'])) {
                        $offices['f_ObjectClass'] = explode(',', $offices['ObjectClass']);
                    }
                    ?>
                    <div class="btn-group" id="ObjectClass">                
                        <button type="button" data-ObjectClass="A" class="btn {{isset($offices['f_ObjectClass'] ) && in_array("A", $offices['f_ObjectClass'] ) ? 'active' : '' }}">A</button>
                        <button type="button" data-ObjectClass="B" class="btn {{isset($offices['f_ObjectClass'] ) && in_array("B", $offices['f_ObjectClass'] ) ? 'active' : '' }}">B</button>
                        <button type="button" data-ObjectClass="C" class="btn {{isset($offices['f_ObjectClass'] ) && in_array("C", $offices['f_ObjectClass'] ) ? 'active' : '' }}">C</button>          
                    </div>
                    <input type="hidden" name="offices[ObjectClass]" value="{{ isset($offices['ObjectClass']) ? $offices['ObjectClass'] : ''}}" {{ isset($offices['ObjectClass']) && $offices['ObjectClass'] ? '' : 'disabled'}} >
                </div>              
                <div class="furniture">
                    <ul id="tabs2" class="nav nav-tabs" data-tabs="tabs">
                        <li class="active full_width">
                            <a href="#rooms" data-toggle="tab" aria-expanded="true">                       Мебель                               
                            </a>
                        </li>
                    </ul>
                    <?php
                    if (isset($offices['furniture'])) {
                        $offices['f_furniture'] = explode(',', $offices['furniture']);
                    }
                    ?>
                    <div class="btn-group" id="furniture">
                        <button type="button" class="furniture btn {{isset($offices['f_furniture']) && in_array("Full", $offices['f_furniture']) ? 'active' : '' }}" data-furniture="Full">{{Lang::get('enums.Furniture.Full')}}</button>
                        <button type="button" class="furniture btn {{isset($offices['f_furniture']) && in_array("Part", $offices['f_furniture']) ? 'active' : '' }}" data-furniture="Part">Частично</button>
                        <button type="button" class="furniture btn {{isset($offices['f_furniture']) && in_array("None", $offices['f_furniture']) ? 'active' : '' }}" data-furniture="None">Без мебели</button>
                    </div>
                    <input type="hidden" name="offices[furniture]"  value="{{ isset($offices['furniture']) ? $offices['furniture'] : ''}}" {{ isset($offices['furniture']) && $offices['furniture'] ? '' : 'disabled'}} >
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
                <input type="checkbox" name="offices[SeparatedEntrance]" {{ isset($offices['SeparatedEntrance']) && $offices['SeparatedEntrance'] ? 'checked' : ''}} value="1">
                       <span></span>
            </div>
            <div class="input_checkbox">
                <label>Действующий бизнес</label>
                <input type="checkbox" name="offices[Tenants]" {{ isset($offices['Tenants']) && $offices['Tenants'] ? 'checked' : ''}} value="1">
                       <span></span>
            </div>
            <div class="input_checkbox " style="display: none;">
                <label>{{Lang::get('main.first_floor')}}</label>
                <input type="checkbox" class="full_form" name="offices[First]" {{ isset($offices['First']) && $offices['First'] ? 'checked' : ''}} value="1">
                       <span></span>
            </div>
        </div>
        <div class="submit_blc">
            <span>{{isset($offices) && isset($items) ? 'Найдено: '.count($items).' объекта' : ''}}</span>
            <input type="submit" value="ПОИСК">
        </div>
        <div class="clr"></div>
    </section>
    <input type="hidden" name="form_type" id="form_type" value="short">
    {!! Form::close() !!}
</div>