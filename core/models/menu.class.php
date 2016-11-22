<?php
 
class Menu extends Core{
	
function __construct(){}

//получаем меню, $name - название меню
static function getContent($name){
	global $mysqli;
	
	//подготовленный запрос
	$stmt = $mysqli->prepare("SELECT title, name, href, parent, has_child FROM menu WHERE name = ?") or die('Ошибка p');
	$stmt->bind_param("s", $name) or die('Ошибка b');
	$stmt->execute() or die('Ошибка e');
	$result = $stmt->get_result() or die('Ошибка r');
	$stmt->close();
	
	$menu = $result->fetch_all(MYSQLI_ASSOC);
	return $menu;

}
	
}
 
 
?>
