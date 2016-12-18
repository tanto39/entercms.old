<?php
 
class EditItemMenu extends Core{

function __construct(){}

//получаем пункт меню
static function getContent($getid){
	global $mysqli;
	
	//подготовленный запрос
	$stmt = $mysqli->prepare("SELECT id, name, title, type, parent, sort, date_create, element, element_name FROM menu WHERE id = ?") or die('Ошибка p');
	$stmt->bind_param("s", $getid) or die('Ошибка b');
	$stmt->execute() or die('Ошибка e');
	$result = $stmt->get_result() or die('Ошибка r');
	$stmt->close();
	
	$itemMenu = $result->fetch_assoc();
	return $itemMenu;
}

//заносим в базу отредактированный пункт меню
static function editContent($id, $name, $title, $type, $parent, $sort, $date_create, $element, $element_name){
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
	$stmt = $mysqli->prepare("UPDATE menu SET name = ?, title = ?, type = ?, href = ?, parent = ?, sort = ?, date_create = ?, element = ?, element_name = ? WHERE id = ?") or die('Ошибка добавления пункта');
	$stmt->bind_param("sssssssssi", $name, $title, $type, $href, $parent, $sort, $date_create, $element, $element_name, $id) or die('Ошибка b');
	$stmt->execute() or die('Ошибка e');
	$stmt->close();

}

//изменяем тип меню, при этом данные пункта обнуляются
static function setTypeMenu($type, $id){
	global $mysqli;
	$stmt = $mysqli->prepare("UPDATE menu SET type = ?, href = '', element = '', element_name = '' WHERE id = ?") or die('Ошибка изменения типа пункта меню');
	$stmt->bind_param("si", $type, $id) or die('Ошибка b');
	$stmt->execute() or die('Ошибка e');
	$stmt->close();
	
}

}
 
 
?>
