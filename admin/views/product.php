<?php 
	$product = ContentController::getView($table); global $temp;//получаем товар
	$product['img_url'] = explode(';', $product['img_url']); //получаем картинки

/* Расшифровка массива, возвращаемого из базы

$product['title'] - заголовок товара
$product['description'] - краткое описание товара
$product['keywords'] - мета keywords, 
$product['meta_desc'] - мета description, 
$product['content'] - вступительный текст
$product['date_create'] - дата создания
$product['date_update'] - дата обновления
$product['price'] - цена
$product['articul'] - артикул
$product['img_url'] - юрл картинок
$product['manufacturer'] - производитель
для получения картинок разбиваем строку с uri картинок в массив и берем элементы: explode(';',$product['img_url'])[i];

*/
?>
<? if(!isset($_POST['query'])) : //если нет поискового запроса выводим товар ?>
<script type="text/javascript" src="temp/<? echo $temp; ?>/js/img-product.js"></script>
<div class="product">
	<h1><?php echo $product['title'];?></h1>
	
	<!--картинки-->
	<div class="slider-wrap">
		<div class="slider-big">
			<img src="<?php echo $product['img_url'][0];?>" alt="<?php echo $product['title'];?>" title="<?php echo $product['title'];?>"/>
		</div>
		<div class="slider-mini-block">
			<? foreach($product['img_url'] as $img) : ?>
				<div><img src="<?php echo $img;?>" alt="<?php echo $product['title'];?>" title="<?php echo $product['title'];?>"/></div>
			<? endforeach; ?>
			<span class="sl-prev"></span>
			<span class="sl-next"></span>
		</div>
		<div class="slider-desc">Нажмите на большое изображение, чтобы просмотреть в полноэкранном режиме</div>
	</div>
	
	<div class="price">Цена: <?php echo $product['price'];?> руб.</div>
	<div class="articul">Артикул: <?php echo $product['articul'];?></div>
	<div class="manufacturer">Производитель: <?php echo $product['manufacturer'];?></div>
	

	<div class="full-img-wrap">
		<div class="full-img"></div>
	</div>	
	<div class="fon"></div>
	
	<div class="product-desc"><?php echo $product['description'];?></div>
	<a class="zakaz-button" href="#">Заказать</a>
	<div class="features"><?php echo $product['content'];?></div>
	
</div>

<? else : //если есть поисковый запрос подключаем представление поиска ?>
	<? SearchController::route();?>
<? endif; ?>
 

