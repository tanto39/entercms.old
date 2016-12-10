<?php 
	$product = View::$getView; //получаем материал 
	$categories = View::$getCategories; //получаем категории

/* 	Расшифровка массива, возвращаемого из базы

	$product['title'] - заголовок товара
	$product['keywords'] - мета keywords, 
	$product['meta_desc'] - мета description,
	$product['description'] - описание,
	$product['content'] - контент
	$product['url'] - uri
	$product['img_url'] - юрл картинок
	$product['date_create'] - дата создания
	$product['date_update'] - дата обновления
	$product['price'] - цена
	$product['articul'] - артикул
	$product['manufacturer'] - производитель
	$product['category'] - категория

	$category['title'] - заголовок из списка категорий */

?>

<div class="edit">
	<form id="get-data-form" method="POST" action="index.php">
		<label>Заголовок:</label>
		<input type="text" name="prod-title" value="<?php echo $product['title'];?>" />
		
		<label>Ключевые слова:</label>
		<input type="text" name="prod-keywords" value="<?php echo $product['keywords'];?>" />
		
		<label>Description:</label>
		<input type="text" name="prod-meta_desc" value="<?php echo $product['meta_desc'];?>" />
		
		<label>Дата создания:</label>
		<input type="text" name="prod-date_create" value="<?php echo $product['date_create'];?>" />
		
		<label>Дата обновления:</label>
		<input type="text" name="prod-date_update" value="<?php echo $product['date_update'];?>" />
		
		<label>Изображения:</label>
		<input type="text" name="prod-img_url" value="<?php echo $product['img_url'];?>" />
		
		<label>Цена:</label>
		<input type="text" name="prod-price" value="<?php echo $product['price'];?>" />
		
		<label>Артикул:</label>
		<input type="text" name="prod-articul" value="<?php echo $product['articul'];?>" />
		
		<label>Производитель:</label>
		<input type="text" name="prod-manufacturer" value="<?php echo $product['manufacturer'];?>" />
		
		<label>Url:</label>
		<input type="text" name="prod-url" value="<?php echo $product['url'];?>" />

		<input type="hidden" name="prod-oldurl" value="<?php echo $product['url'];?>" />
		
		<label>Категория:</label>
		<select name="prod-category" />
		<?php foreach($categories as $category) : ?>
			<?php if($category['title'] == $product['category']) : ?>
				<option selected value="<?php echo $category['title'];?>"><?php echo $category['title'];?></option>
			<?php else : ?>
				<option value="<?php echo $category['title'];?>"><?php echo $category['title'];?></option>
			<?php endif; ?>
		<?php endforeach;?>
		</select>
		
		<label>Краткое описание:</label>
		<textarea name="prod-description" class="short-desc" /><?php echo $product['description'];?></textarea>
		
		<textarea class="tinymce" name="prod-content" id="texteditor"><? echo $product['content'];?></textarea>
		<input type="hidden" name="prod-id" value="<?php echo $product['id'];?>" />
		<input type="submit" value="Сохранить" class="save" />
	</form>
	<!--<div class="after-save">Загрузка...</div>-->
	<!-- include javascript -->
	<script type="text/javascript" src="/plugins/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="/plugins/tinymce/init-tinymce.js"></script>
	
</div>
