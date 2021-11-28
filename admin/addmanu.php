<?php
require "config.php";
require "models/db.php";
require "models/manufacture.php";
$manufacture = new Manufacture;
if (isset($_POST['submit'])) {
    $manu_name = $_POST['name'];			
	$manufacture->addManu($manu_name);
}
header('location:manufactures.php');