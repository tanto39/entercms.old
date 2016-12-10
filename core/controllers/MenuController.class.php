<?php
//контроллер меню

class MenuController extends Controller{

	//получаем выборку из БД, подключаем файл представления
	static function route($name){
		View::$nameMenu = $name;
		View::$getMenu = Menu::getContent($name);//заносим выборку в статическое свойство класса файлов представления для последующего использования в представлении
		require "core/views/menu.php";	
	}	//end route
	

}
	
	
?>
