<?php $category = ContentController::getView($table);?>

<!-- Расшифровка массива, возвращаемого из базы
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

пример: $category['items'][0]['description']

-->
<? if(!isset($_POST['query'])) : //если нет поискового запроса выводим категорию ?>

<div class="category">
	<!-- описание категории -->
	<div class="category-prev">
		<h1><?php echo $category['catInfo']['title'];?></h1>
		<div class="category-desc"><?php echo $category['catInfo']['description'];?></div>
	</div>
	
	<!-- список материалов -->
	<div class="blog">
	<?php foreach($category['items'] as $item) : ?>
		<div class="blog-item">
			<h2><a href="<?php echo $item['url']?>"><?php echo $item['title']?></a></h2>
			<div class="blog-item-img"><img src="<?php echo $item['img_url']?>" alt="<?php echo $item['title']?>" title="<?php echo $item['title']?>"/></div>
			<div class="blog-item-desc"><?php echo $item['description']?></div>
			<div class="blog-item-date"><?php echo $item['date_create']?></div>
		</div>
	<?php endforeach;?>
	</div>

</div>

<? else : //если есть поисковый запрос подключаем представление поиска ?>
	<? SearchController::route();?>
<? endif; ?>