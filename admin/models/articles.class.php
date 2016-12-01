<?php
 
class Articles extends Core{

function __construct(){}

static function getContent(){
	global $mysqli;
	
	//получаем статьи
	//подготовленные запросы
	$stmt = $mysqli->prepare("SELECT id, title, category FROM articles") or die('ошибка s');
	//$stmt->bind_param("s", $uri) or die('ошибка b');
	$stmt->execute() or die('ошибка e');
	$result = $stmt->get_result() or die('ошибка r');
	$stmt->close();
	$articles = $result->fetch_all(MYSQLI_ASSOC);

	return $articles;

}


}
 
 
?>
