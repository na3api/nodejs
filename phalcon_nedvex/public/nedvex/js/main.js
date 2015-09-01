jQuery(document).ready(function ($) {
    $('#tabs, #tabs2, #tabs3, #tabs4, #tabsCommercial').tab();
    $('.selectpicker').selectpicker({
        size: 4
    });

    /* MICRODISTRICTS - See all list */
    jQuery('.more_areas').click(function (event) {
        event.preventDefault();
        var areasDisplay = jQuery('.area_list_hole').css('display');
        if (areasDisplay == "none") {
            jQuery('.area_list_hole').css('display', 'block');
        } else {
            jQuery('.area_list_hole').css('display', 'none');
        }
        ;
    });
    /* include selectbox plugin*/
    $(".select").selectbox();

    /* AREAS - Apartment building */
    if (typeof areas_zone != 'undefined' || $('[name="areas[LandPurpose]"]').val() == "Flats")
    {
        $('[name="areas[LandPurpose]"]').addClass('first_select');
        $('.second_select').selectbox("attach").prop('disabled', false);
        $('.show_tab').show();
    } else {
        $('.second_select').selectbox("detach").hide().prop('disabled', true);
    }

    /* MASKS */
    $('.number').mask('000 000 000');
    $('.square_mask').mask('0 000');
    $('[name="phone"]').mask('+7 000 000 00 00');
    $('[name="registration[phone]"]').mask('+7 000 000 00 00');


    /* FORM FEEDBACK VALIDATION */
    $('#primary_form').validation({
        success: function (data) {
            $.ajax({
                url: '/primaryFeedback',
                type: 'post',
                data: $('#primary_form').serialize(),
                dataType: 'json',
                success: function (request) {
                    if (request.success)
                    {
                        $('#primary_form').clear_form()
                        $('#modal_primary_form').modal('hide');
                        $('#modal_success_form').modal('show');
                    }
                }
            })
        }
    });

    $('.apart_exact').each(function () {
        var owerall = $(this).find('.bottom_blc').width()// - 27;
        var first = $(this).find('.bottom_blc span:first').width();
        if (first)
            first += 18;
        else
            $(this).find('.bottom_blc span:first').hide()
        var second = $(this).find('.bottom_blc span:eq(1)').width();
        if (second)
            second += 23;
        else
            $(this).find('.bottom_blc span:eq(1)').hide()

        $(this).find('.bottom_blc span:eq(2)').css('width', owerall - (first + second))
    })
    /* registration */
    $('#registration_form').validation({
        action: 'submit',
        type: 'underfield',
        success: function (data) {
            $('#registration_form').addClass('no_valid').submit();
        }
    });
   

    /* authentification */



});
/* ON SHOW BUTTON*/
$(document).on('click', '.feedback_button', function (e) {
    e.preventDefault();
    $('#modal_primary_form [name="type"]').val($(this).attr('data-type'));
    $('#modal_primary_form [name="item_id"]').val($(this).attr('data-id'));
    if ($(this).attr('data-type') == 'item')
    {
        var title = $(this).attr('data-title').replace("{name}", $(this).attr('data-name'))
        $('#modal_primary_form [name="form_name"]').val(title);
        $('#modal_primary_form h3').text(title);

    } else {
        $('#modal_primary_form [name="form_name"]').val($(this).attr('data-title'));
        $('#modal_primary_form h3').text($(this).attr('data-title'));
    }
    $('#modal_primary_form [name="item_name"]').val($(this).attr('data-name'));
    $('#modal_primary_form').modal('show');
});
$(document).on("click", ".sbOptions a", function () {
    $(this).parents('ul').find("a").removeClass('active');
    $(this).addClass("active")
})

/* AREAS - Show/Hide dropdown list */
$(document).on('click', '#area a', function (event) {
    event.preventDefault();
    var areaDisplay = $('#area .areas_list').css('display');
    if (areaDisplay == "none") {
        $('#area .areas_list').css('display', 'block')
        $('#area a span').css('background-position', '0 0px')
    } else {
        $('#area .areas_list').css('display', 'none')
        $('#area a span').css('background-position', '0 -10px')
    }
});

