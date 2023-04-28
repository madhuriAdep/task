<?php

$sname = "localhost";
$uname="root";
$password = "";

$db_name = "test_db";
$conn = mysqli_connect($sname,$uname,$password,$db_name);

if(!$conn){
    echo "connection failed";
}

// $db_user ="root";
// $db_pass ="";
// $db_name ="useraccounts";

// $db = new PDO('mysql:host=localhost;dbname=' . $db_name . ';charset=utf8', $db_user,$db_pass);
// $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);