<?php
 
class AddArticle extends Core{

function __construct(){}

//заносим в базу статью
static function addContent($content, $title, $keywords, $meta_desc, $date_create, $img_url, $author, $category, $description, $url){
	global $mysqli;

	//проверяем нет ли одинакового юрл, изменяем его
	$url = self::checkUri($url);
	
	//подготовленный запрос
	$stmt = $mysqli->prepare("INSERT INTO articles (content, title, keywords, meta_desc, date_create, date_update, img_url, author, category, description, url) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? ) ") or die('Ошибка добавления материала');
	$stmt->bind_param("sssssssssss", $content, $title, $keywords, $meta_desc, $date_create, $date_create, $img_url, $author, $category, $description, $url) or die('Ошибка b');
	$stmt->execute() or die('Ошибка e');
	$stmt->close();
	
	//добавляем юрл в таблицу с адресами
	$stmt = $mysqli->prepare("INSERT INTO uri (table_name, uri) VALUES ('articles', ?)") or die('Ошибка добавления юрл');
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
