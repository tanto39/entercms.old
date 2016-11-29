
	<?php

		$pages = ceil(NavController::$count_rows/NavController::$limit); //количество ссылок в пагинации	
		$nav = NavController::getNav($pages); //получаем массив со ссылками
	?>
	<div class = "pagination">

	<?php 
		foreach($nav as $page){
			echo $page;
		}
	?>
		
	</div>
			
 

