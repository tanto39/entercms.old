<?php
$itemsMenu = View::$getView; //получаем список меню
$menus = View::$getMenu; //получаем меню

$limit = 5; //количество пунктов меню, выводимых на странице
$max = 0; //счетчик для макс. кол-ва пунктов меню
$count_rows = count($itemsMenu); //общее количество меню, полученных из БД

if($_GET['p']){
	$i = ($_GET['p']-1)*$limit;
}else{
	$i=0;
}

/* Расшифровка массива, возвращаемого из базы
 
$itemsMenu[$i]['id'] - id пункта меню
$itemsMenu[$i]['title'] - заголовок пункта меню
$itemsMenu[$i]['type'] - тип пункта меню
$itemsMenu[$i]['sort'] - позиция сортировки

пример: $itemsMenu[0]['title']

$menus[$i]['name'] - заголовок меню
$menus[$i]['id'] - id меню
*/
?>

<div class="item-list">
<!--список категорий-->
<div class="category-list">
<form method="POST" action="<?php echo $uri; ?>">
<label>Категория:</label>
		<select name="selectmenu" />
		<option value="%">Все меню</option>
		<?php foreach($menus as $menu) : ?>
			<?php if($menu['name'] == $_COOKIE['activeMenu']) : ?>
				<option selected value="<?php echo $menu['name'];?>"><?php echo $menu['name'];?></option>
			<?php else : ?>
				<option value="<?php echo $menu['name'];?>"><?php echo $menu['name'];?></option>
			<?php endif; ?>
		<?php endforeach;?>
		</select>
		<input type="submit" value="Выбрать" class="save" />
</form>

</div>
<!--добавление пункта меню-->
<a class="addArticle" href="/admin?addItemMenu=10">Добавить пункт меню</a>

<!--выводим пункты меню-->
	<?php for($i;;$i++) : ?>
		<?php //останавливаем цикл, если пункта не существует
			if(!$itemsMenu[$i]){
				break;
			}	
		?>
		<div class="edit-item">
			<a href="<?php echo '/admin?editItemMenu='.$itemsMenu[$i]['id']?>"><?php echo $itemsMenu[$i]['title']?></a>
			<div class="item-category"><?php echo $itemsMenu[$i]['type']?></div>
			<div class="item-category">Родитель: <?php echo $itemsMenu[$i]['parent']?></div>
			<div class="item-category">Позиция сортировки: <?php echo $itemsMenu[$i]['sort']?></div>
			<!--удаление пункта меню-->
			<form class="delete" method="POST" action="<?php echo $uri; ?>">
				<input type="hidden" name="delete-id" value="<?php echo $itemsMenu[$i]['id'] ?>" />
				<input type="hidden" name="delete-type" value="itemMenu" />
				<input type="submit" value="Удалить" class="save" />
			</form>
		</div>
		<?php 
			$max++;
			if($max == $limit){
				break; //останавливаем цикл, если достигнуто максимальное количество пунктов меню на странице
			}
		?>
	<?php endfor;?>
	
</div>


<!---пагинация---->
<?php 
	if($count_rows > $limit){NavView::getView($limit, $count_rows);} //подключаем файл пагинации
?>