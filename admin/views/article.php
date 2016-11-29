<?php $article = ContentController::getView($table); //получаем материал?>
<!-- Расшифровка массива, возвращаемого из базы

$article['title'] - заголовок материала
$article['keywords'] - мета keywords, 
$article['meta_desc'] - мета description, 
$article['content'] - вступительный текст
$article['date_create'] - дата создания
$article['date_update'] - дата обновления
$article['img_url'] - юрл вступительной картинки
$article['author'] - автор
-->
<? if(!isset($_POST['query'])) : //если нет поискового запроса выводим статью?>

<article class="article">
	<h1><?php echo $article['title'];?></h1>
	<div class="item"><?php echo $article['content'];?></div>
	<div class="date_create"><?php echo $article['date_create'];?></div>
</article>

<? else : //если есть поисковый запрос подключаем представление поиска?>
	<? SearchController::route();?>
<? endif; ?>
 

