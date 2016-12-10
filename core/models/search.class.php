<?php
 
class Search extends Core{
	
function __construct(){}

//получаем материал, $select - что искать, материалы (article), категории (category), товары (product)
static function getContent(){
	global $mysqli;
	$select = 'article'; //значение радиокнопки выбора категории поиска по умолчанию - статьи
	$query = ""; //переменная с post запросом
	
	//массив с выборкой по статьям, категориям
	$search = [];
	
	//фильтруем поисковый запрос
	if(isset($_POST['query']) && !empty($_POST['query'])){
		$query = Core::toString($_POST['query']);
	}else{
		exit('ошибка поиска');
	}
	
	//фильтруем селектор поиска по материалу или категории
	if(isset($_POST['select']) && !empty($_POST['select'])){
		$select = Core::toString($_POST['select']);
	}

	//делаем шаблон
	$query = '%'.$query.'%';
	
	if($select == 'article'){
		//поиск по материалам
		//подготовленный запрос
		$stmt = $mysqli->prepare("SELECT title, description, url FROM articles WHERE title LIKE ? OR content LIKE ?") or die('Ошибка p');
		$stmt->bind_param('ss', $query, $query) or die('Ошибка b');
		$stmt->execute() or die('Ошибка e');
		$resultArticles = $stmt->get_result() or die('Ошибка r');
		$stmt->close();
		
		$search = $resultArticles->fetch_all(MYSQLI_ASSOC);		
	}
	
	if($select == 'category'){
		//поиск по категориям
		//подготовленный запрос
		$stmt = $mysqli->prepare("SELECT title, description, url FROM categories WHERE title LIKE ? OR description LIKE ?") or die('Ошибка p');
		$stmt->bind_param('ss', $query, $query) or die('Ошибка b');
		$stmt->execute() or die('Ошибка e');
		$resultCategories = $stmt->get_result() or die('Ошибка r');
		$stmt->close();
		
		$search = $resultCategories->fetch_all(MYSQLI_ASSOC);		
	}

	if($select == 'product'){
		//поиск по товарам
		//подготовленный запрос
		$stmt = $mysqli->prepare("SELECT title, description, url FROM products WHERE title LIKE ? OR content LIKE ? OR articul LIKE ?") or die('Ошибка p');
		$stmt->bind_param('sss', $query, $query, $query) or die('Ошибка b');
		$stmt->execute() or die('Ошибка e');
		$resultArticles = $stmt->get_result() or die('Ошибка r');
		$stmt->close();
		
		$search = $resultArticles->fetch_all(MYSQLI_ASSOC);		
	}
	return $search;
}
	
}
 
 
?>
