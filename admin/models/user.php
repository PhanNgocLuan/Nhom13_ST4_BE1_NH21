<?php
class User extends Db{
    function getAllUser()
	{			
		$sql = self::$connection->prepare("SELECT * FROM users"); 		
		return parent::select($sql);
    }
    function getAdmin($username,$password)
	{
		$sql = "SELECT * FROM users WHERE user_name LIKE '$username' AND password LIKE '$password' AND roles = 1"; 		
		$item = mysqli_query(self::$connection,$sql);
		$item1 = mysqli_fetch_assoc($item);
		return $item1;
	}
	function getAllUserAdmin()
	{			
		$sql = self::$connection->prepare("SELECT * FROM users, roles WHERE users.roles = roles.role_id"); 		
		return parent::select($sql);
    }
}