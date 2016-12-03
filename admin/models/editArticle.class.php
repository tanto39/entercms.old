<?php
 
class EditArticle extends Core{

function __construct(){}

//получаем статью
static function getContent($getid){
	global $mysqli;
	
	//подготовленный запрос
	$stmt = $mysqli->prepare("SELECT id, title, content, keywords, meta_desc, date_create, date_update, img_url, author, category FROM articles WHERE id = ?") or die('Ошибка p');
	$stmt->bind_param("s", $getid) or die('Ошибка b');
	$stmt->execute() or die('Ошибка e');
	$result = $stmt->get_result() or die('Ошибка r');
	$stmt->close();
	
	$article = $result->fetch_assoc();
	return $article;
}

//заносим в базу отредактированную статью
static function editContent($content, $id){
	global $mysqli;
	//подготовленный запрос
	$stmt = $mysqli->prepare("UPDATE articles SET content = ? WHERE id = ?") or die('Ошибка p');
	$stmt->bind_param("ss", $content, $id) or die('Ошибка b');
	$stmt->execute() or die('Ошибка e');
	$stmt->close();

}

}
 
 
?>
