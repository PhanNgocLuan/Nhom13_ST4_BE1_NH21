<?php
require "config.php";
require "models/db.php";
require "models/user.php";
$user = new User;
if (isset($_POST['submit'])) {
    $user_name = $_POST['user_name'];
    $password = md5($_POST['password']);	
    $repassword = md5($_POST['password']);
    $roles = 2;
    if($password == $repassword){
        $user->register($user_name,$password,$roles);
        echo "Create succesfully!!! .<a href='javascript: history.go(-2)'>Go Back</a>";
    }
	else{
        echo "Create fail!!! .<a href='javascript: history.go(-1)'>Go Back</a>";
    }
}
