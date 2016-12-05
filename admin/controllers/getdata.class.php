<?php
//контроллер редактора

class GetData extends Controller{
	function __construct(){}
	//редактирование статьи
	public static function setData(){
		if(isset($_POST['content']) && 
			isset($_POST['id']) && 
			isset($_POST['title']) && 
			isset($_POST['keywords']) && 
			isset($_POST['meta_desc']) && 
			isset($_POST['date_create']) && 
			isset($_POST['img_url']) && 
			isset($_POST['author']) && 
			isset($_POST['category']) && 
			isset($_POST['description']) && 
			isset($_POST['url']) && 
			isset($_POST['oldurl'])){
				ContentController::editArticle($_POST['content'], 
												$_POST['id'], 
												$_POST['title'], 
												$_POST['keywords'], 
												$_POST['meta_desc'], 
												$_POST['date_create'], 
												$_POST['img_url'], 
												$_POST['author'], 
												$_POST['category'],
												$_POST['description'],
												$_POST['url'], 
												$_POST['oldurl']);
			echo "<div style='padding: 20px; margin: 100px auto; width: 300px; font-size: 24px; text-align: center; border: 2px solid #000000; background: #216161; color: #ffffff;'>Материал сохранен</div>";

		}//end if
		
		//добавление статьи
			if(isset($_POST['add-content']) && 
			isset($_POST['add-title']) && 
			isset($_POST['add-keywords']) && 
			isset($_POST['add-meta_desc']) && 
			isset($_POST['add-date_create']) && 
			isset($_POST['add-img_url']) && 
			isset($_POST['add-author']) && 
			isset($_POST['add-category']) && 
			isset($_POST['add-description']) && 
			isset($_POST['add-url'])){
				ContentController::addArticle($_POST['add-content'],
												$_POST['add-title'], 
												$_POST['add-keywords'], 
												$_POST['add-meta_desc'], 
												$_POST['add-date_create'], 
												$_POST['add-img_url'], 
												$_POST['add-author'], 
												$_POST['add-category'],
												$_POST['add-description'],
												$_POST['add-url']);
			echo "<div style='padding: 20px; margin: 100px auto; width: 300px; font-size: 24px; text-align: center; border: 2px solid #000000; background: #216161; color: #ffffff;'>Материал добавлен</div>";

		}//end if
		
	//редактирование категории
		if(isset($_POST['cat-id']) && 
			isset($_POST['cat-title']) && 
			isset($_POST['cat-keywords']) && 
			isset($_POST['cat-meta_desc']) && 
			isset($_POST['cat-description']) && 
			isset($_POST['cat-url']) && 
			isset($_POST['cat-img_url']) && 
			isset($_POST['cat-date_create']) && 
			isset($_POST['cat-oldurl'])){
				ContentController::editCategory($_POST['cat-id'], 
												$_POST['cat-title'], 
												$_POST['cat-keywords'], 
												$_POST['cat-meta_desc'], 
												$_POST['cat-description'], 
												$_POST['cat-url'], 
												$_POST['cat-img_url'], 
												$_POST['cat-date_create'], 
												$_POST['cat-oldurl']);
			echo "<div style='padding: 20px; margin: 100px auto; width: 300px; font-size: 24px; text-align: center; border: 2px solid #000000; background: #216161; color: #ffffff;'>Категория сохранена</div>";

		}//end if
		
		
		
	}//end setData
		
		
}
	
	
?>
