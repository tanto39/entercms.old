<?php
//контроллер меню

class SearchController extends Controller{

	//подключаем файл представления
	static function route(){
		require "core/views/search.php";	
	}	//end route
	
	//получаем выборку из БД
	static function getView($query, $select){
		return(Search::getContent($query, $select));
	}	//end getView
	
}
	
	
?>
