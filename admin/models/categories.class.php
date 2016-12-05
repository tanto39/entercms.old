<?php
 
class Categories extends Core{

function __construct(){}

static function getContent(){
	global $mysqli;
	
	//получаем категории
	//подготовленные запросы
	$stmt = $mysqli->prepare("SELECT id, title, date_create FROM categories ORDER BY date_create") or die('ошибка s');
	//$stmt->bind_param("s", $uri) or die('ошибка b');
	$stmt->execute() or die('ошибка e');
	$result = $stmt->get_result() or die('ошибка r');
	$stmt->close();
	$categories = $result->fetch_all(MYSQLI_ASSOC);

	return $categories;

}


}
 
 
?>
