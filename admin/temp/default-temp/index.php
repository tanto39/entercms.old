<!--
для подключения контента использовать ContentController::route($table), $table - имя таблицы, категория либо статья;
для вывода меню использовать MenuController::route('top-menu'), top-menu - название меню в таблице, поле name;
-->
<?
	global $uri;
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8" />
	<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<title></title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link href="temp/default-temp/css/style.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="temp/default-temp/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="temp/default-temp/js/myscripts.js"></script>
	<script type="text/javascript" src="temp/default-temp/js/editmenu.js"></script>
	
	<!--метатеги для перенаправления после добавления или редактирования-->
	<?php if($_POST['title']) : ?>
		<meta http-equiv="refresh" content="1; url=<?php echo $_SERVER['HTTP_REFERER'];?>" />
	<?php elseif($_POST['add-title']) : ?>
		<meta http-equiv="refresh" content="1; url=/admin/index.php?articles=10" />
	<?php elseif($_POST['cat-title']) : ?>
		<meta http-equiv="refresh" content="1; url=<?php echo $_SERVER['HTTP_REFERER'];?>" />
	<?php elseif($_POST['addcat-title']) : ?>
		<meta http-equiv="refresh" content="1; url=/admin/index.php?categories=10" />
	<?php elseif($_POST['selectcat']) : ?>
		<meta http-equiv="refresh" content="0; url=<?php echo $_SERVER['HTTP_REFERER'];?>" />
	<?php elseif($_POST['selectcatproduct']) : ?>
		<meta http-equiv="refresh" content="0; url=<?php echo $_SERVER['HTTP_REFERER'];?>" />
	<?php elseif($_POST['selectmenu']) : ?>
		<meta http-equiv="refresh" content="0; url=<?php echo $_SERVER['HTTP_REFERER'];?>" />
	<?php elseif($_POST['itemmenu-title']) : ?>
		<meta http-equiv="refresh" content="1; url=<?php echo $_SERVER['HTTP_REFERER'];?>" />
	<?php elseif($_POST['additemmenu-title']) : ?>
		<meta http-equiv="refresh" content="1; url=/admin/index.php?menus=10" />
	<?php elseif($_POST['addmenu-name']) : ?>
		<meta http-equiv="refresh" content="1; url=/admin/index.php?menu=10" />
	<?php elseif($_POST['editmenu-name']) : ?>
		<meta http-equiv="refresh" content="1; url=<?php echo $_SERVER['HTTP_REFERER'];?>" />
	<?php elseif($_POST['add-get-type-menu']) : ?>
		<meta http-equiv="refresh" content="1; url=<?php echo $_SERVER['HTTP_REFERER'];?>" />
	<?php elseif($_POST['prod-title']) : ?>
		<meta http-equiv="refresh" content="1; url=<?php echo $_SERVER['HTTP_REFERER'];?>" />
	<?php elseif($_POST['addprod-title']) : ?>
		<meta http-equiv="refresh" content="1; url=/admin/index.php?products=10" />
	<?php elseif($_POST['prodcat-title']) : ?>
		<meta http-equiv="refresh" content="1; url=<?php echo $_SERVER['HTTP_REFERER'];?>" />
	<?php elseif($_POST['addprodcat-title']) : ?>
		<meta http-equiv="refresh" content="1; url=/admin/index.php?categoriesProduct=10" />
	<?php elseif($_POST['delete-id']) : ?>
		<meta http-equiv="refresh" content="1; url=<?php echo $_SERVER['HTTP_REFERER'];?>" />
	<?php elseif($_POST['get-type-menu']) : ?>
		<meta http-equiv="refresh" content="1; url=<?php echo $_SERVER['HTTP_REFERER'];?>" />
	<?php endif;?>
	
	<!--[if IE]>
	<script type="text/javascript" src="temp/default-temp/js/iehtmlfix.js"></script>
	<![endif]-->
</head>

<body>

<div class="wrapper">

	<header class="header">
    
		<div class="logout">
			<form action="/admin/index.php" method="post" >
				<input type="hidden" name="logout" value="logout"/>
				<button>Выйти</button>	
			</form>
        </div>
		
		<div class="topmenu">
		<ul>
			<li <? if($uri == "/admin/index.php?articles=10"){echo "class='active'";}?>><a href="/admin/index.php?articles=10">Материалы</a></li>
			<li <? if($uri == "/admin/index.php?categories=10"){echo "class='active'";}?>><a href="/admin/index.php?categories=10">Категории</a></li>
			<li <? if($uri == "/admin/index.php?products=10"){echo "class='active'";}?>><a href="/admin/index.php?products=10">Товары</a></li>
			<li <? if($uri == "/admin/index.php?categoriesProduct=10"){echo "class='active'";}?> ><a href="/admin/index.php?categoriesProduct=10">Категории товаров</a></li>
			<li <? if($uri == "/admin/index.php?menus=10"){echo "class='active'";}?>><a href="/admin/index.php?menus=10">Пункты меню</a></li>
			<li <? if($uri == "/admin/index.php?menu=10"){echo "class='active'";}?>><a href="/admin/index.php?menu=10">Меню</a></li>
		</ul>
		</div>
	</header><!-- .header-->
    
	<div class="middle">

		<div class="container">
			<main class="content">
				<? ContentController::route(); ?>
			</main><!-- .content -->
		</div><!-- .container-->

	</div><!-- .middle-->

</div><!-- .wrapper -->

</body>
</html>