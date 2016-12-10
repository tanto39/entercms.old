
	<?php

		$pages = ceil(NavView::$count_rows/NavView::$limit); //количество ссылок в пагинации	
		$nav = NavView::getNav($pages); //получаем массив со ссылками
	?>
	<div class = "pagination">

	<?php 
		foreach($nav as $page){
			echo $page;
		}
	?>
		
	</div>
			
 

