<?php
 
class EditArticle extends Core{

function __construct(){}

//получаем статью
static function getContent($getid){
	global $mysqli;
	
	//подготовленный запрос
	$stmt = $mysqli->prepare("SELECT id, title, content, keywords, meta_desc, description, date_create, date_update, img_url, author, category, url FROM articles WHERE id = ?") or die('Ошибка p');
	$stmt->bind_param("s", $getid) or die('Ошибка b');
	$stmt->execute() or die('Ошибка e');
	$result = $stmt->get_result() or die('Ошибка r');
	$stmt->close();
	
	$article = $result->fetch_assoc();
	return $article;
}

//заносим в базу отредактированную статью
static function editContent($content, $id, $title, $keywords, $meta_desc, $date_create, $img_url, $author, $category, $description, $url, $oldurl){
	global $mysqli;
	
	//проверяем нет ли одинакового юрл, изменяем его
	if($url != $oldurl){
		$url = self::checkUri($url);
	}
	
	//подготовленный запрос
	$stmt = $mysqli->prepare("UPDATE articles SET content = ?, title = ?, keywords = ?, meta_desc = ?, date_create = ?, img_url = ?, author = ?, category = ?, description = ?, url = ? WHERE id = ?") or die('Ошибка p');
	$stmt->bind_param("ssssssssssi", $content, $title, $keywords, $meta_desc, $date_create, $img_url, $author, $category, $description, $url, $id) or die('Ошибка b');
	$stmt->execute() or die('Ошибка e');
	$stmt->close();
	
	//добавляем юрл в таблицу с адресами
	$stmt = $mysqli->prepare("UPDATE uri SET uri = ? WHERE uri = ?") or die('Ошибка добавления юрл');
	$stmt->bind_param("ss", $url, $oldurl) or die('Ошибка юрл b');
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
