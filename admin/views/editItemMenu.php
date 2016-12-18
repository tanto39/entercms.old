<?php 
	$itemMenu = View::$getView; //получаем пункт меню
	$menus = View::$getMenu; //получаем меню
	$typesMenu = View::$getTypeMenu; //получаем меню
	$parents = View::$getParentMenu; //получаем родительские пункты меню
	$elements = View::$getElement; //получаем элементы
	
/* 	Расшифровка массива, возвращаемого из базы

	$itemMenu[$i]['id'] - id пункта меню
	$itemMenu[$i]['name'] - название меню
	$itemMenu[$i]['title'] - заголовок пункта меню
	$itemMenu[$i]['type'] - тип пункта меню
	$itemMenu[$i]['parent'] - родительский пункт меню
	$itemMenu[$i]['sort'] - позиция сортировки
	$itemMenu[$i]['date_create'] - дата создания
	$itemMenu[$i]['element'] - id элемента, на который ссылается пункт меню
	$itemMenu[$i]['element_name'] - название элемента, на который ссылается пункт меню
	
	пример: $itemMenu[0]['title']

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
	<form id="get-type-menu" method="POST" action="index.php">
	<input type="hidden" name="get-type-menu-id" value="<?php echo $itemMenu['id'];?>" />
		<label>Тип меню:</label>
		<select name="get-type-menu" />
		<?php foreach($typesMenu as $typeMenu) : ?>
			<?php if($typeMenu['title'] == $itemMenu['type']) : ?>
				<option selected value="<?php echo $typeMenu['title'];?>"><?php echo $typeMenu['title'];?></option>
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
		<input type="hidden" id="itemmenu-type" name="itemmenu-type" value="<?php echo $itemMenu['type'];?>" />
		<input type="hidden" id="itemmenu-element_name" name="itemmenu-element_name" value="<?php echo $itemMenu['element_name'];?>" />
		<input type="hidden" name="itemmenu-element" id="itemmenu-element" value="<?php echo $itemMenu['element'];?>" />
		<input type="hidden" name="itemmenu-id" value="<?php echo $itemMenu['id'];?>" />

		<label>Элемент пункта меню:</label>

		<select id="itemmenu-element_name_change" name="itemmenu-element_name_change" />
		<?php foreach($elements as $element) : ?>
			<?php if($itemMenu['element_name'] == $element['title']) : ?>
				<option selected value="<?php echo $element['id'];?>"><?php echo $element['title'];?></option>
			<?php else : ?>
				<option value="<?php echo $element['id'];?>"><?php echo $element['title'];?></option>
			<?php endif; ?>
		<?php endforeach;?>
		</select>
		
		<label>Название пункта меню:</label>
		<input type="text" name="itemmenu-title" value="<?php echo $itemMenu['title'];?>" />
		
		<label>Родительский пункт меню:</label>
		<select name="itemmenu-parent" />
		<option value="first">Без родителя</option>
		<?php foreach($parents as $parent) : ?>
			<?php if($itemMenu['parent'] == $parent['title']) : ?>
				<option selected value="<?php echo $parent['title'];?>"><?php echo $parent['title'];?></option>
			<?php else : ?>
				<option value="<?php echo $parent['title'];?>"><?php echo $parent['title'];?></option>
			<?php endif; ?>
		<?php endforeach;?>
		</select>
		
		<label>Позиция сортировки:</label>
		<input type="text" name="itemmenu-sort" value="<?php echo $itemMenu['sort'];?>" />
	
		<label>Дата создания:</label>
		<input type="text" name="itemmenu-date_create" value="<?php echo $itemMenu['date_create'];?>" />
		
		<label>Меню:</label>
		<select name="itemmenu-name" />
		<?php foreach($menus as $menu) : ?>
			<?php if($itemMenu['name'] == $menu['name']) : ?>
				<option selected value="<?php echo $menu['name'];?>"><?php echo $menu['name'];?></option>
			<?php else : ?>
				<option value="<?php echo $menu['name'];?>"><?php echo $menu['name'];?></option>
			<?php endif; ?>
		<?php endforeach;?>
		</select>
		
		<input type="submit" value="Сохранить" class="save" />
	</form>
	<!--<div class="after-save">Загрузка...</div>-->	
	
</div>
