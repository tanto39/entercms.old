<?php
$products = View::$getView; //получаем список товаров
$categories = View::$getCategories; //получаем категории

$limit = 5; //количество статей, выводимых на странице
$max = 0; //счетчик для макс. кол-ва статей
$count_rows = count($products); //общее количество материалов, полученных из БД

if($_GET['p']){
	$i = ($_GET['p']-1)*$limit;
}else{
	$i=0;
}

/* Расшифровка массива, возвращаемого из базы
 
$products['id'] - id товара
$products['title'] - заголовок товара
$products['category'] - категория
$products['articul'] - категория

пример: $products[0]['title']
$category['title'] - заголовок из списка категорий */

?>

<div class="item-list">
<!--список категорий-->
<div class="category-list">
<form method="POST" action="<?php echo $uri; ?>">
<label>Категория:</label>
		<select name="selectcatproduct" />
		<option value="%">Все категории</option>
		<?php foreach($categories as $category) : ?>
			<?php if($category['title'] == $_COOKIE['activeCategoryProduct']) : ?>
				<option selected value="<?php echo $category['title'];?>"><?php echo $category['title'];?></option>
			<?php else : ?>
				<option value="<?php echo $category['title'];?>"><?php echo $category['title'];?></option>
			<?php endif; ?>
		<?php endforeach;?>
		</select>
		<input type="submit" value="Выбрать" class="save" />
</form>
</div>
<!--добавление материала-->
<a class="addArticle" href="/admin?addProduct=10">Добавить товар</a>

<!--выводим материалы-->
	<?php for($i;;$i++) : ?>
		<?php //останавливаем цикл, если статьи не существует
			if(!$products[$i]){
				break;
			}	
		?>
		<div class="edit-item">
			<a href="<?php echo '/admin?editProduct='.$products[$i]['id']?>"><?php echo $products[$i]['title']?></a></h2>
			<div class="item-category"><?php echo $products[$i]['category']?></div>
			<div class="item-category">Артикул: <?php echo $products[$i]['articul']?></div>
			
			<!--удаление товара-->
			<form class="delete" method="POST" action="<?php echo $uri; ?>">
				<input type="hidden" name="delete-id" value="<?php echo $products[$i]['id'] ?>" />
				<input type="hidden" name="delete-type" value="product" />
				<input type="submit" value="Удалить" class="save" />
			</form>
		</div>
		<?php 
			$max++;
			if($max == $limit){
				break; //останавливаем цикл, если достигнуто максимальное количество статей на странице
			}
		?>
	<?php endfor;?>
	
</div>


<!---пагинация---->
<?php 
	if($count_rows > $limit){NavView::getView($limit, $count_rows);} //подключаем файл пагинации
?>