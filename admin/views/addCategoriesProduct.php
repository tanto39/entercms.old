<?php 
	$parents = View::$getCategories; //родительские категории

/* 	Расшифровка массива, возвращаемого из базы
	$parents['title'] - заголовок категории товара
 */
?>
<div class="edit">
	<form id="get-data-form" method="POST" action="index.php">
		<label>Заголовок:</label>
		<input type="text" name="addprodcat-title" />
		
		<label>Ключевые слова:</label>
		<input type="text" name="addprodcat-keywords" />
		
		<label>Description:</label>
		<input type="text" name="addprodcat-meta_desc" />
		
		<label>Дата создания:</label>
		<input type="text" name="addprodcat-date_create" />
		
		<label>Вступительная картинка:</label>
		<input type="text" name="addprodcat-img_url" />
		
		<label>Url:</label>
		<input type="text" name="addprodcat-url" />
		
		<label>Родительская категория:</label>
		<select name="addprodcat-parent" />
			<option value="0">Без родителя</option>
			<?php foreach($parents as $parent) : ?>
					<option value="<?php echo $parent['title'];?>"><?php echo $parent['title'];?></option>
			<?php endforeach;?>
		</select>
	
		<label>Краткое описание:</label>
		
		<textarea class="tinymce" name="addprodcat-description" id="texteditor"></textarea>
		<input type="submit" value="Добавить" class="save" />
	</form>
	<!--<div class="after-save">Загрузка...</div>-->
	<!-- include javascript -->
	<script type="text/javascript" src="/plugins/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="/plugins/tinymce/init-tinymce.js"></script>
	
</div>