/* AREAS FULL LIST - Click on title */
$(document).on('click', ".area_list_hole .col-lg-3 h4", function (e) {
    var page_id = $(this).parents('.tab-pane-main').attr('data-page_cont');
    $('#' + page_id + ' .input_checkbox label:contains("' + $(this).text() + '")').siblings('.district').click();
})

/* FORMS - Hide dropdwon list on custom selectbox */
$(document).on('click', "body", function (e) {
    var target = $(e.target);
    if (!target.parents('div#area').length) {
        $('#area .areas_list').css('display', 'none')
        $('#area a span').css('background-position', '0 -10px')
    } else {
        $('#balcony .areas_list').css('display', 'none')
        $('#balcony a span').css('background-position', '0 -10px')
    }
    if (!target.parents('div#balcony').length) {
        $('#balcony .areas_list').css('display', 'none')
        $('#balcony a span').css('background-position', '0 -10px')
    } else {
        $('#area .areas_list').css('display', 'none')
        $('#area a span').css('background-position', '0 -10px')
    }
})

/* FORMS - Show Custom Dropdown list for communication */
$(document).on('click', '#balcony a', function (event) {
    event.preventDefault();
    var areaDisplay = $('#balcony .areas_list').css('display');
    if (areaDisplay == "none") {
        $('#balcony .areas_list').css('display', 'block')
        $('#balcony a span').css('background-position', '0 0px')
    } else {
        $('#balcony .areas_list').css('display', 'none')
        $('#balcony a span').css('background-position', '0 -10px')
    }
    ;

});
////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////AREAS SELECT///////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
$(document).on('click', '#area .areas_list .input_checkbox', function (e) {
    var checkbox = $(this).children('.district');
    var page_id = $(this).parents('.tab-pane-main').attr('data-page_cont');
    if (checkbox.prop('checked'))
    {
        var region = $('#' + page_id + ' #dist_' + checkbox.val())

        $('#' + page_id + ' #dist_' + checkbox.val() + ' li').each(function () {
            $(this).addClass('selected');
            $(this).siblings("#" + page_id + " [value='" + $(this).text() + "']").prop('disabled', false);
        })
    } else {
        $('#dist_' + checkbox.val() + ' li').each(function () {
            $(this).removeClass('selected')
            $(this).siblings("#" + page_id + " [value='" + $(this).text() + "']").prop('disabled', true);
        })
    }
    var select_title = '';
    $('.areas_list .district').each(function () {
        select_title += $(this).prop('checked') ? (select_title == '' ? '' : ', ') + $(this).siblings('label').text() : '';
    })
    $('#' + page_id + ' #area .select_title').text(select_title != '' ? select_title : 'Не важно');
})
/* close area full*/
$(document).on('click', '.area_save_btn', function (event) {
    event.preventDefault();
    $('.area_list_hole').css('display', 'none');
    $('#area .areas_list').css('display', 'block')

});
$(document).on('click', '.area_close_btn', function (event) {
    event.preventDefault();
    $('.area_list_hole').css('display', 'none');

});
$(document).on('click', '.col-lg-3 .list-unstyled li', function () {
    var page_id = $(this).parents('.tab-pane-main').attr('data-page_cont');
    if ($(this).hasClass('selected'))
    {
        $(this).removeClass('selected')
        $(this).siblings("[value='" + $(this).text() + "']").prop('disabled', true);
        if ($('#' + page_id + ' #' + $(this).parents('.list-unstyled').attr('id') + ' li.selected').length != $('#' + page_id + '  #' + $(this).parents('.list-unstyled').attr('id') + ' input').length)
        {
            $('#' + page_id + ' .district[value="' + $(this).parents('.list-unstyled').attr('id').substr(-1) + '"]').prop('checked', false)
        }
    } else {
        $(this).addClass('selected');
        $(this).siblings("[value='" + $(this).text() + "']").prop('disabled', false);
        if ($('#' + page_id + ' #' + $(this).parents('.list-unstyled').attr('id') + ' li.selected').length == $('#' + page_id + '  #' + $(this).parents('.list-unstyled').attr('id') + ' input').length)
        {
            $('#' + page_id + ' .district[value="' + $(this).parents('.list-unstyled').attr('id').substr(-1) + '"]').prop('checked', true)
        }
    }
})
////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////CHECKBOX IMITATION/////////////////////////////
////////////////////////////////////////////////////////////////////////////////
$(document).on('click', '.btn-group button', function (e) {
    var id = $(this).parent('div').attr('id');
    var page_id = $(this).parents('.tab-pane-main').attr('data-page_cont');
    if (id && !$(this).parent('div').hasClass('radio'))
    {
        if ($(this).hasClass('active'))
        {
            $(this).removeClass('active');

            $('[name="' + page_id + '[' + id + ']"]').val(get_list());
        } else {
            $(this).addClass('active');
            $('[name="' + page_id + '[' + id + ']"]').val(get_list()).prop('disabled', false);
        }
        function get_list()
        {
            var list = '';
            $('#' + page_id + ' #' + id + ' button.active').each(function () {
                list += (list == '' ? '' : ',') + $(this).attr('data-' + id)
            })
            return list;
        }

    } else if ($(this).parent('div').hasClass('radio')) {
        if ($(this).hasClass('active'))//$('[name="'+page_id+'[' + id + ']"]').val($(this).attr('data-' + id)))
        {
            $(this).removeClass('active');
            $('[name="' + page_id + '[' + id + ']"]').val("").prop('disabled', true);
        } else {
            $(this).siblings('button').removeClass('active')
            $(this).addClass('active');
            $('[name="' + page_id + '[' + id + ']"]').val($(this).attr('data-' + id)).prop('disabled', false);
        }
    }
    else {
        var id = $(this).attr('id');
        if (!$('[name="' + page_id + '[' + id + ']"]').val())
        {
            $(this).addClass('active');
            $('[name="' + page_id + '[' + id + ']"]').val(1).prop('disabled', false);
        } else {
            $(this).removeClass('active');
            $('[name="' + page_id + '[' + id + ']"]').val('')
        }
    }
})

