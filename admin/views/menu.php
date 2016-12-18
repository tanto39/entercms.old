<?php
$menus = View::$getMenu; //получаем список меню

/* Расшифровка массива, возвращаемого из базы
 
$menus[$i]['id'] - id меню
$menus[$i]['name'] - название меню
*/
?>

<div class="item-list">
<!--добавление меню-->
<a class="addArticle" href="/admin?addMenu=10">Добавить меню</a>

<!--выводим список меню-->
	<?php foreach($menus as $menu) : ?>
		<div class="edit-item">
			<a href="<?php echo '/admin?editMenu='.$menu['id']?>"><?php echo $menu['name']?></a>
			<!--удаление меню-->
			<form class="delete" method="POST" action="<?php echo $uri; ?>">
				<input type="hidden" name="delete-id" value="<?php echo $menu['id'] ?>" />
				<input type="hidden" name="delete-type" value="menu" />
				<input type="submit" value="Удалить" class="save" />
			</form>
		</div>

	<?php endforeach;?>
	
</div>
