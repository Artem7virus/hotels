<div id="AJAXform">
    <h1>{$action_type}</h1>
    <form>
		<input name="id" id="id" value="{$bistroAJAX['id']}" type="hidden" />
		
        <label for="type">Тип</label>
        <select name="type" id="type">
        {foreach from=$bistroTypeAJAXlist item=type}
            <option value="{$type['bistro_type_id']}" {php}
				if(isset($bistroAJAX['type']) && ($type['bistro_type_id']==$bistroAJAX['type'])) 
					echo "selected='selected'";
			{/php}>{$type['type']}</option>
        {/foreach}
        </select>
        
        <label for="name">Наименование</label>
        <input name="name" id="name" value="{$bistroAJAX['name']}" type="text" />
        
        <label for="address">Адрес</label>
        <input name="address" id="address" value="{$bistroAJAX['address']}" type="text" />
        
        <label for="services">Услуги, инфраструктура</label>
        <textarea name="services" id="services">{$bistroAJAX['service']}</textarea>
        
        <label for="price">Средний ценник</label>
        <input name="price" id="price" value="{$bistroAJAX['price']}" type="text" />
        
        <label for="phone">Контактный телефон</label>
        <input name="phone" id="phone" value="{$bistroAJAX['phone']}" type="text" />
        
        <img src="Reference/img/ok.jpg" class="okButton" id="okEditButton" title="сохранить">
        <img src="Reference/img/cancel.jpg" class="cancelButton" id="cancelButton" title="отменить и закрыть">
    </form>
    <div class="clear"></div>
</div>
