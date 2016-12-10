<?php 
	$article = View::$getView; //получаем материал 
	$categories = View::$getCategories; //получаем категории
	
/* 	Расшифровка массива, возвращаемого из базы

	$article[id] - id материала 
	$article['title'] - заголовок материала
	$article['keywords'] - мета keywords, 
	$article['meta_desc'] - мета description,
	$article['description'] - описание,
	$article['content'] - вступительный текст
	$article['date_create'] - дата создания
	$article['date_update'] - дата обновления
	$article['img_url'] - юрл вступительной картинки
	$article['author'] - автор
	$article['category'] - категория
	$article['url'] - uri материала

	$category['title'] - заголовок из списка категорий */

?>



<div class="edit">
	<form id="get-data-form" method="POST" action="index.php">
		<label>Заголовок:</label>
		<input type="text" name="title" value="<?php echo $article['title'];?>" />
		
		<label>Ключевые слова:</label>
		<input type="text" name="keywords" value="<?php echo $article['keywords'];?>" />
		
		<label>Description:</label>
		<input type="text" name="meta_desc" value="<?php echo $article['meta_desc'];?>" />
		
		<label>Дата создания:</label>
		<input type="text" name="date_create" value="<?php echo $article['date_create'];?>" />
		
		<label>Вступительная картинка:</label>
		<input type="text" name="img_url" value="<?php echo $article['img_url'];?>" />
		
		<label>Автор:</label>
		<input type="text" name="author" value="<?php echo $article['author'];?>" />
		
		<label>Url:</label>
		<input type="text" name="url" value="<?php echo $article['url'];?>" />

		<input type="hidden" name="oldurl" value="<?php echo $article['url'];?>" />
		
		<label>Категория:</label>
		<select name="category" />
		<?php foreach($categories as $category) : ?>
			<?php if($category['title'] == $article['category']) : ?>
				<option selected value="<?php echo $category['title'];?>"><?php echo $category['title'];?></option>
			<?php else : ?>
				<option value="<?php echo $category['title'];?>"><?php echo $category['title'];?></option>
			<?php endif; ?>
		<?php endforeach;?>
		</select>
		
		<label>Краткое описание:</label>
		<textarea name="description" class="short-desc" /><?php echo $article['description'];?></textarea>
		
		<textarea class="tinymce" name="content" id="texteditor"><? echo $article['content'];?></textarea>
		<input type="hidden" name="id" value="<?php echo $article['id'];?>" />
		<input type="submit" value="Сохранить" class="save" />
	</form>
	<!--<div class="after-save">Загрузка...</div>-->
	<!-- include javascript -->
	<script type="text/javascript" src="/plugins/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="/plugins/tinymce/init-tinymce.js"></script>
	
</div>
