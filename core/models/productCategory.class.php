<?php
 
class ProductCategory extends Core{

function __construct(){}
static public $sort = 'price'; //по чему сортировать товар

static function getContent($uri){
	global $mysqli;
	$sort = self::$sort;
	
	if(($_POST['sort']) && (!empty($_POST['sort'])) ){
		$sortBy = Core::toString($_POST['sort']); //получаем сортировку 
		switch ($sortBy){//задаем значения для сортировки при подстановке в запрос БД
			case 'priceUp' : $sort = 'price'; break;
			case 'priceDown' : $sort = 'price DESC'; break;
			case 'manufacturer' : $sort = 'manufacturer'; break;
			default: $sort = 'price';
		}
	}
				
	//получаем информацию о категории и товарах, входящих в эту категорию, формируем из этого массив $category
	//подготовленные запросы
	
	$stmt = $mysqli->prepare("SELECT id, title, keywords, meta_desc, description, img_url FROM productcat WHERE url = ?") or die('ошибка s');
	$stmt->bind_param("s", $uri) or die('ошибка b');
	$stmt->execute() or die('ошибка e');
	$catInfoResult = $stmt->get_result() or die('ошибка r');
	$stmt->close();
	$catInfo = $catInfoResult->fetch_assoc();
	
	
	$stmt = $mysqli->prepare("SELECT title, description, date_create, date_update, img_url, price, url, articul, manufacturer FROM products WHERE category = ? ORDER BY $sort");
	$stmt->bind_param("s", $catInfo['title']) or die('ошибка b');
	$stmt->execute() or die('ошибка e');
	$itemResult = $stmt->get_result() or die('ошибка r');
	$stmt->close();
	$items = $itemResult->fetch_all(MYSQLI_ASSOC);
	
	$category['catInfo'] = $catInfo;//заносим информацию о категории
	$category['items'] = $items;//заносим товары
	return $category;
	
}


}
 
 
?>
