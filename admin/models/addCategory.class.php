<?php
 
class AddCategory extends Core{

function __construct(){}

//заносим в базу статью
static function addContent($title, $keywords, $meta_desc, $description, $url, $img_url, $date_create){
	global $mysqli;

	//проверяем нет ли одинакового юрл, изменяем его
	$url = self::checkUri($url);
	
	//подготовленный запрос
	$stmt = $mysqli->prepare("INSERT INTO categories (title, keywords, meta_desc, description, url, img_url, date_create) VALUES (?, ?, ?, ?, ?, ?, ?) ") or die('Ошибка добавления категории');
	$stmt->bind_param("sssssss", $title, $keywords, $meta_desc, $description, $url, $img_url, $date_create) or die('Ошибка b');
	$stmt->execute() or die('Ошибка e');
	$stmt->close();
	
	//добавляем юрл в таблицу с адресами
	$stmt = $mysqli->prepare("INSERT INTO uri (table_name, uri) VALUES ('categories', ?)") or die('Ошибка добавления юрл');
	$stmt->bind_param("s", $url) or die('Ошибка юрл b');
	$stmt->execute() or die('Ошибка e');
	$stmt->close();
}

//получаем категории
static function getCategories(){
	global $mysqli;
	
	$result = $mysqli->query("SELECT id, title FROM categories") or die('ошибка s');
	$categories = $result->fetch_all(MYSQLI_ASSOC);

	return $categories;

}

}
 
 
?>
