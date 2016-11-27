<?php
 
class Catalog extends Core{

function __construct(){}

static function getContent($uri){
	global $mysqli;
	
	//подготовленные запросы
	$stmt = $mysqli->prepare("SELECT id, title, description, url, img_url FROM productcat") or die('ошибка s');
	//$stmt->bind_param() or die('ошибка b');
	$stmt->execute() or die('ошибка e');
	$catResult = $stmt->get_result() or die('ошибка r');
	$stmt->close();
	$catalog = $catResult->fetch_all(MYSQLI_ASSOC);
	return $catalog;
}


}
 
 
?>
