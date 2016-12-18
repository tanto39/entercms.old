<?php
 
abstract class Core{
	
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

	//метод для получения выборки из базы
	//static abstract function getContent($uri);
	
	//метод для проверки и изменения юрл
	static function checkUri($checkUri){
		global $mysqli;
	//проверяем нет ли одинакового юрл, изменяем его
		$uriResult = $mysqli->query("SELECT uri FROM uri WHERE uri='$checkUri'");
		$uriCount = count($uriResult->fetch_all(MYSQLI_ASSOC));
		if($uriCount >= 1){
			$checkUri = $checkUri.'1';
			return self::checkUri($checkUri);
		}else{
			return $checkUri;
		}
		
	}
	
	//получаем категории
	static function getCategories(){
		global $mysqli;
		
		$result = $mysqli->query("SELECT id, title FROM categories") or die('ошибка выбора категорий');
		$categories = $result->fetch_all(MYSQLI_ASSOC);

		return $categories;

	}
	
	//получаем категории товаров
	static function getCategoriesProduct(){
		global $mysqli;
		
		$result = $mysqli->query("SELECT id, title FROM productcat") or die('ошибка выбора категорий товаров');
		$categories = $result->fetch_all(MYSQLI_ASSOC);

		return $categories;

	}
	
	//получаем список меню
	static function getMenu(){
		global $mysqli;
		
		$result = $mysqli->query("SELECT id, name FROM menus") or die('ошибка выбора списка меню');
		$menus = $result->fetch_all(MYSQLI_ASSOC);

		return $menus;

	}
	
	//получаем список типов меню
	static function getTypeMenu(){
		global $mysqli;
		
		$result = $mysqli->query("SELECT title FROM typemenu") or die('ошибка выбора списка типов меню');
		$typesMenu = $result->fetch_all(MYSQLI_ASSOC);

		return $typesMenu;

	}
	
	//получаем список всех пунктов меню
	static function getParentMenu(){
		global $mysqli;
		
		$result = $mysqli->query("SELECT title FROM menu WHERE parent = 'first'") or die('ошибка выбора списка пунктов меню');
		$parentMenu = $result->fetch_all(MYSQLI_ASSOC);

		return $parentMenu;

	}
	
	//получаем список всех элементов для выборки в меню
	static function getElement($type = 'материал'){
		global $mysqli;
		
		if(!$type){
			$type = 'материал';
		}
	
		//получаем таблицу
		$result = $mysqli->query("SELECT tablename FROM typemenu WHERE title = '$type'") or die('Ошибка получения таблицы');
		$table = $result->fetch_assoc();
		$table = $table['tablename'];
		
		if($table == "catalog"){
			$elements = [];
		}else{
			//получаем элементы
			$result = $mysqli->query("SELECT id, title FROM $table") or die('Ошибка получения элемента 1');
			$elements = $result->fetch_all(MYSQLI_ASSOC);
			return $elements;
		}

	}

}
 
 
?>
