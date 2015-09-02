{% include "includes/header.volt" %}
<section class="container apartments_page">
    <h1 class="h_line">{{list_title}}</h1>
    {% if items is defined  %}
    <input type="hidden" name="_token" value="" />
    <div>     
        
        {% for item in items %}
            {{ partial("lists/"~page , ['item' : items ] )}}
        {% else %}
            <p>Нет объектов</p>
        {% endfor %}
    </div>
    {% else %}
    <p>Нет объектов</p>
    {% endif %}
    <div class="clr"></div>
    {#{% if pagination is defined %}
        {% include "includes/pagination.volt" with ['pagination' : pagination] %}
    {% endif %}#}
</section>
{% include "includes/footer.volt" %}