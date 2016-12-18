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
	//определяем активное меню, заносим ее в куку для дальнейшего использования
	public static function activeMenu(){
		if(isset($_POST['selectmenu'])){
			setcookie('activeMenu', Core::toString($_POST['selectmenu']), time()+(1000*60*60*24*30));
		}
	}
	
	//определяем активный тип меню при добавлении пункта меню, заносим в куку для дальнейшего использования
	public static function activeTypeMenu(){
		if(isset($_POST['add-get-type-menu'])){
			setcookie('add-get-type-menu', Core::toString($_POST['add-get-type-menu']), time()+(1000*60*60*24*30));
		}
	}
	
	//изменяем тип меню
	public static function setTypeMenu(){
		if(isset($_POST['get-type-menu']) && isset($_POST['get-type-menu-id'])){
			EditItemMenu::setTypeMenu($_POST['get-type-menu'], $_POST['get-type-menu-id']);
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
		
		//редактирование категории товара
		if(isset($_POST['prodcat-id']) && 
			isset($_POST['prodcat-title']) && 
			isset($_POST['prodcat-keywords']) && 
			isset($_POST['prodcat-meta_desc']) && 
			isset($_POST['prodcat-description']) && 
			isset($_POST['prodcat-url']) && 
			isset($_POST['prodcat-img_url']) && 
			isset($_POST['prodcat-parent']) && 
			isset($_POST['prodcat-date_create']) && 
			isset($_POST['prodcat-oldurl'])){
						EditCategoriesProduct::editContent($_POST['prodcat-id'], 
												$_POST['prodcat-title'], 
												$_POST['prodcat-keywords'], 
												$_POST['prodcat-meta_desc'], 
												$_POST['prodcat-description'], 
												$_POST['prodcat-url'], 
												$_POST['prodcat-img_url'], 
												$_POST['prodcat-parent'], 
												$_POST['prodcat-date_create'], 
												$_POST['prodcat-oldurl']);
			echo "<div style='padding: 20px; margin: 100px auto; width: 300px; font-size: 24px; text-align: center; border: 2px solid #000000; background: #216161; color: #ffffff;'>Категория сохранена</div>";

		}//end if
		
		//добавление категории товара
		if(isset($_POST['addprodcat-title']) && 
			isset($_POST['addprodcat-keywords']) && 
			isset($_POST['addprodcat-meta_desc']) && 
			isset($_POST['addprodcat-description']) && 
			isset($_POST['addprodcat-url']) && 
			isset($_POST['addprodcat-img_url']) && 
			isset($_POST['addprodcat-parent']) && 
			isset($_POST['addprodcat-date_create'])){
						AddCategoriesProduct::addContent($_POST['addprodcat-title'], 
												$_POST['addprodcat-keywords'], 
												$_POST['addprodcat-meta_desc'], 
												$_POST['addprodcat-description'], 
												$_POST['addprodcat-url'], 
												$_POST['addprodcat-img_url'], 
												$_POST['addprodcat-parent'], 
												$_POST['addprodcat-date_create']);
			echo "<div style='padding: 20px; margin: 100px auto; width: 300px; font-size: 24px; text-align: center; border: 2px solid #000000; background: #216161; color: #ffffff;'>Категория добавлена</div>";

		}//end if
		
		//редактирование пункта меню
		if(isset($_POST['itemmenu-id']) && 
			isset($_POST['itemmenu-name']) && 
			isset($_POST['itemmenu-title']) && 
			isset($_POST['itemmenu-type']) && 
			isset($_POST['itemmenu-parent']) && 
			isset($_POST['itemmenu-sort']) && 
			isset($_POST['itemmenu-date_create']) && 
			isset($_POST['itemmenu-element']) && 
			isset($_POST['itemmenu-element_name'])){
						EditItemMenu::editContent($_POST['itemmenu-id'], 
												$_POST['itemmenu-name'], 
												$_POST['itemmenu-title'], 
												$_POST['itemmenu-type'], 
												$_POST['itemmenu-parent'], 
												$_POST['itemmenu-sort'], 
												$_POST['itemmenu-date_create'], 
												$_POST['itemmenu-element'], 
												$_POST['itemmenu-element_name']);
			echo "<div style='padding: 20px; margin: 100px auto; width: 300px; font-size: 24px; text-align: center; border: 2px solid #000000; background: #216161; color: #ffffff;'>Пункт меню сохранен</div>";

		}//end if
		
		//добавление пункта меню
		if(isset($_POST['additemmenu-name']) && 
			isset($_POST['additemmenu-title']) && 
			isset($_POST['additemmenu-type']) && 
			isset($_POST['additemmenu-parent']) && 
			isset($_POST['additemmenu-sort']) && 
			isset($_POST['additemmenu-date_create']) && 
			isset($_POST['additemmenu-element']) && 
			isset($_POST['additemmenu-element_name'])){
						AddItemMenu::addContent($_POST['additemmenu-name'], 
												$_POST['additemmenu-title'], 
												$_POST['additemmenu-type'], 
												$_POST['additemmenu-parent'], 
												$_POST['additemmenu-sort'], 
												$_POST['additemmenu-date_create'], 
												$_POST['additemmenu-element'], 
												$_POST['additemmenu-element_name']);
			echo "<div style='padding: 20px; margin: 100px auto; width: 300px; font-size: 24px; text-align: center; border: 2px solid #000000; background: #216161; color: #ffffff;'>Пункт меню добавлен</div>";

		}//end if
		
		//добавление меню
		if(isset($_POST['addmenu-name'])){
			AddMenu::addContent($_POST['addmenu-name']);
			echo "<div style='padding: 20px; margin: 100px auto; width: 300px; font-size: 24px; text-align: center; border: 2px solid #000000; background: #216161; color: #ffffff;'>Меню добавлено</div>";

		}//end if
		
		//редактирование меню
		if(isset($_POST['editmenu-name']) && isset($_POST['editmenu-id'])){
			EditMenu::editContent($_POST['editmenu-name'], $_POST['editmenu-id']);
			echo "<div style='padding: 20px; margin: 100px auto; width: 300px; font-size: 24px; text-align: center; border: 2px solid #000000; background: #216161; color: #ffffff;'>Меню изменено</div>";

		}//end if
		
		//удаление статьи или товара или меню
		if(isset($_POST['delete-id']) && isset($_POST['delete-type'])){
			 ItemDelete::deleteContent($_POST['delete-id'], $_POST['delete-type']);
			echo "<div style='padding: 20px; margin: 100px auto; width: 300px; font-size: 24px; text-align: center; border: 2px solid #000000; background: #216161; color: #ffffff;'>Удалено</div>";

		}//end if
		
	}//end setData
		
		
}
	
	
?>
