<?php
require 'environment.php';

//define("BASE_URL", "http://www.fsconsultores.org/fs");

global $config;
$config = array();

if(ENVIRONMENT == 'development') {
	define("BASE_URL", "http://localhost/fs");
	$config['dbname'] = 'fscon';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = 'root';
} else {
	define("BASE_URL", "http://www.fsconsultores.org/fs");
	$config['dbname'] = 'fscon379_fs';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'fscon379_fscon';
	$config['dbpass'] = '1756piracatu';
}

global $db;
 try{
 	
 	$db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'],$config['dbuser'],$config['dbpass'],array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
 }catch(PDOException $e){
	 echo "ERRO: ".$e->getMessage();
	 exit;
	 }
	
// Mostra todos os erros
 error_reporting(E_ALL);
 ini_set("display_errors", 1);  
 
?>