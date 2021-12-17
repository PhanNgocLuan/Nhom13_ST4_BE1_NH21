<?php
	session_start();
	require "../config.php";
	require "../models/db.php";
	require "../models/user.php";
	$user = new User();
	if(isset($_POST['username']) && isset($_POST['password']))
	{
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		//kiem tra dung du lieu
		$userarr = $user->getCustomer($username,$password);		
			if($username == $userarr['user_name'] && $password == $userarr['password'])
			{
				$_SESSION['customer'] = $userarr;										
				header('location:../index.php');
			}
			else {
				header('location:login.php');
			}
	}