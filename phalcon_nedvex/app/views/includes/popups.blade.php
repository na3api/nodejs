<div class="modal1 modal fade" id="modal_primary_form">
    <div class="modal-dialog">
        <div class="modal-content"> 
            <form id="primary_form">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h3 class="modal-title"></h3> 
                <input type="hidden" name="url" class="no_clear" value="{{isset($title) ? $title : ''}}" />
                <input type="hidden" name="_token" class="no_clear" value="{{ csrf_token() }}" />
                <input type="hidden" name="form_name" value="" />
                <input type="hidden" name="item_id" value="" />
                <input type="hidden" name="item_name" value="" />
                <input type="hidden" name="type" value="" />
                <input type="text" data-max="50" class="required form-control" name="name" placeholder="Ваше имя">
                <input type="text" data-max="50" class="required form-control" name="phone" placeholder="+7 9XX XXX XX XX">
                <input type="text" data-max="50" class="required email form-control" name="email" placeholder="youremail@gmail.com">
                <button type="submit" class="btn  btn_gold" >Отправить</button> 
            </form>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal2 modal fade" id="modal_success_form">
    <div class="modal-dialog">
        <div class="modal-content"> 
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h3 class="modal-title">Сообщения успешно отправлено</h3> 
            <button type="submit" class="btn btn_gold" data-dismiss="modal">Закрыть</button> 
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="container"><div class="pop_galleria"></div></div>

<!-- video_popup -->
<div class="video_popup"><iframe width="900" height="600" src="" frameborder="0" allowfullscreen></iframe></div>