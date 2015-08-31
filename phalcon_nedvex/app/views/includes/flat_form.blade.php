<div class="tab-pane-main active" id="flats" data-page_cont="flats">
    {!! Form::open(array('url' => '/flats', 'id' => 'flat_form', 'method' => 'get')) !!}
    <section style="position:relative">    
        <div class="price">
            <ul id="tabs3" class="nav nav-tabs" data-tabs="tabs">
                <li class="active">
                    <a href="#hole" data-toggle="tab">				        	
                        общая / руб					        	
                    </a>
                </li>
                <li>
                    <a href="#meters" data-toggle="tab">			        	
                        руб / m<sup>2</sup>					        	
                    </a>
                </li>
            </ul>
            <div id="my-tab-content2" class="tab-content">
                <div class="tab-pane active" id="hole">
                    <div  id="my-tab-content" class="tab-content">
                        <input class="text number" name="flats[PriceFrom]" placeholder="Не важно" value="{{ isset($flats['PriceFrom']) ? $flats['PriceFrom'] : ''}}"><span class="glyphicon glyphicon-minus"></span><input class="text number" name="flats[PriceTo]" placeholder="Не важно" value="{{isset($flats['PriceTo']) ? $flats['PriceTo'] : ''}}">
                    </div>
                </div>
                <div class="tab-pane" id="meters">
                    <div  id="my-tab-content" class="tab-content">
                        <input class="text number"  name="flats[PricePerMFrom]"  placeholder="Не важно" value="{{ isset($flats['PricePerMFrom']) ? $flats['PricePerMFrom'] : ''}}"><span class="glyphicon glyphicon-minus"></span><input class="text number" name="flats[PricePerMTo]" placeholder="Не важно" value="{{isset($flats['PricePerMTo']) ? $flats['PricePerMTo'] : ''}}">
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
                    <input class="text square_mask" name="flats[sizefrom]" placeholder="Не важно" value="{{ isset($flats['sizefrom']) ? $flats['sizefrom'] : ''}}"><span class="glyphicon glyphicon-minus"></span><input class="text square_mask" name="flats[sizeto]" placeholder="Не важно" value="{{ isset($flats['sizeto']) ? $flats['sizeto'] : ''}}">
                </div>
            </div>
        </div>
        <div class="rooms_numbers">
            <ul id="tabs2" class="nav nav-tabs" data-tabs="tabs">
                <li class="active full_width">
                    <a href="#rooms" data-toggle="tab">					        	
                        Планировка					        	
                    </a>
                </li>
            </ul>
            <?php
            if (isset($flats['flattype'])) {
                $flats['f_flattype'] = explode(',', $flats['flattype']);
            }
            ?>
            <div class="btn-group" id="flattype">
                <button type="button" data-flattype="Studio" class="btn {{isset($flats['f_flattype']) && in_array('Studio', $flats['f_flattype']) ? 'active' : '' }}">Студия</button>
                <button type="button" data-flattype="OneRoom" class="btn {{isset($flats['f_flattype']) && in_array('OneRoom', $flats['f_flattype']) ? 'active' : '' }}">1</button>
                <button type="button" data-flattype="TwoRoom" class="btn {{isset($flats['f_flattype']) && in_array('TwoRoom', $flats['f_flattype']) ? 'active' : '' }}">2</button>
                <button type="button" data-flattype="ThreeRoom" class="btn {{isset($flats['f_flattype']) && in_array('ThreeRoom', $flats['f_flattype']) ? 'active' : '' }}">3</button>
                <button type="button" data-flattype="ManyRoom" class="btn {{isset($flats['f_flattype']) && in_array('ManyRoom', $flats['f_flattype']) ? 'active' : '' }}" style="padding: 8px 11px;">4+</button>
                <button type="button" data-flattype="Penthouse" class="btn {{isset($flats['f_flattype']) && in_array('Penthouse', $flats['f_flattype']) ? 'active' : '' }}">ПЕНТХАУС</button>
            </div>
            <input type="hidden" name="flats[flattype]" value="{{ isset($flats['flattype']) ? $flats['flattype'] : ''}}" {{ isset($flats['flattype']) && $flats['flattype'] ? '' : 'disabled'}} >
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

                    <input type="hidden" name="flats[microdistrict][]" disabled  value="Донская">
                    <input type="hidden" name="flats[microdistrict][]" disabled  value="Завокзальный">
                    <input type="hidden" name="flats[microdistrict][]" disabled  value="Заречный">
                    <input type="hidden" name="flats[microdistrict][]" disabled  value="КСМ">
                    <input type="hidden" name="flats[microdistrict][]" disabled  value="Макаренко">
                    <input type="hidden" name="flats[microdistrict][]" disabled  value="Мамайкаф">
                    <input type="hidden" name="flats[microdistrict][]" disabled  value="Новый Сочи">
                    <input type="hidden" name="flats[microdistrict][]" disabled  value="Центр">
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
                    <input type="hidden" name="flats[microdistrict][]" disabled  value="Барановка село">
                    <input type="hidden" name="flats[microdistrict][]" disabled  value="Большой Ахун">
                    <input type="hidden" name="flats[microdistrict][]" disabled  value="Бытха">
                    <input type="hidden" name="flats[microdistrict][]" disabled  value="Верхний Юрт село">
                    <input type="hidden" name="flats[microdistrict][]" disabled  value="Измайловка село">
                    <input type="hidden" name="flats[microdistrict][]" disabled  value="Краевско-Армянское село">
                    <input type="hidden" name="flats[microdistrict][]" disabled  value="Кудепста пос.">
                    <input type="hidden" name="flats[microdistrict][]" disabled  value="Малая Объездная">
                    <input type="hidden" name="flats[microdistrict][]" disabled  value="Малый Ахун">
                    <input type="hidden" name="flats[microdistrict][]" disabled  value="Мацестинская Долина">
                    <input type="hidden" name="flats[microdistrict][]" disabled  value="Новая Мацеста">
                    <input type="hidden" name="flats[microdistrict][]" disabled  value="Пластунка село">
                    <input type="hidden" name="flats[microdistrict][]" disabled  value="Приморье">
                    <input type="hidden" name="flats[microdistrict][]" disabled  value="Раздольное село">
                    <input type="hidden" name="flats[microdistrict][]" disabled  value="Светлана">
                    <input type="hidden" name="flats[microdistrict][]" disabled  value="Соболевка">
                    <input type="hidden" name="flats[microdistrict][]" disabled  value='Совхоз "Приморский"'>
                    <input type="hidden" name="flats[microdistrict][]" disabled  value="Старая Мацеста">
                    <input type="hidden" name="flats[microdistrict][]" disabled  value="Фабрициуса">
                    <input type="hidden" name="flats[microdistrict][]" disabled  value="Хоста">
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
                    <input type="hidden" name="flats[microdistrict][]" disabled  value="Адлер-центр">
                    <input type="hidden" name="flats[microdistrict][]" disabled  value="Блиново">
                    <input type="hidden" name="flats[microdistrict][]" disabled  value="Верхневеселое село">
                    <input type="hidden" name="flats[microdistrict][]" disabled  value="Верхнеимеретинская Бухта">
                    <input type="hidden" name="flats[microdistrict][]" disabled  value="Веселое село">
                    <input type="hidden" name="flats[microdistrict][]" disabled  value="Высокое село">
                    <input type="hidden" name="flats[microdistrict][]" disabled  value="Голубые Дали">
                    <input type="hidden" name="flats[microdistrict][]" disabled  value="Красная Поляна пос.">
                    <input type="hidden" name="flats[microdistrict][]" disabled  value="Курортный городок">
                    <input type="hidden" name="flats[microdistrict][]" disabled  value="Мирный">
                    <input type="hidden" name="flats[microdistrict][]" disabled  value="Молдовка село">
                    <input type="hidden" name="flats[microdistrict][]" disabled  value="Нижнеимеретинская Бухта">
                    <input type="hidden" name="flats[microdistrict][]" disabled  value="Олимпийская деревня">
                    <input type="hidden" name="flats[microdistrict][]" disabled  value="Орел-Изумруд село">
                    <input type="hidden" name="flats[microdistrict][]" disabled  value='Совхоз "Южные культуры"'>
                    <input type="hidden" name="flats[microdistrict][]" disabled  value="Черемушки">
                    <input type="hidden" name="flats[microdistrict][]" disabled  value="Эсто-Садок пос.">
                </ul>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <h4>Лазаревский р-н</h4>
                <ul class="list-unstyled" id="dist_4">
                    <li>Волковка село</li>
                    <li>Головинка пос.</li>
                    <li>Горное Лоо село</li>
                    <li>Дагомыс пос.</li>
                    <input type="hidden" name="flats[microdistrict][]" disabled  value="Волковка село">
                    <input type="hidden" name="flats[microdistrict][]" disabled  value="Головинка пос.">
                    <input type="hidden" name="flats[microdistrict][]" disabled  value="Горное Лоо село">
                    <input type="hidden" name="flats[microdistrict][]" disabled  value="Дагомыс пос.">
                </ul>
            </div>
            @if (isset($flats['microdistrict']))
            <script>
                var microdistrict = JSON.parse('<?php echo addslashes(json_encode($flats['microdistrict'])) ?>');
            </script>


            @endif
            <div class="clr"></div>	
        </div>	
    </section>

    <section class="hided_form">
        <section>
            <div>
                <ul id="tabs2" class="nav nav-tabs" data-tabs="tabs">
                    <li class="active full_width">
                        <a href="#rooms" data-toggle="tab">						Отделка				        	
                        </a>
                    </li>
                </ul>
                <?php
                if (isset($flats['furnish'])) {
                    $flats['f_furnish'] = explode(',', $flats['furnish']);
                }
                ?>
                <div class="btn-group" id="furnish">
                    <button type="button" data-furnish="Raw" class="btn {{isset($flats['f_furnish']) && in_array("Raw", $flats['f_furnish']) ? 'active' : '' }}">Черновая</button>
                    <button type="button" data-furnish="Clean" class="btn {{isset($flats['f_furnish']) && in_array("Clean" , $flats['f_furnish']) ? 'active' : '' }}">Чистовая</button>
                    <button type="button" data-furnish="Repair" class="btn {{isset($flats['f_furnish']) && in_array("Repair", $flats['f_furnish']) ? 'active' : '' }}">Ремонт</button>				       
                </div>
                <input type="hidden" name="flats[furnish]" value="{{ isset($flats['furnish']) ? $flats['furnish'] : ''}}" {{ isset($flats['furnish']) && $flats['furnish'] ? '' : 'disabled'}} >
            </div>
            <div>
                <ul id="tabs2" class="nav nav-tabs" data-tabs="tabs">
                    <li class="active full_width">
                        <a href="#rooms" data-toggle="tab">					  Вид				        	
                        </a>
                    </li>
                </ul>
                <div class="btn-group">
                    <button type="button" id="mountview" class="btn {{ isset($flats['mountview']) && $flats['mountview'] ? 'active' : ''}}">На горы</button>
                    <button type="button" id="seaview" class="btn {{ isset($flats['seaview']) && $flats['seaview'] ? 'active' : ''}}">На море</button>
                </div>
                <input type="hidden" name="flats[mountview]" {!! isset($flats['mountview']) && $flats['mountview'] ? 'value="1" ' : 'disabled'!!}  >
                <input type="hidden" name="flats[seaview]" {!! isset($flats['seaview']) && $flats['seaview'] ? 'value="1" ' : 'disabled'!!} >              
            </div>
            <div>
                <ul id="tabs2" class="nav nav-tabs" data-tabs="tabs">
                    <li class="active full_width">
                        <a href="#rooms" data-toggle="tab">					   Этаж					        	
                        </a>
                    </li>
                </ul>
                <div class="btn-group">
                    <button type="button" id="notfirstfloor" class="btn {{ isset($flats['notfirstfloor']) && $flats['notfirstfloor'] ? 'active' : ''}}">Не первый</button>
                    <button type="button" id="notlastfloor" class="btn {{ isset($flats['notlastfloor']) && $flats['notlastfloor'] ? 'active' : ''}}">Не последний</button>
                </div>
                <input type="hidden" name="flats[notfirstfloor]" {!! isset($flats['notfirstfloor']) && $flats['notfirstfloor'] ? ' value="1"' : 'disabled'!!}>
                       <input type="hidden" name="flats[notlastfloor]" {!! isset($flats['notlastfloor']) && $flats['notlastfloor'] ? ' value="1" ' : 'disabled'!!}>
            </div>
            <div class="rayon balcony">
                <ul id="tabs2" class="nav nav-tabs" data-tabs="tabs">
                    <li class="active full_width">
                        <a href="#area" data-toggle="tab">					        	
                            Балкон					        	
                        </a>
                    </li>
                </ul>
                <div id="balcony" style="position:relative;">
                    <select class="form-control select" name="flats[balcony]" >
                        <option {{ !isset($flats['balcony']) ? 'selected' : '' }} value="">Не важно</option>
                        <option value="1" {{ isset($flats['balcony']) && $flats['balcony'] == 1 ? 'selected' : '' }}>Есть</option>
                        <option value="0" {{ isset($flats['balcony']) && $flats['balcony'] == 0 ? 'selected' : '' }}>Нет</option>
                    </select>
