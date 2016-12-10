<?php
 
class EditProduct extends Core{

function __construct(){}

//получаем статью
static function getContent($getid){
	global $mysqli;
	
	//подготовленный запрос
	$stmt = $mysqli->prepare("SELECT id, title, keywords, meta_desc, description, content, url, img_url, date_create, date_update, price, articul, manufacturer, category FROM products WHERE id = ?") or die('Ошибка p');
	$stmt->bind_param("s", $getid) or die('Ошибка b');
	$stmt->execute() or die('Ошибка e');
	$result = $stmt->get_result() or die('Ошибка r');
	$stmt->close();
	
	$article = $result->fetch_assoc();
	return $article;
}

//заносим в базу отредактированную статью
static function editContent($id, $title, $keywords, $meta_desc, $description, $content, $url, $img_url, $date_create, $date_update, $price, $articul, $manufacturer, $category, $oldurl){
	global $mysqli;
	
	//проверяем нет ли одинакового юрл, изменяем его
	if($url != $oldurl){
		$url = self::checkUri($url);
	}
	
	//подготовленный запрос
	$stmt = $mysqli->prepare("UPDATE products SET title = ?, keywords = ?, meta_desc = ?, description = ?, content = ?, url = ?, img_url = ?, date_create = ?, date_update = ?, price = ?, articul = ?, manufacturer = ?, category = ? WHERE id = ?") or die('Ошибка p');
	$stmt->bind_param("sssssssssssssi", $title, $keywords, $meta_desc, $description, $content, $url, $img_url, $date_create, $date_update, $price, $articul, $manufacturer, $category, $id) or die('Ошибка b');
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
