<?php 
	$categories = View::$getCategories; //получаем категории
?>
<!-- Расшифровка массива, возвращаемого из базы

$category['title'] - заголовок из списка категорий
-->

<div class="edit">
	<form id="get-data-form" method="POST" action="index.php">
		<label>Заголовок:</label>
		<input type="text" name="addprod-title" />
		
		<label>Ключевые слова:</label>
		<input type="text" name="addprod-keywords" />
		
		<label>Description:</label>
		<input type="text" name="addprod-meta_desc" />
		
		<label>Дата создания:</label>
		<input type="text" name="addprod-date_create" />
		
		<label>Дата обновления:</label>
		<input type="text" name="addprod-date_update" />
		
		<label>Изображения:</label>
		<input type="text" name="addprod-img_url" />
		
		<label>Цена:</label>
		<input type="text" name="addprod-price" />
		
		<label>Артикул:</label>
		<input type="text" name="addprod-articul" />
		
		<label>Производитель:</label>
		<input type="text" name="addprod-manufacturer" />
		
		<label>Url:</label>
		<input type="text" name="addprod-url" />
		
		<label>Категория:</label>
		<select name="addprod-category" />
		<?php foreach($categories as $category) : ?>
				<option value="<?php echo $category['title'];?>"><?php echo $category['title'];?></option>
		<?php endforeach;?>
		</select>
		
		<label>Краткое описание:</label>
		<textarea name="addprod-description" class="short-desc" /></textarea>
		
		<textarea class="tinymce" name="addprod-content" id="texteditor"></textarea>
		
		<input type="submit" value="Сохранить" class="save" />
	</form>
	<!--<div class="after-save">Загрузка...</div>-->
	<!-- include javascript -->
	<script type="text/javascript" src="/plugins/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="/plugins/tinymce/init-tinymce.js"></script>
	
</div>
