 <?php

class Db_object{
	protected static $db_table ="users";
	public static function find_all(){
		
		return static::find_this_query("SELECT *FROM ". static::$db_table . " ");



	}

	public static function findById($id){
		global $db;

		$the_result_array = static::find_this_query("SELECT *FROM ". static::$db_table ." WHERE id='$id'");

		return !empty($the_result_array) ? array_shift($the_result_array) : false;
	}




	public static function find_this_query($sql){

		global $db;
		$result_set = $db->query($sql);

		$the_object_array = array();
		

		while($row = mysqli_fetch_array($result_set)){

			$the_object_array[]= static::instantation($row);
		}


		return $the_object_array;
	}



	public static function instantation($the_record){
		$calling_class = get_called_class();
		$userObj = new $calling_class;
        // $userObj->id = $get_user['id'];
        // $userObj->email = $get_user['email'];
        // $userObj->password = $get_user['password'];
        // $userObj->name = $get_user['name'];
        // $userObj->created_at = $get_user['created_at'];

        foreach ($the_record as $the_attribute => $value) {
        	if($userObj->has_the_attribute($the_attribute)){
        		$userObj->$the_attribute = $value; 
        	}
        }
        
        return $userObj;
	}



	private function has_the_attribute($the_attribute){

		$objProperties = get_object_vars($this);

		return  array_key_exists($the_attribute, $objProperties);

	}


	 protected function properties(){
		
		// return get_object_vars($this);

		$properties = array();

		foreach (static::$db_table_fields as $db_field) {
			if(property_exists($this, $db_field)){

				$properties[$db_field] = $this->$db_field;
			}
		}

		return $properties;

	}

	protected function cleanProperties(){
		global $db;
		$clean_properties = array();

		foreach ($this->properties() as $key => $value) {
			
			$clean_properties[$key] = $db->escape_string($value);
		}

		return $clean_properties;

	}

	

	public function save(){

		return isset($this->id) ? $this->update() : $this->create();
	}


	public function create(){
		global $db;

		$properties = $this->cleanProperties();

		$sql = "INSERT INTO " . static::$db_table ."(". implode(",", array_keys($properties)) .")";
		$sql .= "VALUES ('".implode("','",array_values($properties)) ."')";

		
	


		if($db->query($sql)){

			$this->id = $db->the_insert_id();
			return true;
		}else{
			return false;
		}
					   


	}

	public function update(){
		global $db;

		$properties = $this->cleanProperties();



		$properties_pair = array();


		foreach ($properties as $key => $value) {
			
			$properties_pair[] = "{$key}='{$value}'";
		}

		



		
		$sql = "UPDATE ". static::$db_table  . " SET ";
		$sql .= implode(",",$properties_pair);
		$sql .= " WHERE id=" .$db->escape_string($this->id);
		
		

		$db->query($sql);
		return (mysqli_affected_rows($db->connection)==1) ? true:false;


	}


	public function delete(){
		global $db;
		
		$id= $db->escape_string($this->id);

		$sql = "DELETE FROM ". static::$db_table  ." WHERE id='$id'";

		$db->query($sql);
		return (mysqli_affected_rows($db->connection)==1) ? true:false;


	}







}



?>