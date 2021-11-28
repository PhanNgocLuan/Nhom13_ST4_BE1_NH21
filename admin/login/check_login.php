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
		$userarr = $user->getUserByName_Pass($username,$password);		
			if($username == $userarr['user_name'] && $password == $userarr['password'])
			{
				$_SESSION['user'] = $userarr;													
				header('location:../index.php');
			}
			else {
				header('location:login.php');
			}
	}