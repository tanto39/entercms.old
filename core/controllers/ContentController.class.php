<?php
//контроллер блога категории

class ContentController extends Controller{
	
	//подключаем файл представления
	static function route($table){
		global $uri;
		if(!isset($_POST['query'])){//если нет поискового запроса, подключаем файлы представления
			if($table == "categories"){
				View::$getView = Category::getContent($uri); //получаем выборку из БД, путем занесения в статическое свойства класса представления выборки
				require "core/views/category.php";
			}elseif($table == "articles"){
				View::$getView = Article::getContent($uri);
				require "core/views/article.php";
			}elseif($table == "productcat"){
				View::$getView = ProductCategory::getContent($uri);
				require "core/views/productCategory.php";
			}elseif($table == "products"){
				View::$getView = Product::getContent($uri);
				require "core/views/product.php";
			}elseif($table == "catalog"){
				View::$getView = Catalog::getContent($uri);
				require "core/views/catalog.php";
			}
		}else{
			View::$getSearch = Search::getContent(); //а если есть поисковый запрос получаем выборку поиска
			require "core/views/search.php"; //подключаем представление поиска
		}
	}	//end route
	
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
