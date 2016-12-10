<?php
 
class EditCategory extends Core{

function __construct(){}

//получаем категорию
static function getContent($getid){
	global $mysqli;
	
	//подготовленный запрос
	$stmt = $mysqli->prepare("SELECT id, title, keywords, meta_desc, description, url, img_url, date_create FROM categories WHERE id = ?") or die('Ошибка p');
	$stmt->bind_param("s", $getid) or die('Ошибка b');
	$stmt->execute() or die('Ошибка e');
	$result = $stmt->get_result() or die('Ошибка r');
	$stmt->close();
	
	$category = $result->fetch_assoc();
	return $category;
}

//заносим в базу отредактированную категорию
static function editContent($id, $title, $keywords, $meta_desc, $description, $url, $img_url, $date_create, $oldurl){
	global $mysqli;
	
	//проверяем нет ли одинакового юрл, изменяем его
	if($url != $oldurl){
		$url = self::checkUri($url);
	}
	
	//подготовленный запрос
	$stmt = $mysqli->prepare("UPDATE categories SET title = ?, keywords = ?, meta_desc = ?, description = ?, url = ?, img_url = ?, date_create = ? WHERE id = ?") or die('Ошибка p');
	$stmt->bind_param("sssssssi", $title, $keywords, $meta_desc, $description, $url, $img_url, $date_create, $id) or die('Ошибка b');
	$stmt->execute() or die('Ошибка e');
	$stmt->close();
	
	//добавляем юрл в таблицу с адресами
	$stmt = $mysqli->prepare("UPDATE uri SET uri = ? WHERE uri = ?") or die('Ошибка добавления юрл');
	$stmt->bind_param("ss", $url, $oldurl) or die('Ошибка юрл b');
	$stmt->execute() or die('Ошибка e');
	$stmt->close();


}

}
 
 
?>
