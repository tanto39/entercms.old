<?php
 
class ItemMenus extends Core{

function __construct(){}

static function getContent($activeMenu = '%'){
	global $mysqli;
	
	if(!$_COOKIE['activeMenu']){
		$activeMenu = '%';
	}
	
	//получаем статьи
	//подготовленные запросы
		$stmt = $mysqli->prepare("SELECT id, title, type, parent, sort FROM menu WHERE name LIKE ? ORDER BY date_create") or die('ошибка s');
		$stmt->bind_param("s", $activeMenu) or die('ошибка b');
		$stmt->execute() or die('ошибка e');
		$result = $stmt->get_result() or die('ошибка r');
		$stmt->close();
		$itemsMenu = $result->fetch_all(MYSQLI_ASSOC);

	return $itemsMenu;

}


}
 
 
?>
