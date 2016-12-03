<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="refresh" content="1; url=<?php echo $_SERVER['HTTP_REFERER'];?>" />
	
</head>

<body>

	<?php

	//автозагрузка классов модели и контроллеров
	function loadController($nameClass){
		if(file_exists("controllers/".$nameClass.".class.php")){
			require_once "controllers/".$nameClass.".class.php";
		}
	}

	function loadModel($nameClass){
		if(file_exists("models/".$nameClass.".class.php")){
			require_once "models/".$nameClass.".class.php";
		}
	}

	spl_autoload_register('loadModel');
	spl_autoload_register('loadController');

	$mysqli = Db::getMysqli();

	//заносим отредактированную статью в базу
	if(isset($_POST['content']) && isset($_POST['id'])){
		ContentController::editArticle($_POST['content'], $_POST['id']);
		echo "<div style='padding: 20px; margin: 100px auto; width: 300px; font-size: 24px; text-align: center; border: 2px solid #000000; background: #216161; color: #ffffff;'>Материал сохранен</div>";
	}
	?>

</body>