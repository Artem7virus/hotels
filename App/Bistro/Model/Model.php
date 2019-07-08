<?php

class AppBistroModel extends CoreModel{
    public $bistroList      = array();
    public $bistroTypesList = array();
    public $bistro          = array();

    /**
     * All types of bistro
     * @return array of arrays
     * @example:
     * [0]array
     *    [0]bistro_type_id @int
     *    [1]type @string
     */
    public function _getBistroTypes(){
        $query = "SELECT * FROM `bistro_types`";
        
        $result = mysqli_query($this->link, $query) 
			or die("Query failed: " . mysqli_error($this->link));
        
        while ($bistroTypes = mysqli_fetch_array($result, MYSQL_ASSOC)){
            $this->bistroTypesList[] = $bistroTypes;
        }
        
        return $this->bistroTypesList;
    }
    
    /**
     * Return bistro record by id
     * @param $bistroId
     * @return array
     */
	public function _getById($bistroId){
		$query = "SELECT * FROM `bistroes` 
                    JOIN `bistro_types` 
                    WHERE `bistro_types`.`bistro_type_id` = `bistroes`.`type` 
						AND `bistroes`.`id` = ".$bistroId." 
						AND `bistroes`.`deleted` != 1";
	    
	    $result = mysqli_query($this->link, $query) 
			or die("Query failed: " . mysqli_error($this->link));
        
        $this->bistro = mysqli_fetch_array($result, MYSQL_ASSOC);

        return $this->bistro;
	}
	
    /**
     * Return bistro records by type
     * @param $typeId
     * @return array of arrays
     */
	public function _getByType($typeId){
        $query = "SELECT * FROM `bistroes` 
                    JOIN `bistro_types` 
                    WHERE `bistro_types`.`bistro_type_id` = `bistroes`.`type` 
						AND `bistroes`.`type` = ".$typeId." 
						AND `bistroes`.`deleted` != 1";
	    
	    $result = mysqli_query($this->link, $query) or die("Query failed: " . mysqli_error($this->link));
        
        while ($bistro = mysqli_fetch_array($result, MYSQL_ASSOC)){
            $this->bistroList[] = $bistro;
        }
        
        return $this->bistroList;
	}	
	
    /**
     * Return all not deleted bistroes
     * @return array of arrays
     */
     public function _getAllBistroes(){
        $query = "SELECT * FROM `bistroes`
                    JOIN `bistro_types` 
                    WHERE `bistro_types`.`bistro_type_id` = `bistroes`.`type` 
                    AND `bistroes`.`deleted` != 1";
        
        $result = mysqli_query($this->link, $query) or die("Query failed: " . mysqli_error($this->link));
        
        while ($bistro = mysqli_fetch_array($result, MYSQL_ASSOC)){
            $this->bistroList[] = $bistro;
        }
        
        return $this->bistroList;
	}
	
    /**
     * Set flag deleted in true on specified bistro record
     * @param int $id
     */
	public function delBistro($Id){
        $query = "UPDATE `bistroes`
                    SET `deleted`=1
                    WHERE `bistroes`.`id` = ".$Id;
	    
	    $result = mysqli_query($this->link, $query) or die("Query failed: " . mysqli_error($this->link));
        
		$this->_getAllBistroes();
	}
	
	/**
	 * Add one bistro record
	 * @param array $data 
	 */
	public function addBistro($data){
		$query = "INSERT INTO `bistroes` 
					(`id`, `type`, `name`, `address`, `service`, `price`, `phone`, `deleted`) 
				  VALUES (NULL, ".$data['type'].", '".$data['name']."', '".$data['address']."', '".
							$data['services']."', '".$data['price']."', '".
							$data['phone']."', 0)";

        $result = mysqli_query($this->link, $query) or die("Query failed: " . mysqli_error($this->link));
        
		$this->_getAllBistroes();
	}
}
