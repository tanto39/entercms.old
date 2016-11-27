<?php
//контроллер блога категории

class ContentController extends Controller{
	
	//подключаем файл представления
	static function route($table){
		global $uri;
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
		
	}	//end route
	
	//получаем выборку из БД
	static function getView($table){
		global $uri;
		if($table == "categories"){
			return(Category::getContent($uri));
		}elseif($table == "articles"){
			return(Article::getContent($uri));
		}elseif($table == "productcat"){
			return(ProductCategory::getContent($uri));
		}elseif($table == "products"){
			return(Product::getContent($uri));
		}elseif($table == "catalog"){
			return(Catalog::getContent($uri));
		}
		
	}	//end getView
	
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
