<?php 
	$category = View::$getView; //получаем категорию 
	$parents = View::$getCategories; //родительские категории

/* 	Расшифровка массива, возвращаемого из базы
	
	$category[id] - id категории товара 
	$category['title'] - заголовок категории товара
	$category['keywords'] - мета keywords, 
	$category['meta_desc'] - мета description,
	$category['description'] - описание,
	$category['url'] - uri категории товара
	$category['img_url'] - юрл вступительной картинки
	$category['parent'] - родительская категория
	$category['date_create'] - дата создания
 */
?>


<div class="edit">
	<form id="get-data-form" method="POST" action="index.php">
		<label>Заголовок:</label>
		<input type="text" name="prodcat-title" value="<?php echo $category['title'];?>" />
		
		<label>Ключевые слова:</label>
		<input type="text" name="prodcat-keywords" value="<?php echo $category['keywords'];?>" />
		
		<label>Description:</label>
		<input type="text" name="prodcat-meta_desc" value="<?php echo $category['meta_desc'];?>" />
		
		<label>Дата создания:</label>
		<input type="text" name="prodcat-date_create" value="<?php echo $category['date_create'];?>" />
		
		<label>Вступительная картинка:</label>
		<input type="text" name="prodcat-img_url" value="<?php echo $category['img_url'];?>" />
		
		<label>Url:</label>
		<input type="text" name="prodcat-url" value="<?php echo $category['url'];?>" />
		
		<label>Родительская категория:</label>
		<select name="prodcat-parent" />
			<option value="0">Без родителя</option>
			<?php foreach($parents as $parent) : ?>
				<?php if($parent['title'] == $category['parent']) : ?>
					<option selected value="<?php echo $parent['title'];?>"><?php echo $parent['title'];?></option>
				<?php else : ?>
					<option value="<?php echo $parent['title'];?>"><?php echo $parent['title'];?></option>
				<?php endif; ?>
			<?php endforeach;?>
		</select>

		<input type="hidden" name="prodcat-oldurl" value="<?php echo $category['url'];?>" />
		
		<label>Краткое описание:</label>
		
		<textarea class="tinymce" name="prodcat-description" id="texteditor"><? echo $category['description'];?></textarea>
		<input type="hidden" name="prodcat-id" value="<?php echo $category['id'];?>" />
		<input type="submit" value="Сохранить" class="save" />
	</form>
	<!--<div class="after-save">Загрузка...</div>-->
	<!-- include javascript -->
	<script type="text/javascript" src="/plugins/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="/plugins/tinymce/init-tinymce.js"></script>
	
</div>
