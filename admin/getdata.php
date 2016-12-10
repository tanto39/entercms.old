<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8" />
	<?php if($_POST['title']) : ?>
		<meta http-equiv="refresh" content="1; url=<?php echo $_SERVER['HTTP_REFERER'];?>" />
	<?php elseif($_POST['add-title']) : ?>
		<meta http-equiv="refresh" content="1; url=/admin/index.php?articles=10" />
	<?php elseif($_POST['cat-title']) : ?>
		<meta http-equiv="refresh" content="1; url=<?php echo $_SERVER['HTTP_REFERER'];?>" />
	<?php elseif($_POST['addcat-title']) : ?>
		<meta http-equiv="refresh" content="1; url=/admin/index.php?categories=10" />		
	<?php endif;?>
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
	
	function loadView($nameClass){
		if(file_exists("views/classes/".$nameClass.".class.php")){
			require_once "views/classes/".$nameClass.".class.php";
		}
	}

	spl_autoload_register('loadModel');
	spl_autoload_register('loadController');
	spl_autoload_register('loadView');

	$mysqli = Db::getMysqli();

	//заносим данные из форм добавления и редактирования в базу
	GetData::setData();
	
	?>

</body>