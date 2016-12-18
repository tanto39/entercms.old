<?php
 
class EditMenu extends Core{

function __construct(){}

//получаем меню
static function getContent($getid){
	global $mysqli;
	
	//подготовленный запрос
	$stmt = $mysqli->prepare("SELECT id, name FROM menus WHERE id = ?") or die('Ошибка выборки меню');
	$stmt->bind_param("s", $getid) or die('Ошибка b');
	$stmt->execute() or die('Ошибка e');
	$result = $stmt->get_result() or die('Ошибка r');
	$stmt->close();
	
	$menu = $result->fetch_assoc();
	return $menu;
}

//заносим в базу меню
static function editContent($name, $id){
	global $mysqli;
	
	//подготовленный запрос
	$stmt = $mysqli->prepare("UPDATE menus SET name = ? WHERE id = ? ") or die('Ошибка добавления меню');
	$stmt->bind_param("si", $name, $id) or die('Ошибка b');
	$stmt->execute() or die('Ошибка e');
	$stmt->close();
	
}

}
 
 
?>
