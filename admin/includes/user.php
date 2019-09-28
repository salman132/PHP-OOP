<?php


class User extends Db_object{
	protected static $db_table ="users";
	protected static $db_table_fields = array('name','email','password');
	public $id;
	public $name;
	public $email;
	public $password;
	public $created_at;



	public static function user_exist($email){
		global $db;
	
		$sql = "SELECT *FROM users WHERE email='$email'";
		

		$get= $db->query($sql);

		if(mysqli_num_rows($get)>=1){
			return true;
		}
	}



	
	

	public static function verify_user($username,$password){
		global $db;

		$username = $db->escape_string($username);
		$password = $db->escape_string($password);

		$sql = "SELECT * FROM ".self::$db_table ." WHERE ";
		$sql .= "email='{$username}'";

		$sql .= " AND password='{$password}'";
		$sql .= "LIMIT 1"; 

		$the_result_array = self::find_this_query($sql);

		
		return !empty($the_result_array) ? array_shift($the_result_array) : false;
	}

	





}

// .... End of the user class ....



$user = new User();







?>