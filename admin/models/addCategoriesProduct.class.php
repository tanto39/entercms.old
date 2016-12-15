<?php
 
class AddCategoriesProduct extends Core{

function __construct(){}

//заносим в базу статью
static function addContent($title, $keywords, $meta_desc, $description, $url, $img_url, $parent, $date_create){
	global $mysqli;

	//проверяем нет ли одинакового юрл, изменяем его
	$url = self::checkUri($url);
	
	//подготовленный запрос
	$stmt = $mysqli->prepare("INSERT INTO productcat (title, keywords, meta_desc, description, url, img_url, parent, date_create) VALUES (?, ?, ?, ?, ?, ?, ?, ?) ") or die('Ошибка добавления категории');
	$stmt->bind_param("ssssssss", $title, $keywords, $meta_desc, $description, $url, $img_url, $parent, $date_create) or die('Ошибка b');
	$stmt->execute() or die('Ошибка e');
	$stmt->close();
	
	//добавляем юрл в таблицу с адресами
	$stmt = $mysqli->prepare("INSERT INTO uri (table_name, uri) VALUES ('productcat', ?)") or die('Ошибка добавления юрл');
	$stmt->bind_param("s", $url) or die('Ошибка юрл b');
	$stmt->execute() or die('Ошибка e');
	$stmt->close();
}

}
 
 
?>
