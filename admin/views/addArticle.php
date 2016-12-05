<?php 
	$categories = ContentController::getCategories(); //получаем категории
?>
<!-- Расшифровка массива, возвращаемого из базы

$category['title'] - заголовок из списка категорий
-->
<? if(!isset($_POST['query'])) : //если нет поискового запроса выводим статью?>

<div class="editArticle">
	<form id="get-data-form" method="POST" action="getdata.php">
		<label>Заголовок:</label>
		<input type="text" name="add-title" />
		
		<label>Ключевые слова:</label>
		<input type="text" name="add-keywords" />
		
		<label>Description:</label>
		<input type="text" name="add-meta_desc" />
		
		<label>Дата создания:</label>
		<input type="text" name="add-date_create" />
		
		<label>Вступительная картинка:</label>
		<input type="text" name="add-img_url" />
		
		<label>Автор:</label>
		<input type="text" name="add-author" />
		
		<label>Url:</label>
		<input type="text" name="add-url" />
		
		<label>Категория:</label>
		<select name="add-category" />
		<?php foreach($categories as $category) : ?>
				<option value="<?php echo $category['title'];?>"><?php echo $category['title'];?></option>
		<?php endforeach;?>
		</select>
		
		<label>Краткое описание:</label>
		<textarea name="add-description" class="short-desc" /></textarea>
		
		<textarea class="tinymce" name="add-content" id="texteditor"></textarea>
		
		<input type="submit" value="Сохранить" class="save" />
	</form>
	<!--<div class="after-save">Загрузка...</div>-->
	<!-- include javascript -->
	<script type="text/javascript" src="/plugins/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="/plugins/tinymce/init-tinymce.js"></script>
	
</div>

<? else : //если есть поисковый запрос подключаем представление поиска?>
	<? SearchController::route();?>
<? endif; ?>