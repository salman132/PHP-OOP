<?php


class User{
	public $id;
	public $name;
	public $email;
	public $password;
	public $created_at;

	public static function find_all_users(){
		
		return self::find_this_query("SELECT *FROM users");



	}

	public static function findUserById($id){
		global $db;

		$the_result_array = self::find_this_query("SELECT *FROM users WHERE id='$id'");

		return !empty($the_result_array) ? array_shift($the_result_array) : false;
	}
	public static function find_this_query($sql){

		global $db;
		$result_set = $db->query($sql);

		$the_object_array = array();
		

		while($row = mysqli_fetch_array($result_set)){

			$the_object_array[]= self::instantation($row);
		}


		return $the_object_array;
	}


	public static function instantation($the_record){
		$userObj = new self;
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

	public static function verify_user($username,$password){
		global $db;

		$username = $db->escape_string($username);
		$password = $db->escape_string($password);

		$sql = "SELECT * FROM users WHERE ";
		$sql .= "email='{$username}'";

		$sql .= " AND password='{$password}'";
		$sql .= "LIMIT 1"; 

		$the_result_array = self::find_this_query($sql);

		


		return !empty($the_result_array) ? array_shift($the_result_array) : false;
	}



}


$user = new User();







?>