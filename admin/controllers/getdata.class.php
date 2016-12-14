<?php
//контроллер редактора

class GetData extends Controller{
	function __construct(){}

	//определяем активную категорию, заносим ее в куку для дальнейшего использования
	public static function activeCategory(){
		if(isset($_POST['selectcat'])){
			setcookie('activeCategory', Core::toString($_POST['selectcat']), time()+(1000*60*60*24*30));
		}
	}
	//определяем активную категорию товара, заносим ее в куку для дальнейшего использования
	public static function activeCategoryProduct(){
		if(isset($_POST['selectcatproduct'])){
			setcookie('activeCategoryProduct', Core::toString($_POST['selectcatproduct']), time()+(1000*60*60*24*30));
		}
	}
	
	
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
						EditArticle::editContent($_POST['content'], 
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
						AddArticle::addContent($_POST['add-content'],
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
						EditCategory::editContent($_POST['cat-id'], 
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
		
		//добавление категории
		if(isset($_POST['addcat-title']) && 
			isset($_POST['addcat-keywords']) && 
			isset($_POST['addcat-meta_desc']) && 
			isset($_POST['addcat-description']) && 
			isset($_POST['addcat-url']) && 
			isset($_POST['addcat-img_url']) && 
			isset($_POST['addcat-date_create'])){
						AddCategory::addContent($_POST['addcat-title'], 
												$_POST['addcat-keywords'], 
												$_POST['addcat-meta_desc'], 
												$_POST['addcat-description'], 
												$_POST['addcat-url'], 
												$_POST['addcat-img_url'], 
												$_POST['addcat-date_create']);
			echo "<div style='padding: 20px; margin: 100px auto; width: 300px; font-size: 24px; text-align: center; border: 2px solid #000000; background: #216161; color: #ffffff;'>Категория добавлена</div>";

		}//end if
	
	//редактирование товара
	if(isset($_POST['prod-id']) && 
			isset($_POST['prod-title']) && 
			isset($_POST['prod-keywords']) && 
			isset($_POST['prod-meta_desc']) && 
			isset($_POST['prod-description']) && 
			isset($_POST['prod-content']) && 
			isset($_POST['prod-url']) && 
			isset($_POST['prod-img_url']) && 
			isset($_POST['prod-date_create']) && 
			isset($_POST['prod-date_update']) && 
			isset($_POST['prod-price']) && 
			isset($_POST['prod-articul']) && 
			isset($_POST['prod-manufacturer']) && 
			isset($_POST['prod-category']) && 
			isset($_POST['prod-oldurl'])){
						EditProduct::editContent($_POST['prod-id'], 
												$_POST['prod-title'], 
												$_POST['prod-keywords'], 
												$_POST['prod-meta_desc'], 
												$_POST['prod-description'], 
												$_POST['prod-content'], 
												$_POST['prod-url'], 
												$_POST['prod-img_url'], 
												$_POST['prod-date_create'], 
												$_POST['prod-date_update'], 
												$_POST['prod-price'], 
												$_POST['prod-articul'], 
												$_POST['prod-manufacturer'], 
												$_POST['prod-category'], 
												$_POST['prod-oldurl']);
			echo "<div style='padding: 20px; margin: 100px auto; width: 300px; font-size: 24px; text-align: center; border: 2px solid #000000; background: #216161; color: #ffffff;'>Товар сохранен</div>";

		}//end if
		
		//добавление товара
	if(isset($_POST['addprod-title']) && 
			isset($_POST['addprod-keywords']) && 
			isset($_POST['addprod-meta_desc']) && 
			isset($_POST['addprod-description']) && 
			isset($_POST['addprod-content']) && 
			isset($_POST['addprod-url']) && 
			isset($_POST['addprod-img_url']) && 
			isset($_POST['addprod-date_create']) && 
			isset($_POST['addprod-date_update']) && 
			isset($_POST['addprod-price']) && 
			isset($_POST['addprod-articul']) && 
			isset($_POST['addprod-manufacturer']) && 
			isset($_POST['addprod-category'])){
						AddProduct::addContent($_POST['addprod-title'], 
												$_POST['addprod-keywords'], 
												$_POST['addprod-meta_desc'], 
												$_POST['addprod-description'], 
												$_POST['addprod-content'], 
												$_POST['addprod-url'], 
												$_POST['addprod-img_url'], 
												$_POST['addprod-date_create'], 
												$_POST['addprod-date_update'], 
												$_POST['addprod-price'], 
												$_POST['addprod-articul'], 
												$_POST['addprod-manufacturer'], 
												$_POST['addprod-category']);
			echo "<div style='padding: 20px; margin: 100px auto; width: 300px; font-size: 24px; text-align: center; border: 2px solid #000000; background: #216161; color: #ffffff;'>Товар добавлен</div>";

		}//end if
		
		//удаление статьи или товара
		if(isset($_POST['delete-id']) && isset($_POST['delete-type'])){
			 ItemDelete::deleteContent($_POST['delete-id'], $_POST['delete-type']);
			echo "<div style='padding: 20px; margin: 100px auto; width: 300px; font-size: 24px; text-align: center; border: 2px solid #000000; background: #216161; color: #ffffff;'>Удалено</div>";

		}//end if
		
	}//end setData
		
		
}
	
	
?>
