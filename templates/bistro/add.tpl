<div id="AJAXform">
    <h1>{$action_type}</h1>
    <form>
        <label for="type">Тип</label>
        <select name="type" id="type">
        {foreach from=$bistroTypeAJAXlist item=type}
            <option value="{$type['bistro_type_id']}">{$type['type']}</option>
        {/foreach}
        </select>
        
        <label for="name">Наименование</label>
        <input name="name" id="name" value="" type="text" />
        
        <label for="address">Адрес</label>
        <input name="address" id="address" value="" type="text" />
        
        <label for="services">Услуги, инфраструктура</label>
        <textarea name="services" id="services"></textarea>
        
        <label for="price">Средний ценник</label>
        <input name="price" id="price" value="" type="text" />
        
        <label for="phone">Контактный телефон</label>
        <input name="phone" id="phone" value="" type="text" />
        
        <img src="Reference/img/ok.jpg" class="okButton" id="okAddButton" title="сохранить">
        <img src="Reference/img/cancel.jpg" class="cancelButton" id="cancelButton" title="отменить и закрыть">
    </form>
    <div class="clear"></div>
</div>
