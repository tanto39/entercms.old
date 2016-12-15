<?php
//контроллер блога категории

class ContentController extends Controller{
	//подключаем файл представления
	static function route(){

		if($_GET['articles']){
			View::$getCategories = Core::getCategories(); //получаем список категорий
			View::$getView = Articles::getContent($_COOKIE['activeCategory']); //список статей из БД
			require "views/articles.php"; //список статей
		}elseif($_GET['editArticle']){
			View::$getView = EditArticle::getContent($_GET['editArticle']); //получаем выборку для редактирования статьи
			View::$getCategories = Core::getCategories(); //получаем список категорий
			require "views/editArticle.php"; //редактирование статьи
		}elseif($_GET['addArticle']){
			View::$getCategories = Core::getCategories(); //получаем список категорий
			require "views/addArticle.php"; //добавление статьи
		}elseif($_GET['categories']){
			View::$getView = Categories::getContent($_GET['categories']); //список категорий из БД
			require "views/categories.php"; //список категорий
		}elseif($_GET['editCategory']){
			View::$getView = EditCategory::getContent($_GET['editCategory']); //получаем выборку для редактирования категории
			require "views/editCategory.php"; //редактирование категории
		}elseif($_GET['addCategory']){
			require "views/addCategory.php"; //добавление категории
		}elseif($_GET['products']){
			View::$getCategories = Core::getCategoriesProduct(); //получаем список категорий
			View::$getView = Products::getContent($_COOKIE['activeCategoryProduct']); //список статей из БД
			require "views/products.php"; //список товаров
		}elseif($_GET['editProduct']){
			View::$getView = EditProduct::getContent($_GET['editProduct']); //получаем выборку для редактирования статьи
			View::$getCategories = Core::getCategoriesProduct(); //получаем список категорий
			require "views/editProduct.php"; //редактировать товар
		}elseif($_GET['addProduct']){
			View::$getCategories = Core::getCategoriesProduct(); //получаем список категорий
			require "views/addProduct.php"; //добавить товар
		}elseif($_GET['categoriesProduct']){
			View::$getView = CategoriesProduct::getContent($_GET['categoriesProduct']); //список категорий из БД
			require "views/categoriesProduct.php"; //список категорий товаров
		}elseif($_GET['editCategoriesProduct']){
			View::$getView = EditCategoriesProduct::getContent($_GET['editCategoriesProduct']); //получаем выборку для редактирования категории товаров
			View::$getCategories = Core::getCategoriesProduct(); //получаем список категорий
			require "views/editCategoriesProduct.php"; //редактировать категорию товара
		}elseif($_GET['addCategoriesProduct']){
			View::$getCategories = Core::getCategoriesProduct(); //получаем список категорий
			require "views/addCategoriesProduct.php"; //добавить категорию товара
		}elseif($_GET['menus']){
			require "views/menus.php"; //список меню
		}elseif($_GET['editMenu']){
			require "views/editMenu.php"; //редактировать меню
		}elseif($_GET['addMenu']){
			require "views/addMenu.php"; //добавить меню
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
