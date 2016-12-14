<?php
 
class AddProduct extends Core{

function __construct(){}

//заносим в базу статью
static function addContent($title, $keywords, $meta_desc, $description, $content, $url, $img_url, $date_create, $date_update, $price, $articul, $manufacturer, $category){
	global $mysqli;

	//проверяем нет ли одинакового юрл, изменяем его
	$url = self::checkUri($url);
	
	//подготовленный запрос
	$stmt = $mysqli->prepare("INSERT INTO products (title, keywords, meta_desc, description, content, url, img_url, date_create, date_update, price, articul, manufacturer, category) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ") or die('Ошибка добавления товара');
	$stmt->bind_param("sssssssssssss", $title, $keywords, $meta_desc, $description, $content, $url, $img_url, $date_create, $date_update, $price, $articul, $manufacturer, $category) or die('Ошибка b');
	$stmt->execute() or die('Ошибка e');
	$stmt->close();
	
	//добавляем юрл в таблицу с адресами
	$stmt = $mysqli->prepare("INSERT INTO uri (table_name, uri) VALUES ('products', ?)") or die('Ошибка добавления юрл');
	$stmt->bind_param("s", $url) or die('Ошибка юрл b');
	$stmt->execute() or die('Ошибка e');
	$stmt->close();
}

}
 
 
?>
