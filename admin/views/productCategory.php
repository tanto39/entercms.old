<?php

if(($_POST['sort']) && (!empty($_POST['sort'])) ){
	ContentController::setSort($table);//вызываем метод сортировки
}

$productCategory = ContentController::getView($table); //получаем товары

$limit = 3; //количество товаров, выводимых на странице
$max = 0; //счетчик для макс. кол-ва товаров
$count_rows = count($productCategory['items']); //общее количество материалов, полученных из БД

if($_GET['p']){//счетчик для вывода товаров в цикле
	$i = ($_GET['p']-1)*$limit;
}else{
	$i=0;
}
	
/* 
Расшифровка массива, возвращаемого из базы
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
['title'] - заголовок товара
['description'] - вступительный текст
['date_create'] - дата создания
['date_update'] - дата обновления
['img_url'] - юрл вступительной картинки
['price'] - цена товара
['url'] - юри товара
['articul'] - артикул
['manufacturer'] - производитель
для получения вступительной картинки разбиваем строку с uri картинок в массив и берем первый элемент: explode(';',$item['img_url'])[0];

пример: $productCategory['items'][0]['description'] */
?>
<? if(!isset($_POST['query'])) : //если нет поискового запроса выводим категорию ?>

<div class="product-category">
	<!-- описание категории -->
	<div class="category-prev">
		<h1><?php echo $productCategory['catInfo']['title'];?></h1>
		<div class="category-desc"><?php echo $productCategory['catInfo']['description'];?></div>
	</div>
	
	<!-- сортировка товаров -->
	<p>Сортировка:</p>
	<form class="sort" method="POST" action="<?php echo $uri;?>">
		<select name="sort">
			<option value="priceUp">Возрастание цены</option>
			<option value="priceDown">Убывание цены</option>
			<option value="manufacturer">Производитель</option>
		</select>
		<button class="sort-button">Сортировать</button>
	</form>
	
	<!-- список товаров -->
	<div class="product-list">
	
	<!-- выводим товары -->
	<?php for($i;;$i++) : ?>
		<?php //останавливаем цикл, если товара не существует
			if(!$productCategory['items'][$i]){
				break;
			}	
		?>

		<div class="product-item">
			<h2><a href="<?php echo $productCategory['items'][$i]['url']?>"><?php echo $productCategory['items'][$i]['title']?></a></h2>
			<div class="product-item-img"><a href="<?php echo $productCategory['items'][$i]['url']?>"><img src="<?php echo explode(';',$productCategory['items'][$i]['img_url'])[0];?>" alt="<?php echo $productCategory['items'][$i]['title']?>" title="<?php echo $productCategory['items'][$i]['title']?>"/></a></div>
			
			<div class="price">Цена: <?php echo $productCategory['items'][$i]['price']?> руб.</div>
			<div class="articul">Артикул: <?php echo $productCategory['items'][$i]['articul']?></div>
			<div class="manufacturer">Производитель: <?php echo $productCategory['items'][$i]['manufacturer']?></div>
			<a class="zakaz-button" href="#">Заказать</a>
		
		<?php 
			$max++;
			if($max == $limit){
				break; //останавливаем цикл, если достигнуто максимальное количество товаров на странице
			}
		?>		
		</div>
	<?php endfor;?>
	</div>
	
</div>

<!---пагинация---->
<?php 
	if($count_rows > $limit){NavController::getView($limit, $count_rows);} //подключаем файл пагинации
?>

<? else : //если есть поисковый запрос подключаем представление поиска ?>
	<? SearchController::route();?>
<? endif; ?>