<?php 
	$category = View::$getView; //получаем категорию 

/* 	Расшифровка массива, возвращаемого из базы
	id, title, keywords, meta_desc, description, url, img_url, date_create
	$category[id] - id материала 
	$category['title'] - заголовок материала
	$category['keywords'] - мета keywords, 
	$category['meta_desc'] - мета description,
	$category['description'] - описание,
	$category['url'] - uri материала
	$category['img_url'] - юрл вступительной картинки
	$category['date_create'] - дата создания
 */
?>


<div class="edit">
	<form id="get-data-form" method="POST" action="index.php">
		<label>Заголовок:</label>
		<input type="text" name="cat-title" value="<?php echo $category['title'];?>" />
		
		<label>Ключевые слова:</label>
		<input type="text" name="cat-keywords" value="<?php echo $category['keywords'];?>" />
		
		<label>Description:</label>
		<input type="text" name="cat-meta_desc" value="<?php echo $category['meta_desc'];?>" />
		
		<label>Дата создания:</label>
		<input type="text" name="cat-date_create" value="<?php echo $category['date_create'];?>" />
		
		<label>Вступительная картинка:</label>
		<input type="text" name="cat-img_url" value="<?php echo $category['img_url'];?>" />
		
		<label>Url:</label>
		<input type="text" name="cat-url" value="<?php echo $category['url'];?>" />

		<input type="hidden" name="cat-oldurl" value="<?php echo $category['url'];?>" />
		
		<label>Краткое описание:</label>
		
		<textarea class="tinymce" name="cat-description" id="texteditor"><? echo $category['description'];?></textarea>
		<input type="hidden" name="cat-id" value="<?php echo $category['id'];?>" />
		<input type="submit" value="Сохранить" class="save" />
	</form>
	<!--<div class="after-save">Загрузка...</div>-->
	<!-- include javascript -->
	<script type="text/javascript" src="/plugins/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="/plugins/tinymce/init-tinymce.js"></script>
	
</div>
