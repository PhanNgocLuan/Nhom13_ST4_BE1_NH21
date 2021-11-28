<?php
require "config.php";
require "models/db.php";
require "models/protype.php";
$protype = new Protype;
if (isset($_POST['submit'])) {
    $type_name = $_POST['name'];			
	$protype->addProtype($type_name);
}
header('location:protypes.php');