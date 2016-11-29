<?php
//контроллер авторизации

class LoginController extends Controller{
	
	//подключаем файл представления
	static function route(){
		if((isset($_SESSION['auth'])) && ($_SESSION['auth'] == 'logged')){
			require_once "temp/default-temp/index.php";
		}else{
			require_once "views/login.php";
		}
			
	}	//end route
	
	//сверяем логин пароль введенный пользователем с данными в БД, создаем сессию, $auth - массив с логином и паролем из формы
	static function setSessionAuth($auth){
		//получаем выборку из базы
		$bdAuth = Login::getLogin($auth);
		
		//проверяем соответствует ли выборке из БД логин и пароль
		if(($bdAuth['name'] == $auth['name']) && ($bdAuth['hash'] == $auth['hash'])){
			$_SESSION['auth'] = 'logged';
		}else{
			echo 'ошибка авторизации, неверный логин или пароль';
		}
		
	}
}
?>
