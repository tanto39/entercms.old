<?php
//контроллер меню

class MetaController extends Controller{

	//получаем выборку из БД, подключаем файл представления
	static function route(){
		require "core/views/meta.php";	
	}	//end route
	

}
	
	
?>
