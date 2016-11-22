<?php
session_start();
$uri = $_SERVER['REQUEST_URI'];

//автозагрузка классов модели и контроллеров
function loadController($nameClass){
	if(file_exists("core/controllers/".$nameClass.".class.php")){
		require_once "core/controllers/".$nameClass.".class.php";
	}
}

function loadModel($nameClass){
	if(file_exists("core/models/".$nameClass.".class.php")){
		require_once "core/models/".$nameClass.".class.php";
	}
}

spl_autoload_register('loadModel');
spl_autoload_register('loadController');



//вызываем статический метод подключения к базе синглтон
$mysqli = Db::getMysqli();

//выбираем имя таблицы для подключения файлов представления и перенаправления, если значения нет, выдаем 404 ошибку
if(!($table = Uri::getContent($uri))){
	header('Location: /temp/404.php');
};


require_once "temp/index.php"; 
echo 'hello 111';

?>
