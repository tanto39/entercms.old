<?php $article = ContentController::getView(); //получаем материал ?>
<!-- Расшифровка массива, возвращаемого из базы

$article['title'] - заголовок материала
$article['keywords'] - мета keywords, 
$article['meta_desc'] - мета description, 
$article['content'] - вступительный текст
$article['date_create'] - дата создания
$article['date_update'] - дата обновления
$article['img_url'] - юрл вступительной картинки
$article['author'] - автор
$article['category'] - категория
-->
<? if(!isset($_POST['query'])) : //если нет поискового запроса выводим статью?>

<div class="editArticle">
	<textarea class="tinymce"></textarea>
	
	<!-- include javascript -->
	<script type="text/javascript" src="/plugins/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="/plugins/tinymce/init-tinymce.js"></script>
</div>

<? else : //если есть поисковый запрос подключаем представление поиска?>
	<? SearchController::route();?>
<? endif; ?>