<!--                    <a class="btn">Не важно<span class="select_btn"></span></a>
                    <div class="bolcony_hided_blc" style="display: none;">
                        <span>Нет</span>
                        <span>Есть</span>
                    </div>-->
                </div>				          	
            </div>
            <div class='clr'></div>	
        </section>
        <section>							 	
            <div class="furniture">
                <ul id="tabs2" class="nav nav-tabs" data-tabs="tabs">
                    <li class="active full_width">
                        <a href="#rooms" data-toggle="tab">					   Мебель					        	
                        </a>
                    </li>
                </ul>
                <?php
                if (isset($flats['furniture'])) {
                    $flats['f_furniture'] = explode(',', $flats['furniture']);
                }
                ?>
                <div class="btn-group" id="furniture">
                    <button type="button" class="furniture btn {{isset($flats['f_furniture']) && in_array("Full", $flats['f_furniture']) ? 'active' : '' }}" data-furniture="Full">{{Lang::get('enums.Furniture.Full')}}</button>
                    <button type="button" class="furniture btn {{isset($flats['f_furniture']) && in_array("Part", $flats['f_furniture']) ? 'active' : '' }}" data-furniture="Part">Частично</button>
                    <button type="button" class="furniture btn {{isset($flats['f_furniture']) && in_array("None", $flats['f_furniture']) ? 'active' : '' }}" data-furniture="None">Без мебели</button>
                </div>
                <input type="hidden" name="flats[furniture]"  value="{{ isset($flats['furniture']) ? $flats['furniture'] : ''}}" {{ isset($flats['furniture']) && $flats['furniture'] ? '' : 'disabled'}} >
            </div>
            <div class='clr'></div>
        </section>
    </section>
    <section class="boottom_blc">
        <div class="check_blc">
            <div class="slide_btn"><span></span><z>{{Lang::get('main.extend_search')}}</z></div>
            <div class="input_checkbox">
                <label>{{Lang::get('main.elite_build')}}</label>
                <input type="checkbox" name="flats[elite]" {{ isset($flats['elite']) && $flats['elite'] ? 'checked' : ''}} value="1">
                <span></span>
            </div>
            <div class="input_checkbox">
                <label>Ипотека</label>
                <input type="checkbox" name="flats[mortgage]" {{ isset($flats['mortgage']) && $flats['mortgage'] ? 'checked' : ''}} value="1">
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

