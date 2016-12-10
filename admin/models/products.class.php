<?php
 
class Products extends Core{

function __construct(){}

static function getContent($activeCategoryProduct = '%'){
	global $mysqli;
	if(!$_COOKIE['activeCategoryProduct']){
		$activeCategoryProduct = '%';
	}
	//получаем товары
	//подготовленные запросы
		$stmt = $mysqli->prepare("SELECT id, title, category, articul FROM products WHERE category LIKE ? ORDER BY date_create") or die('ошибка s');
		$stmt->bind_param("s", $activeCategoryProduct) or die('ошибка b');
		$stmt->execute() or die('ошибка e');
		$result = $stmt->get_result() or die('ошибка r');
		$stmt->close();
		$products = $result->fetch_all(MYSQLI_ASSOC);

	return $products;

}


}
 
 
?>
