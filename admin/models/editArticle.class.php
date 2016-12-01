<?php
 
class EditArticle extends Core{

function __construct(){}

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


}
 
 
?>