/* short and long form */
$(document).on('click', '.slide_btn', function () {
    var page_id = $(this).parents('.tab-pane-main').attr('data-page_cont');
    if ((window.location.pathname != '/'))
    {
        if (!$(this).hasClass('full')) {
            show_full($('#' + page_id + ' .slide_btn'), page_id)
        } else {
            hide_full($('#' + page_id + ' .slide_btn'), page_id)
        }

    } else {
        window.location.href = '/' + page_id + '?full';
    }
})
function show_full($this, page_id)
{
    $this.addClass('full')
    if (typeof (page_id) !== undefined)
    {
        $('#' + page_id + ' .hided_form').slideDown();
        $('#' + page_id + ' .hided_form').find('input').prop('disabled', false)
        $('#' + page_id + ' .hided_form').find('select').prop('disabled', false)
        $('#' + page_id + ' .slide_btn z').text('Свернуть')
        $('#' + page_id + ' .slide_btn span').css('background-position', '-48px -5px')
        $('#' + page_id + ' .full_form').prop('disabled', false).parent('div').show()
        $('#' + page_id + ' .short_form').prop('disabled', true).parent('div').hide()
        $('#' + page_id + ' #form_type').val('full')

    }
}
function hide_full($this, page_id)
{
    $this.removeClass('full')
    if (typeof (page_id) !== undefined)
    {
        $('#' + page_id + ' .hided_form').slideUp();
        $('#' + page_id + ' .hided_form').find('input').prop('disabled', true)
        $('#' + page_id + ' .hided_form').find('select').prop('disabled', true)
        $('#' + page_id + ' .slide_btn z').text('Расширенный поиск');
        $('#' + page_id + ' .slide_btn span').css('background-position', '-15px -5px');
        $('#' + page_id + ' .full_form').prop('disabled', true).parent('div').hide()
        $('#' + page_id + ' .short_form').prop('disabled', false).parent('div').show()
        $('#' + page_id + ' #form_type').val('short')
    }
}
/* show full search and active form */
//var page = window.location.pathname.substring(1);
////////////////////////////////////////////////////////////////////////////////
///////////////////////////////AFTER LOAD PAGE//////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
if (page && page != 'home')
{
    $('#' + page + ' #form_type').val(form_type);
    if (window.location.search == '?full' || form_type == 'full')
    {
        show_full($('#' + page + ' .slide_btn'), page)
    }
    $('.tab-pane-main, #tabs li').removeClass('active');
    if (page == 'busines' || page == 'offices' || page == 'hotels' || page == 'storages')
    {
        $('#tabsCommercial>li, .commerce_forms>div.tab-pane').removeClass('active')
        $('[data-page_cont="commerce"], [data-page="commerce"], [data-commerce_tab="' + page + '"], .commerce_forms #' + page).addClass('active');

    } else {
        $('.tab-pane-main, #tabs li').removeClass('active');
        $('.commerce_forms #busines, #tabsCommercial:first').addClass('active');
        $('[data-page_cont="' + page + '"], [data-page="' + page + '"]').addClass('active');

    }
    if (microdistrict !== undefined)
    {
        $('#' + page + ' .area_list_hole li').each(function () {
            if (microdistrict.indexOf($(this).text()) >= 0)
            {
                $(this).addClass('selected');
                $(this).siblings("#" + page + " [value='" + $(this).text() + "']").prop('disabled', false);
            }
        })
        for (var i = 1; i <= 4; i++)
        {
            if ($('#' + page + ' #dist_' + i + ' li.selected').length == $('#' + page + '  #dist_' + i + ' input').length)
            {
                $('#' + page + ' .district[value="' + i + '"]').prop('checked', true)
            }
        }
    }
    var select_title = '';
    $('#' + page + ' .areas_list .district').each(function () {
        select_title += $(this).prop('checked') ? (select_title == '' ? '' : ', ') + $(this).siblings('label').text() : '';
    })
    $('#' + page + ' #area .select_title').text(select_title != '' ? select_title : 'Все районы');
    select_title = '';
    $('#' + page + ' .communication_list .communication').each(function () {
        select_title += $(this).prop('checked') ? (select_title == '' ? '' : ', ') + $(this).siblings('label').text() : '';
    })
    $('#' + page + ' #balcony .select_title').text(select_title != '' ? select_title : 'Не важно');
}
///////////////////////////////////////////////////////////////////////////////
////////////////////////////FAVORITE///////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
$(document).on('click', '#add_to_favorite', function (e) {
    e.preventDefault();
    $.ajax({
        url: $(this).hasClass('favorited') ? '/RemoveFromFavorite' : '/addToFavorite',
        type: 'post',
        data: {info: $(this).attr('data-info'), _token: $('[name="_token"]').val()},
        dataType: 'json',
        success: function () {
            if (window.location.pathname == '/favorites') {
                window.location.reload()
            }
        }
    })
    if ($(this).hasClass('favorited'))
    {
        $(this).removeClass('favorited')
    } else {
        $(this).addClass('favorited')
    }
})
///////////////////////////////////////////////////////////////////////////////
//////////////////////////////SLIDER TABS//////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
$(document).ready(function () {

    if (typeof slider_sizes != 'undefined')
    {

        var active = $('.hot_offers li.active a').attr('data-type');
        if (!$('#data_container .apart_exact[data-type="Flat"]').length)
        {
            $('.hot_offers li a[data-type="Flat"]').parent().hide()
        }
        if (!$('#data_container .apart_exact[data-type="House"]').length)
        {
            $('.hot_offers li a[data-type="House"]').parent().hide()
        }
        if (!$('#data_container .apart_exact[data-type="Land"]').length)
        {
            $('.hot_offers li a[data-type="Land"]').parent().hide()
        }
        if (!$('#data_container .apart_exact[data-type="Busines"]').length)
        {
            $('.hot_offers li a[data-type="Busines"]').parent().hide()
        }
        if (!$('#data_container .apart_exact[data-type="Office"]').length)
        {
            $('.hot_offers li a[data-type="Office"]').parent().hide()
        }
        if (!$('#data_container .apart_exact[data-type="Hotel"]').length)
        {
            $('.hot_offers li a[data-type="Hotel"]').parent().hide()
        }
        if (!$('#data_container .apart_exact[data-type="Store"]').length)
        {
            $('.hot_offers li a[data-type="Store"]').parent().hide()
        }

        $.each(slider_sizes, function (i, n) {
            if (i > w_monitor)
            {
                slider_size = n;
                return false;
            }
        });
        slideCreating(active, function () {
        });
    }
})
$(document).on('click', '.hot_offers>li>a', function (e) {
    e.preventDefault()
    var active = $(this).attr('data-type');
    if (!$(this).parent('li').hasClass('active'))
    {
        $('.hot_offers li').removeClass('active');
        $(this).parent().addClass('active')
        $('#carousel1 .top .apartments_page').fadeOut(400, function () {
            slideCreating(active, function () {
            });
        });

    }
})
function slideCreating(active, callback)
{
    var count;
    var slide = '';
    var elem = 0;
    slide = '<div class="item active apartments_page">';
    if (active != 'all')
    {
        active = '[data-type="' + active + '"]';
    } else {
        active = ''
    }
    $('.top #data_container .apart_exact' + active + '').each(function () {
        if (elem == slider_size)
        {
            slide += '</div><div class="item apartments_page">';
            elem = 0;
        }
        slide += $(this).wrap('<p></p>').parent().html();
        $(this).unwrap();
        elem++;
    })
    slide += '</div>';
    $('#carousel1 .top .apartments_page').remove()
    $('#data_container').after(slide);

    if ((count = $('#data_container .apart_exact' + active).length) > slider_size)
    {
        var page_count = Math.ceil(count / slider_size);
        var html = '';

        $('#carousel1 .carousel-indicators').html('')
        for (var i = 0; i < page_count; i++)
        {
            html += '<li data-target="#carousel1" data-slide-to="' + i + '" class="' + (i == 0 ? 'active' : '') + '"></li>';
        }
        $('#carousel1 .carousel-indicators').html(html).show()

    } else {
        $('#carousel1 .carousel-indicators').hide()
    }
    return callback();
}
///////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////AREAS////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////

