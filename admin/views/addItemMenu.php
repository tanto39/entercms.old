<?php 
	$menus = View::$getMenu; //получаем меню
	$typesMenu = View::$getTypeMenu; //получаем типы меню
	$parents = View::$getParentMenu; //получаем родительские пункты меню
	$elements = View::$getElement; //получаем элементы
	
/* 	Расшифровка массива, возвращаемого из базы


	$menus[$i]['name'] - заголовок меню
	$menus[$i]['id'] - id меню
	
	$typesMenu[0]['title'] - название типа меню
	$typesMenu[0]['tablename'] - таблица соответствующая типу меню
	
	$elements[0]['id'] - id элемента
	$elements[0]['title'] - название элемента
*/
?>



<div class="edit">
<!--выбор типа меню-->
<div class="category-list">
	<form id="add-get-type-menu" method="POST" action="index.php">
		<label>Тип меню:</label>
		<select name="add-get-type-menu" />
		<?php foreach($typesMenu as $typeMenu) : ?>
			<?php if($_COOKIE['add-get-type-menu'] == $typeMenu['title']) : ?>
				<option selected value="<?php echo $_COOKIE['add-get-type-menu'];?>"><?php echo $_COOKIE['add-get-type-menu'];?></option>
			<?php else : ?>
				<option value="<?php echo $typeMenu['title'];?>"><?php echo $typeMenu['title'];?></option>
			<?php endif; ?>
		<?php endforeach;?>
		</select>
		<input type="submit" value="Выбрать" class="save">
	</form>
</div>

<!--вывод пункта меню-->
	<form id="get-data-form" method="POST" action="index.php">
		<input type="hidden" id="additemmenu-type" name="additemmenu-type" value="<?php if($_COOKIE['add-get-type-menu']){echo $_COOKIE['add-get-type-menu'];}?>" />
		<input type="hidden" id="additemmenu-element_name" name="additemmenu-element_name"  />
		<input type="hidden" name="additemmenu-element" id="additemmenu-element"  />

		<label>Элемент пункта меню:</label>

		<select id="add-itemmenu-element_name_change" name="add-itemmenu-element_name_change" />
		<?php foreach($elements as $element) : ?>
				<option value="<?php echo $element['id'];?>"><?php echo $element['title'];?></option>
		<?php endforeach;?>
		</select>
		
		<label>Название пункта меню:</label>
		<input type="text" name="additemmenu-title" />
		
		<label>Родительский пункт меню:</label>
		<select name="additemmenu-parent" />
		<option value="first">Без родителя</option>
		<?php foreach($parents as $parent) : ?>
				<option value="<?php echo $parent['title'];?>"><?php echo $parent['title'];?></option>
		<?php endforeach;?>
		</select>
		
		<label>Позиция сортировки:</label>
		<input type="text" name="additemmenu-sort" />
	
		<label>Дата создания:</label>
		<input type="text" name="additemmenu-date_create" />
		
		<label>Меню:</label>
		<select name="additemmenu-name" />
		<?php foreach($menus as $menu) : ?>
				<option value="<?php echo $menu['name'];?>"><?php echo $menu['name'];?></option>
		<?php endforeach;?>
		</select>
		
		<input type="submit" value="Сохранить" class="save" />
	</form>
	
</div>
