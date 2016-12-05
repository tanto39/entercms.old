<?php $categories = ContentController::getView(); //получаем список статей

$limit = 10; //количество категории, выводимых на странице
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
<? if(!isset($_POST['query'])) : //если нет поискового запроса выводим материалы ?>

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
	if($count_rows > $limit){NavController::getView($limit, $count_rows);} //подключаем файл пагинации
?>

<? else : //если есть поисковый запрос подключаем представление поиска ?>
	<? //SearchController::route();?>
<? endif; ?>