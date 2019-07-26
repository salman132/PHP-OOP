<?php


class User extends Db_object{
	protected static $db_table ="users";
	protected static $db_table_fields = array('name','email','password');
	public $id;
	public $name;
	public $email;
	public $password;
	public $created_at;



	
	

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