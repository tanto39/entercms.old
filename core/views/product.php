<?php $product = ContentController::getView($table); //получаем материал?>
<!-- Расшифровка массива, возвращаемого из базы

$product['title'] - заголовок товара
$product['description'] - краткое описание товара
$product['keywords'] - мета keywords, 
$product['meta_desc'] - мета description, 
$product['content'] - вступительный текст
$product['date_create'] - дата создания
$product['date_update'] - дата обновления
$product['img_url'] - юрл вступительной картинки
$product['price'] - цена
-->
<? if(!isset($_POST['query'])) : //если нет поискового запроса выводим товар?>

<div class="product">
	<h1><?php echo $product['title'];?></h1>
	<div class="product-desc"><?php echo $product['description'];?></div>
	<div class="features"><?php echo $product['content'];?></div>
	<div class="price"><?php echo $product['price'];?></div>
</div>

<? else : //если есть поисковый запрос подключаем представление поиска?>
	<? SearchController::route();?>
<? endif; ?>
 

