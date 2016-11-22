<?php
//контроллер меню

class MenuController extends Controller{
	//название меню
	public static $name;
	//подключаем файл представления
	static function route($name){
		//заносим название меню в static $name, чтобы можно было его получить извне для выборки из БД
		self::$name = $name;
		require "core/views/menu.php";	
	}	//end route
	
	//получаем выборку из БД
	static function getView($name){
		return(Menu::getContent($name));
	}	//end getView
	
}
	
	
?>
