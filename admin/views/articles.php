<?php
$articles = View::$getView; //получаем список статей
$categories = View::$getCategories; //получаем категории

$limit = 5; //количество статей, выводимых на странице
$max = 0; //счетчик для макс. кол-ва статей
$count_rows = count($articles); //общее количество материалов, полученных из БД

if($_GET['p']){
	$i = ($_GET['p']-1)*$limit;
}else{
	$i=0;
}

/* Расшифровка массива, возвращаемого из базы
 
$articles[$i]['id'] - заголовок материала
$articles[$i]['title'] - заголовок материала
$articles[$i]['category'] - категория

пример: $articles[0]['title']
$category['title'] - заголовок из списка категорий */

?>

<div class="item-list">
<!--список категорий-->
<div class="category-list">
<form method="POST" action="<?php echo $uri; ?>">
<label>Категория:</label>
		<select name="selectcat" />
		<option value="%">Все категории</option>
		<?php foreach($categories as $category) : ?>
			<?php if($category['title'] == $_COOKIE['activeCategory']) : ?>
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
<a class="addArticle" href="/admin?addArticle=10">Добавить статью</a>

<!--выводим материалы-->
	<?php for($i;;$i++) : ?>
		<?php //останавливаем цикл, если статьи не существует
			if(!$articles[$i]){
				break;
			}	
		?>
		<div class="edit-item">
			<a href="<?php echo '/admin?editArticle='.$articles[$i]['id']?>"><?php echo $articles[$i]['title']?></a></h2>
			<div class="item-category"><?php echo $articles[$i]['category']?></div>
			<!--удаление статьи-->
			<form class="delete" method="POST" action="<?php echo $uri; ?>">
				<input type="hidden" name="delete-id" value="<?php echo $articles[$i]['id'] ?>" />
				<input type="hidden" name="delete-type" value="articles" />
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