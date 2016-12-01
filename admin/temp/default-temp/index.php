<!--
для подключения контента использовать ContentController::route($table), $table - имя таблицы, категория либо статья;
для вывода меню использовать MenuController::route('top-menu'), top-menu - название меню в таблице, поле name;
-->
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
			<li><a href="/admin/index.php?articles=10">Материалы</a></li>
		</ul>
            <div class="search">
				<form action="/" method="post" class="form-inline">
					<input type="hidden" name="option" value="search"/>
					<input name="query" id="mod-search-searchword" maxlength="20" class="inputbox search-query" type="text" size="20" value="Поиск..." />
					<button class="button btn btn-primary">Найти</button>	
				</form>
            </div>
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