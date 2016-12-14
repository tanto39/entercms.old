<?php $categories = View::$getView;; //получаем список категорий

$limit = 5; //количество категории, выводимых на странице
$max = 0; //счетчик для макс. кол-ва категорий
$count_rows = count($categories); //общее количество категорий, полученных из БД

if($_GET['p']){
	$i = ($_GET['p']-1)*$limit;
}else{
	$i=0;
}

/* Расшифровка массива, возвращаемого из базы
 
$categories['id'] - id категории
$categories['title'] - заголовок категории
$categories['date_create'] - дата создания категории

пример: $categories[0]['title'] */

?>

<div class="item-list">
<!--добавление категории-->
<a class="addCategory" href="/admin?addCategory=10">Добавить категорию</a>

<!--выводим материалы-->
	<?php for($i;;$i++) : ?>
		<?php //останавливаем цикл, если статьи не существует
			if(!$categories[$i]){
				break;
			}	
		?>
		<div class="edit-item">
			<a href="<?php echo '/admin?editCategory='.$categories[$i]['id']?>"><?php echo $categories[$i]['title']?></a></h2>
			
			<!--удаление категории-->
			<form class="delete" method="POST" action="<?php echo $uri; ?>">
				<input type="hidden" name="delete-id" value="<?php echo $categories[$i]['id'] ?>" />
				<input type="hidden" name="delete-type" value="category" />
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