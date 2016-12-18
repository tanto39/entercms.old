<?php
 
class AddItemMenu extends Core{

function __construct(){}

//заносим в базу отредактированный пункт меню
static function addContent($name, $title, $type, $parent, $sort, $date_create, $element, $element_name){
	global $mysqli;
	$href = "/";
	
	//получение ссылки
	//получаем таблицу из которой будем получать ссылку в соответствие с типом меню
	$stmt = $mysqli->prepare("SELECT tablename FROM typemenu WHERE title = ?") or die('Ошибка получения ссылки 1');
	$stmt->bind_param("s", $type) or die('Ошибка b');
	$stmt->execute() or die('Ошибка e');
	$result = $stmt->get_result() or die('Ошибка r');
	$stmt->close();
	$table = $result->fetch_assoc();
	$table = $table['tablename'];
	
	if($table != "catalog"){
		//получаем ссылку
		$stmt = $mysqli->prepare("SELECT url FROM $table WHERE id = ?") or die('Ошибка получения ссылки 2');
		$stmt->bind_param("s", $element) or die('Ошибка b');
		$stmt->execute() or die('Ошибка e');
		$result = $stmt->get_result() or die('Ошибка r');
		$stmt->close();
		$href = $result->fetch_assoc();
		$href = $href['url'];
	}else{$href = "/catalog";}
	
	
	//подготовленный запрос добавление в таблицу с пунктами меню пункта меню
	$stmt = $mysqli->prepare("INSERT INTO menu (name, title, type, href, parent, sort, date_create, element, element_name) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)") or die('Ошибка добавления пункта');
	$stmt->bind_param("sssssssss", $name, $title, $type, $href, $parent, $sort, $date_create, $element, $element_name) or die('Ошибка b');
	$stmt->execute() or die('Ошибка e');
	$stmt->close();
	

}

}
 
 
?>