$(document).on('change', '[name="areas[LandPurpose]"]', function () {
    if ($(this).val() == "Flats") {
        $(this).addClass('first_select')
        $('.for_adaptive').addClass("half_width")
        $('.second_select').selectbox("attach").prop('disabled', false);
        $('.show_tab').show();
    } else {
        $(this).removeClass('first_select')
        $('.second_select').selectbox("detach").hide().prop('disabled', true);
        $('.show_tab').hide();
    }
});
///////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////Communication////////////////////////////
///////////////////////////////////////////////////////////////////////////////

$(document).on('change', '.communication_list .communication', function () {
    var page_id = $(this).parents('.tab-pane-main').attr('data-page_cont');
    var select_title = '';
    $('#' + page_id + ' .communication_list .communication').each(function () {
        select_title += $(this).prop('checked') ? (select_title == '' ? '' : ', ') + $(this).siblings('label').text() : '';
    })
    $('#' + page_id + ' #balcony .select_title').text(select_title != '' ? select_title : 'Не важно');
});

///////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////Popup Gallery////////////////////////////
///////////////////////////////////////////////////////////////////////////////

$(document).ready(function () {
    $(".carousel .item img").click(function () {
        // очистка попапа 
        $(this).parents(".carousel").clone().appendTo($(".pop_galleria"));
        $(".pop_galleria .carousel").attr("id", "popup_gallery")
        $(".pop_galleria .carousel-indicators li").attr("data-target", "#popup_gallery");
        $(".pop_galleria .carousel-control").attr("href", "#popup_gallery");
        $(".pop_galleria .carousel-indicators").wrap("<div class='container'></div>");
        $(".pop_galleria .carousel-inner").append("<div class ='close_gallery'></div>");//add close button
        $(".pop_galleria .carousel-control").appendTo(".pop_galleria .carousel-inner");
        $(".pop_galleria .thumbs ol").before("<div class ='popup_left_arrow'></div>");//add close button
        $(".pop_galleria .thumbs ol").after("<div class ='popup_right_arrow'></div>");//add close button
        $("#popup_gallery").carousel();

        $(".pop_galleria").css({"position": "fixed", "z-index": "1000"});
        $(".pop_galleria").animate({"opacity": "1"}, 200);
        $("html,body").css("overflow", "hidden");


        /***************/
        var ol_width = (parseInt($(".pop_galleria .carousel-indicators li").css("width")) + 5) * $(".pop_galleria .carousel-indicators li").length + 10;
        $(".pop_galleria .carousel-indicators").css("width", ol_width + "px");

        var thumbs_container_width = parseInt($(".pop_galleria .thumbs .container").css("width")) - 70;

        var ml = parseInt($(".pop_galleria .carousel-indicators").css("margin-left"));
        /****************/
        /*****right*****/
        $(".popup_right_arrow").click(function () {

            ml = parseInt($(".pop_galleria .carousel-indicators").css("margin-left"));
            ol_width += ml - 10;
            if (thumbs_container_width < ol_width) {

                $(".pop_galleria .carousel-indicators").animate({"margin-left": -1 * thumbs_container_width + ml + 20 + "px"}, 500);
            }

        });

        /****left*/
        $(".popup_left_arrow").click(function () {

            ml = parseInt($(".pop_galleria .carousel-indicators").css("margin-left"));


            if (ml < 0) {
                $(".pop_galleria .carousel-indicators").animate({"margin-left": thumbs_container_width + ml - 20 + "px"}, 500);
                if (ml != 10)
                    ol_width += ml * (-1) + 10;
            }

        });

        $(".close_gallery,.pop_galleria").click(function (e) {
            if (e.toElement.nodeName != "IMG" && e.toElement.nodeName != "SPAN" && e.toElement.className != "container" && e.toElement.className != "popup_left_arrow" && e.toElement.className != "popup_right_arrow" && e.toElement.className != "thumbs") {

                $(".pop_galleria").animate({"opacity": "0"}, 400);
                $(".pop_galleria").css({"z-index": "-1"});
                $("html,body").css("overflow", "auto");
                $(".pop_galleria").html("");
            }
        });


        $(".pop_galleria .carousel-inner").css("height", window.innerHeight - 100 + "px");
        $(".pop_galleria .carousel-inner").css("margin-top", (window.innerHeight - 100) * 10 / 100 + "px");



        // $(".pop_galleria .carousel-inner").bind('mousewheel DOMMouseScroll', function(event){
        //     if (event.originalEvent.wheelDelta > 0 || event.originalEvent.detail < 0) {
        //         $(".pop_galleria .carousel-inner .item.active").removeClass("active").next().addClass("active")
        //     }
        //     else {
        //         $(".pop_galleria .carousel-inner .item.active").removeClass("active").prev().addClass("active")
        //     }
        // });

    });

    /*******video-popup*******/
    $(".btn_play").click(function (e) {
        e.preventDefault();
        $(".video_popup iframe").attr("src", $(".btn_play").attr("href"));
        $(".video_popup").fadeIn();
        var video_height = parseInt($(".video_popup iframe").css("height"));
        $(".video_popup iframe").css("margin-top", (window.innerHeight - video_height) / 2 + "px")
    });
    $(".video_popup").click(function () {
        $(this).fadeOut();
    })




    /*******fotorama*******/

    /********owl-carusel********/ 
    $(document).ready(function() {

      var owl = $("#owl-demo");

      owl.owlCarousel({

        // Define custom and unlimited items depending from the width
        // If this option is set, itemsDeskop, itemsDesktopSmall, itemsTablet, itemsMobile etc. are disabled
        // For better preview, order the arrays by screen size, but it's not mandatory
        // Don't forget to include the lowest available screen size, otherwise it will take the default one for screens lower than lowest available.
        // In the example there is dimension with 0 with which cover screens between 0 and 450px
        
        itemsCustom : [
          [0, 1],
          [594, 1],
          [768, 2]
        ],
        navigation : true

      });



    }); 

});

/************************************************/