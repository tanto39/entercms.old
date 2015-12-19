<?php
//контроллер блога категории

class ContentController extends Controller{
	
	//подключаем файл представления
	static function route($table){
		global $uri;
		if(!isset($_POST['query'])){//если нет поискового запроса, подключаем файлы представления
			if($table == "categories"){
				require "core/views/category.php";
			}elseif($table == "articles"){
				require "core/views/article.php";
			}elseif($table == "productcat"){
				require "core/views/productCategory.php";
			}elseif($table == "products"){
				require "core/views/product.php";
			}elseif($table == "catalog"){
				require "core/views/catalog.php";
			}
		}else{
			require "core/views/search.php"; //подключаем представление поиска
		}
	}	//end route
	
	//получаем выборку
	static function getView($table){
		global $uri;
		if(!isset($_POST['query'])){//если нет поискового запроса, получаем выборку в зависимости от юри
			if($table == "categories"){
				View::$getView = Category::getContent($uri); //получаем выборку из БД, путем занесения в статическое свойства класса представления выборки
			}elseif($table == "articles"){
				View::$getView = Article::getContent($uri);
			}elseif($table == "productcat"){
				View::$getView = ProductCategory::getContent($uri);
			}elseif($table == "products"){
				View::$getView = Product::getContent($uri);
			}elseif($table == "catalog"){
				View::$getView = Catalog::getContent($uri);
			}
		}else{
			View::$getSearch = Search::getContent(); //а если есть поисковый запрос получаем выборку поиска
		}
	}//end getView
	
	//сортировка
	static function setSort($table){
		global $uri;
			if($table == "productcat"){
				$sortBy = Controller::toString($_POST['sort']); //получаем сортировку 
					switch ($sortBy){//задаем значения для сортировки при подстановке в запрос БД
					case 'priceUp' : ProductCategory::$sort = 'price'; break;
					case 'priceDown' : ProductCategory::$sort = 'price DESC'; break;
					case 'manufacturer' : ProductCategory::$sort = 'manufacturer'; break;
					default: ProductCategory::$sort = 'price';
				}
				echo ProductCategory::$sort;
			}
	}//end setSort
	
}
	
	
?>
