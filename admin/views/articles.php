<?php $articles = ContentController::getView(); //получаем список статей

$limit = 3; //количество статей, выводимых на странице
$max = 0; //счетчик для макс. кол-ва статей
$count_rows = count($articles); //общее количество материалов, полученных из БД

if($_GET['p']){
	$i = ($_GET['p']-1)*$limit;
}else{
	$i=0;
}

/* Расшифровка массива, возвращаемого из базы
 
$articles['id'] - заголовок материала
$articles['title'] - заголовок материала
$articles['category'] - категория

пример: $articles[0]['title'] */

?>
<? if(!isset($_POST['query'])) : //если нет поискового запроса выводим материалы ?>

<div class="item-list">

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