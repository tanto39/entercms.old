<?php
 
class AddMenu extends Core{

function __construct(){}

//заносим в базу меню
static function addContent($name){
	global $mysqli;
	
	//подготовленный запрос
	$stmt = $mysqli->prepare("INSERT INTO menus (name) VALUES (?) ") or die('Ошибка добавления меню');
	$stmt->bind_param("s", $name) or die('Ошибка b');
	$stmt->execute() or die('Ошибка e');
	$stmt->close();
	
}

}
 
 
?>
