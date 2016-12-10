<?php $category = View::$getView; //получаем выборку из Бд

$limit = 5; //количество статей, выводимых на странице
$max = 0; //счетчик для макс. кол-ва статей
$count_rows = count($category['items']); //общее количество материалов, полученных из БД

if($_GET['p']){
	$i = ($_GET['p']-1)*$limit;
}else{
	$i=0;
}

/* Расшифровка массива, возвращаемого из базы
$category['catInfo'] 
элементы: 
['id'] - id категории, 
['title'] - заголовок категории
['keywords'] - мета keywords, 
['meta_desc'] - мета description, 
['description'] - описание категории, 
['img_url'] - адрес вступительной картинки 

пример: $category['catInfo'][description]

$category['items'][i]
элементы: 
['title'] - заголовок материала
['description'] - вступительный текст
['date_create'] - дата создания
['date_update'] - дата обновления
['img_url'] - юрл вступительной картинки
['url'] - юри материала

пример: $category['items'][0]['description'] */

?>

<div class="category">
	<!-- описание категории -->
	<div class="category-prev">
		<h1><?php echo $category['catInfo']['title'];?></h1>
		<div class="category-desc"><?php echo $category['catInfo']['description'];?></div>
	</div>
	
	<!-- список материалов -->
	<div class="blog">
	<?php for($i;;$i++) : ?>
		<?php //останавливаем цикл, если статьи не существует
			if(!$category['items'][$i]){
				break;
			}	
		?>
		<div class="blog-item">
			<h2><a href="<?php echo $category['items'][$i]['url']?>"><?php echo $category['items'][$i]['title']?></a></h2>
			<div class="blog-item-img"><img src="<?php echo $category['items'][$i]['img_url']?>" alt="<?php echo $category['items'][$i]['title']?>" title="<?php echo $category['items'][$i]['title']?>"/></div>
			<div class="blog-item-desc"><?php echo $category['items'][$i]['description']?></div>
			<div class="blog-item-date"><?php echo $category['items'][$i]['date_create']?></div>
		</div>
		<?php 
			$max++;
			if($max == $limit){
				break; //останавливаем цикл, если достигнуто максимальное количество статей на странице
			}
		?>
	<?php endfor;?>
	</div>

</div>

<!---пагинация---->
<?php 
	if($count_rows > $limit){NavView::getView($limit, $count_rows);} //подключаем файл пагинации
?>
