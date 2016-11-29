<?php
session_start();
$uri = explode('?', $_SERVER['REQUEST_URI'])[0];
require_once "temp-config.php";
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
	header("Location: /temp/$temp/404.php");
};
foreach($_GET as $key => $value){
	if($key != 'p'){
		header("Location: /temp/$temp/404.php");
	}
}

//перенаплавляем если в параметре $_GET['p'] для пагинации указана первая страница
if($_GET['p'] == 1){
	header("Location: $uri");
}

require_once "temp/$temp/index.php"; 
?>
