<?php
//контроллер меню

class MenuController extends Controller{

	//получаем выборку из БД, подключаем файл представления
	static function route($name){
		$parentsMenu = [];
		View::$nameMenu = $name;
		View::$getMenu = Menu::getContent($name);//заносим выборку в статическое свойство класса файлов представления для последующего использования в представлении
		
		//получаем родительские пункты
		foreach(View::$getMenu as $itemMenu)
		if($itemMenu['parent'] != 'first'){
			$parentsMenu[] = $itemMenu['parent'];
		}
		View::$parentsMenu = array_unique($parentsMenu);
		require "core/views/menu.php";	
	}	//end route
	

}
	
	
?>
