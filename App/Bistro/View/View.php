<?php
class AppBistroView extends CoreView{
    public $data;
    public $bistroTypes;
    
    public function getWinMenu(){
		$this->out = "<div class='winMenu'>";
        $this->out .= "<select class='search' id='bistroSearch'>";
        $this->out .= "<option value='' disabled selected hidden>Поиск по типу пункта питания</option>";
        
        foreach ($this->bistroTypes as $types){
            $this->out .= "<option value='".$types['bistro_type_id']."'>".$types['type']."</option>";
        }
        
        $this->out .= "</select>";
        $this->out .= "<img id='addBistro' class='right icon' src='Reference/img/add.png' title='добавить пункт питания'>";
        $this->out .= "</div>";
        
        return $this->out;
    }
        
    public function getList(){
        $this->out  = "<div id='bistroList'></div><table class='list'><tr>";
		$this->out .= '<th>№</th>';
		$this->out .= '<th>Наименование, адрес</th>';
		$this->out .= '<th>Услуги, инфраструктура.</th>';
		$this->out .= '<th>Средний ценник</th>';
		$this->out .= '<th>Контактный телефон</th>';
		$this->out .= '<th>&nbsp;</th></tr>';
		
		foreach ($this->data as $bistro){
            $this->out .= "<tr>";
            $this->out .= "<td>".$bistro['id']."</td>";
            $this->out .= "<td>".$bistro['type']." ".$bistro['name']." ";
            $this->out .= $bistro['address'];
            $this->out .= "</td>";
            $this->out .= "<td>".$bistro['service']."</td>";
            $this->out .= "<td>".$bistro['price']."</td>";
            $this->out .= "<td>".$bistro['phone']."</td>";
            $this->out .= "<td class='control' nowrap='nowrap'>";
            $this->out .= "<img class='editBistro icon' id='editBistro-".$bistro['id']."' attr='".$bistro['id']."' src='Reference/img/edit.png' title='редактировать'>";
            $this->out .= "<img class='delBistro icon' id='delBistro-".$bistro['id']."' attr='".$bistro['id']."' src='Reference/img/del.png' title='удалить'>";
            $this->out .= "</td></tr></div>";
        }
        
        $this->out .='</table>';
        
        return $this->out;
    }
}
