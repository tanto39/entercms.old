<?php
$menu = View::$getView; //получаем меню

/* расшифровка массива возвращаемого из базы
$menu['id'] - id меню
$menu['name'] - название меню

*/

?>

<div class="edit">
	<form id="get-data-form" method="POST" action="index.php">
		<label>Название меню:</label>
		<input type="text" name="editmenu-name" value="<?php echo $menu['name']; ?>" />
		<input type="hidden" name="editmenu-id" value="<?php echo $menu['id'];?>" />
		
		<input type="submit" value="Сохранить" class="save" />
	</form>	
</div>
