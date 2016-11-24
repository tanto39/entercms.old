<?php $productCategory = ContentController::getView($table); ?>

<!-- Расшифровка массива, возвращаемого из базы
$productCategory['catInfo'] 
элементы: 
['id'] - id категории, 
['title'] - заголовок категории
['keywords'] - мета keywords, 
['meta_desc'] - мета description, 
['description'] - описание категории, 
['img_url'] - адрес вступительной картинки 

пример: $category['catInfo'][description]

$productCategory['items'][i]
элементы: 
['title'] - заголовок материала
['description'] - вступительный текст
['date_create'] - дата создания
['date_update'] - дата обновления
['img_url'] - юрл вступительной картинки
['price'] - цена товара
['url'] - юри товара

пример: $productCategory['items'][0]['description']

-->
<? if(!isset($_POST['query'])) : //если нет поискового запроса выводим категорию ?>

<div class="product-category">
	<!-- описание категории -->
	<div class="category-prev">
		<h1><?php echo $productCategory['catInfo']['title'];?></h1>
		<div class="category-desc"><?php echo $productCategory['catInfo']['description'];?></div>
	</div>
	
	<!-- список товаров -->
	<div class="product-list">
	<?php foreach($productCategory['items'] as $item) : ?>
		<div class="product-item">
			<h2><a href="<?php echo $item['url']?>"><?php echo $item['title']?></a></h2>
			<div class="product-item-img"><img src="<?php echo $item['img_url']?>" alt="<?php echo $item['title']?>" title="<?php echo $item['title']?>"/></div>
			<div class="product-item-desc"><?php echo $item['description']?></div>
			<div class="product-item-date"><?php echo $item['price']?></div>
		</div>
	<?php endforeach;?>
	</div>

</div>

<? else : //если есть поисковый запрос подключаем представление поиска ?>
	<? SearchController::route();?>
<? endif; ?>