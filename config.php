<?php


//LOCAL SERVER CONFIGURATION

$user = "root";
$pass = "";
$db = new PDO("mysql:host=localhost;dbname=memory",$user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")); 
define("IMG", "/Memory/img/");
define("AUDIO", "/Memory/audio/");
$one_table = array('movies','composer');



