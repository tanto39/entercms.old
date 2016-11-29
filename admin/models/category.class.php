<?php
 
class Category extends Core{

function __construct(){}

static function getContent($uri){
	global $mysqli;
	
	//получаем информацию о категории и статьи, входящие в эту категорию, формируем из этого массив $category
	//подготовленные запросы
	$stmt = $mysqli->prepare("SELECT id, title, keywords, meta_desc, description, img_url FROM categories WHERE url = ?") or die('ошибка s');
	$stmt->bind_param("s", $uri) or die('ошибка b');
	$stmt->execute() or die('ошибка e');
	$catInfoResult = $stmt->get_result() or die('ошибка r');
	$stmt->close();
	$catInfo = $catInfoResult->fetch_assoc();
	
	
	$stmt = $mysqli->prepare("SELECT title, description, date_create, date_update, img_url, url FROM articles WHERE cat_id = ?") or die('ошибка s');
	$stmt->bind_param('s', $catInfo['id']) or die('ошибка b');
	$stmt->execute() or die('ошибка e');
	$itemResult = $stmt->get_result() or die('ошибка r');
	$stmt->close();
	$items = $itemResult->fetch_all(MYSQLI_ASSOC);
	
	$category['catInfo'] = $catInfo;//заносим информацию о категории
	$category['items'] = $items;//заносим статьи
	return $category;
	
	
	//обычные запросы
	/*--$catInfoResult = $mysqli->query("SELECT id, title, keywords, meta_desc, description, img_url FROM categories WHERE url = '$uri'");
	$catInfo = $catInfoResult->fetch_assoc();
	$itemResult = $mysqli->query("SELECT title, description, date_create, date_update, img_url, url FROM articles WHERE cat_id = '$catInfo[id]'");
	$items = $itemResult->fetch_all(MYSQLI_ASSOC);
	$category['catInfo'] = $catInfo;//заносим информацию о категории
	$category['items'] = $items;//заносим статьи
	return $category;--*/
}


}
 
 
?>
