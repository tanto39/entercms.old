<?php
session_start();
$uri = $_SERVER['REQUEST_URI'];

//автозагрузка классов модели и контроллеров
function loadController($nameClass){
	if(file_exists("controllers/".$nameClass.".class.php")){
		require_once "controllers/".$nameClass.".class.php";
	}
}

function loadModel($nameClass){
	if(file_exists("models/".$nameClass.".class.php")){
		require_once "models/".$nameClass.".class.php";
	}
}

spl_autoload_register('loadModel');
spl_autoload_register('loadController');



//вызываем статический метод подключения к базе синглтон
$mysqli = Db::getMysqli();

require_once "temp/default-temp/index.php";
?>

