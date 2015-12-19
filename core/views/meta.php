<?php 
$meta = View::$getView;//получаем выборку 
global $table;

/* Расшифровка массива, возвращаемого из базы

$meta['title'] - заголовок
$meta['keywords'] - ключевые слова
$meta['meta_desc'] - ссылка пункта меню

*/
?>
<!--выводим метатеги-->
<meta charset="utf-8" />
<?php if(($table == 'articles') or ($table == 'products')) : ?>
	<title><? echo $meta['title'];?></title>
	<meta name="keywords" content="<? echo $meta['keywords'];?>" />
	<meta name="description" content="<? echo $meta['meta_desc'];?>" />
<?php elseif(($table == 'categories') || ($table == 'productcat')) : ?>
	<title><? echo $meta['catInfo']['title'];?></title>
	<meta name="keywords" content="<? echo $meta['catInfo']['keywords'];?>" />
	<meta name="description" content="<? echo $meta['catInfo']['meta_desc'];?>" />
<?php elseif($table == 'catalog') : ?>
	<title>Каталог товаров</title>
	<meta name="keywords" content="каталог, товар" />
	<meta name="description" content="каталог товаров" />
<?php endif; ?>
