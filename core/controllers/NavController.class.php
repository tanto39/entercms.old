<?php

class NavController extends Controller{

	function __construct(){}
	
	static public $limit = 3; //предел выводимых на странице материалов
	static public $count_rows; //общее количество материалов
	
	//подключаем файл вывода пагинации
	function getView($limit, $count_rows){
		self::$limit = $limit; //устанавливаем предел выводимых на странице материалов
		self::$count_rows = $count_rows; //получаем количество материалов
		require_once "core/views/pagination.php";
	}
	
	//получаем массив с ссылками в постраничной навигации, $pages - количество страниц
	function getNav($pages){
		if($_GET['p']){
			$nPage = $_GET['p']; //текущая страница
		}else{$nPage = 1;}
		global $uri;
		$nav = []; //массив со ссылками
		
		if($nPage > 1){
			$nav['first'] = "<a href = '$uri'><<</a>";
			$nav['back'] = "<a href = '$uri?p=".($nPage-1)."'><</a>";
		}
		if(($nPage-2) > 0){
			$nav['page2left'] = "<a href = '$uri?p=".($nPage-2)."'>".($nPage-2)."</a>";
		}
		if(($nPage-1) > 0){
			$nav['page1left'] = "<a href = '$uri?p=".($nPage-1)."'>".($nPage-1)."</a>";
		}
		$nav['page'] = "<a class='active' href = '$uri?p=".$nPage."'>".$nPage."</a>";
		if($nPage < $pages){
			$nav['page1right'] = "<a href = '$uri?p=".($nPage+1)."'>".($nPage+1)."</a>";
		}
		if(($pages - $nPage) > 1){
			$nav['page2right'] = "<a href = '$uri?p=".($nPage+2)."'>".($nPage+2)."</a>";
		}
		if($nPage < $pages){
			$nav['forward'] = "<a href = '$uri?p=".($nPage+1)."'>></a>";
			$nav['last'] = "<a href = '$uri?p=".$pages."'>>></a>";
		}
		
		return $nav;
	}

}
	
	
?>
