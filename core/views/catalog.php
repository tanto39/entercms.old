<?php $catalog = View::$getView; //получаем выборку из Бд 

/* 
Расшифровка массива, возвращаемого из базы $catalog
 
['id'] - id категории, 
['title'] - заголовок категории
['description'] - описание категории, 
['url'] - адрес категории 
['img_url'] - адрес вступительной картинки 

пример: $catalog[0]['description']
*/
?>

<div class="catalog">
	<h1>Каталог товаров</h1>
	
	<?php foreach($catalog as $category) : ?>
		<div class="catalog-item">
			<h2><a href="<?php echo $category['url']?>"><?php echo $category['title']?></a></h2>
			<a href="<?php echo $category['url']?>"><img src="<?php echo $category['img_url']?>" alt="<?php echo $category['title']?>" title="<?php echo $category['title']?>" /></a>
			<div class="catalog-item-desc"><?php echo $category['description']?></div>
		</div>
	<?php endforeach; ?>
	
</article>

 

