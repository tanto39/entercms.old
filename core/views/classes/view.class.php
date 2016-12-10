<?php 
//класс возврата выборки из базы

class View{
	public function __construct(){}
	
	//свойство куда заносится выборка из БД, путем ContentController::route()
	static public $getView;
	//свойство куда будет заносится выборка поиска
	static public $getSearch;
	//свойство куда будет заносится выборка меню
	static public $getMenu;
	//свойство куда будет заносится название меню
	static public $nameMenu;
	
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


