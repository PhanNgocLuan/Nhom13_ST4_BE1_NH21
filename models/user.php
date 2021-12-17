<?php
class User extends Db{
    function getCustomer($username,$password)
	{
		$sql = "SELECT * FROM users WHERE `user_name` LIKE '$username' AND password LIKE '$password' AND roles = 2"; 		
		$item = mysqli_query(self::$connection,$sql);
		$item1 = mysqli_fetch_assoc($item);
		return $item1;
	}
	public function register($user_name,$password,$roles)
    {
		$sql1 = self::$connection->prepare("SELECT * FROM users");
		$sql1->execute();
		$item = array();
		$item = $sql1->get_result()->fetch_all(MYSQLI_ASSOC);		
		if($item == null)
		{
			$sql = self::$connection->prepare("INSERT INTO users(`user_name`,`password`,`roles`) VALUES('$user_name','$password',$roles)");
				$sql->execute();
				echo "Tạo tài khoản thành công . <a href='javascript: history.go(-1)'>Trở lại</a>";
		}	
		else {				
			$count = 0;
			foreach ($item as $key) {
				if($key['user_name'] == $user_name)
				{
					echo "Username đã tồn tại . <a href='javascript: history.go(-1)'>Trở lại</a>";
					exit;
					$count++;
				}					
			}
			if($count == 0)
			{
				$sql = self::$connection->prepare("INSERT INTO users(`user_name`,`password`,`roles`) VALUES('$user_name','$password',$roles)");
				$sql->execute();			
			}
		}			
    }
}