<?php 
//класс возврата выборки из базы

class View{
	public function __construct(){}
	
	//свойство куда заносится выборка из БД, путем ContentController::route()
	static public $getView;
	//свойство куда будет заносится выборка поиска
	static public $getSearch;
	//свойство куда будет заносится выборка списка категорий
	static public $getCategories;
	//свойство куда будет заносится выборка списка меню
	static public $getMenu;
	//свойство куда будет заносится тип меню
	static public $getTypeMenu;
	//свойство куда будут заносится все пункты меню
	static public $getParentMenu;
	//свойство куда будут заносится все элементы для меню
	static public $getElement;
	
	//проверка валидности числа
	public function toInteger($data){
		$data = abs((int)$data);
		return $data;
	}
	
	//жесткая проверка валидности строки
	public function toString($data){
		$data = htmlspecialchars(stripslashes(strip_tags(trim($data))));
		return $data;
	}
	
}



?>


