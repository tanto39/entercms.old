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

//авторизация
$auth = []; //массив со значениями логина и пароля из формы
if((isset($_POST['name']) && !empty($_POST['name'])) && (isset($_POST['pass']) && !empty($_POST['pass'])) ){
	$auth['name'] = $_POST['name'];
	$auth['hash'] = $_POST['pass'];
	LoginController::setSessionAuth($auth); //устанавливаем сессию, проверяем логин и пароль
}

//выход
if(isset($_POST['logout'])){
	unset($_SESSION['auth']);
}

//подключаем вид формы авторизации либо админку
LoginController::route();

?>

