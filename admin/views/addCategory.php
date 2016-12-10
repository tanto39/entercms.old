
<div class="edit">
	<form id="get-data-form" method="POST" action="index.php">
		<label>Заголовок:</label>
		<input type="text" name="addcat-title" />
		
		<label>Ключевые слова:</label>
		<input type="text" name="addcat-keywords" />
		
		<label>Description:</label>
		<input type="text" name="addcat-meta_desc" />
		
		<label>Дата создания:</label>
		<input type="text" name="addcat-date_create" />
		
		<label>Вступительная картинка:</label>
		<input type="text" name="addcat-img_url" />
		
		<label>Url:</label>
		<input type="text" name="addcat-url" />
	
		<label>Краткое описание:</label>
		
		<textarea class="tinymce" name="addcat-description" id="texteditor"></textarea>
		
		<input type="submit" value="Сохранить" class="save" />
	</form>
	<!--<div class="after-save">Загрузка...</div>-->
	<!-- include javascript -->
	<script type="text/javascript" src="/plugins/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="/plugins/tinymce/init-tinymce.js"></script>
	
</div>
