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
		}
		
	}	//end route
	
	//получаем выборку из БД
	static function getView($table){
		global $uri;
		if($table == "categories"){
			return(Category::getContent($uri));
		}elseif($table == "articles"){
			return(Article::getContent($uri));
		}
		
	}	//end getView
	
}
	
	
?>
