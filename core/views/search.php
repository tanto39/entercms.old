<?php

if(isset($_POST['query']) && !empty($_POST['query'])){
	//фильтруем поисковый запрос
	$query = SearchController::toString($_POST['query']);
}else{
	exit('ошибка поиска');
}

$select = 'article';
if(isset($_POST['select']) && !empty($_POST['select'])){
	//фильтруем селектор поиска по материалу или категории
	$select = SearchController::toString($_POST['select']);
}

$search = SearchController::getView($query, $select); //получаем выборку из базы 
?>
<!-- Расшифровка массива, возвращаемого из базы

$search[i]['title'] - заголовок материала или категории
$search[i]['description'] - описание материала или категории
$article['url'] - ссылка на материал или категорию
-->

<div class="search-content">
	<form action="/" method="post" class="form-inline">
		<input type="hidden" name="option" value="search"/>
		<input name="query" id="mod-search-searchword" maxlength="20" class="inputbox search-query" type="text" size="20" value="Поиск..." />
		<button class="button btn btn-primary">Найти</button>
		
		<div class="select-search-block">
			<div>
				<label for="article-search">Поиск по статьям</label>
				<input id="article-search" type="radio" name="select" value="article" checked="checked" />
			</div>
			<div>
				<label for="category-search">Поиск по категориям</label>
				<input id="category-search" type="radio" name="select" value="category" />
			</div>
			<div>
				<label for="product-search">Поиск по товарам</label>
				<input id="product-search" type="radio" name="select" value="product" />
			</div>
		</div>
	</form>
	<div class="search-result">
		<? foreach($search as $item) : ?>
			<div class="item-search">
				<h3><a href="<? echo $item['url']?>"><? echo $item['title']?></a></h3>
				<div class="item-search-description"><? echo $item['description']?></div>
			</div>
		<? endforeach; ?>
	</div>
</div>
