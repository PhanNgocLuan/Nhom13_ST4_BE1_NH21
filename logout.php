<?php
session_start();
unset($_SESSION['customer']);
unset($_SESSION['cart']);
//session_destroy();
header("location:index.php");