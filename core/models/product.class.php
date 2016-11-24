<?php
 
class Product extends Core{
	
function __construct(){}

//получаем материал
static function getContent($uri){
	global $mysqli;
	
	//подготовленный запрос
	$stmt = $mysqli->prepare("SELECT title, description, content, keywords, meta_desc, date_create, date_update, img_url, price FROM products WHERE url = ?") or die('Ошибка p');
	$stmt->bind_param("s", $uri) or die('Ошибка b');
	$stmt->execute() or die('Ошибка e');
	$result = $stmt->get_result() or die('Ошибка r');
	$stmt->close();
	
	$row = $result->fetch_assoc();
	return $row;
	
	
	//обычный запрос
	/*$result = $mysqli->query("SELECT title, content, keywords, meta_desc, date_create, date_update, img_url, author FROM articles WHERE url = '$uri'");
	$row = $result->fetch_assoc();
	return $row;*/
}
	
}
 
 
?>
