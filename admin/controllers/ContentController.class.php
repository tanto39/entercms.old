<?php
//контроллер блога категории

class ContentController extends Controller{
	
	//подключаем файл представления
	static function route(){

		if($_GET['articles']){
			require "views/articles.php"; //список статей
		}elseif($_GET['editArticle']){
			require "views/editArticle.php"; //редактирование статьи
		}elseif($_GET['addArticle']){
			require "views/addArticle.php"; //добавление статьи
		}elseif($_GET['categories']){
			require "views/categories.php"; //список категорий
		}elseif($_GET['editCategory']){
			require "views/editCategory.php"; //редактирование категории
		}elseif($_GET['addCategory']){
			require "views/addCategory.php"; //добавление категории
		}elseif($_GET['products']){
			require "views/products.php"; //список товаров
		}elseif($_GET['editProduct']){
			require "views/editProduct.php"; //редактировать товар
		}elseif($_GET['addProduct']){
			require "views/addProduct.php"; //добавить товар
		}elseif($_GET['categoriesProduct']){
			require "views/categoriesProduct.php"; //список категорий товаров
		}elseif($_GET['editCategoriesProduct']){
			require "views/editCategoriesProduct.php"; //редактировать категорию товара
		}elseif($_GET['addCategoriesProduct']){
			require "views/addCategoriesProduct.php"; //добавить категорию товара
		}elseif($_GET['menus']){
			require "views/menus.php"; //список меню
		}elseif($_GET['editMenu']){
			require "views/editMenu.php"; //редактировать меню
		}elseif($_GET['addMenu']){
			require "views/addMenu.php"; //добавить меню
		}
		
	}	//end route
	
	//получаем выборку из БД
	static function getView(){
		if($_GET['articles']){
			return Articles::getContent(); //список статей
		}elseif($_GET['editArticle']){
			return EditArticle::getContent($_GET['editArticle']); //редактируем статью
		}elseif($_GET['categories']){
			return Categories::getContent($_GET['categories']); //список категорий
		}elseif($_GET['editCategory']){
			return EditCategory::getContent($_GET['editCategory']); //редактируем категорию
		}
		
	}	//end getView
	
	//получаем категории
	static function getCategories(){
		return EditArticle::getCategories();
	}
	
	//заносим статью в базу при редактировании
	static function editArticle($content, $id, $title, $keywords, $meta_desc, $date_create, $img_url, $author, $category, $description, $url, $oldurl){
		EditArticle::editContent($content, $id, $title, $keywords, $meta_desc, $date_create, $img_url, $author, $category, $description, $url, $oldurl);
	}
	
	//добавляем статью в базу при создании
	static function addArticle($content, $title, $keywords, $meta_desc, $date_create, $img_url, $author, $category, $description, $url){
		AddArticle::addContent($content, $title, $keywords, $meta_desc, $date_create, $img_url, $author, $category, $description, $url);
	}
	
	//заносим категорию в базу при редактировании
	static function editCategory($id, $title, $keywords, $meta_desc, $description, $url, $img_url, $date_create, $oldurl){
		EditCategory::editContent($id, $title, $keywords, $meta_desc, $description, $url, $img_url, $date_create, $oldurl);
	}
	
	//заносим категорию в базу при редактировании
	static function addCategory($title, $keywords, $meta_desc, $description, $url, $img_url, $date_create){
		AddCategory::addContent($title, $keywords, $meta_desc, $description, $url, $img_url, $date_create);
	}
	
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
