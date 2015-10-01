<?php


//LOCAL SERVER CONFIGURATION
/*
$user = "root";
$pass = "";
$db = new PDO("mysql:host=localhost;dbname=memory",$user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")); 
define("IMG", "../Memory/img/");
define("AUDIO", "../Memory/audio/");
$one_table = array('movies','composer');
*/

//WEB SERVER CONFIGURATION
//All inkl:

$user = "d01f6e85";
$pass = "Hamburg12";
$db = new PDO("mysql:host=larsitogames.com;dbname=d01f6e85", $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
define("PATH","/larsitogames.com");
define("LOCATION", "http://larsitogames.com/");
define("IMG", "../Memory/img/");
define("AUDIO", "../Memory/audio/");

