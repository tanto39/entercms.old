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
	<link href="temp/css/style.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="temp/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="temp/js/myscripts.js"></script>
	<!--[if IE]>
	<script type="text/javascript" src="temp/js/iehtmlfix.js"></script>
	<![endif]-->
</head>

<body>

<div class="wrapper">

	<header class="header">
    
    	<div class="logo">
        	<a href="/"><img src="temp/images/logo.png" alt="Новая территория" title="Новая территория" /></a>
        </div>
        
        <div class="top-phone">
        	<div class="block-phone">
            	<span class="title-phone">Москва:</span> <div><span class="tel-kod">8(499)</span><span class='bodyphone'> 381-57-15</span> <br><span class="tel-kod">8(499)</span><span class='bodyphone'> 381-57-16</span></div>
            </div>
            <div class="block-phone">
            	<span class="title-phone">Краснодар:</span> <div><span class="tel-kod">8(918)</span><span class='bodyphone'> 027-66-57</span> <br><span class="tel-kod">8(961)</span><span class='bodyphone'> 539-97-97</span></div>
            </div>
            
            <div class="phone-img"></div>
        </div>
        
        <div class="top-contacts">
        	<div class="top-adr">
            	<div> г. Москва, Гостиничный проезд, д. 8, корпус 1</div>
                <div>г. Краснодар, ул Гагарина 160</div>
            </div>
            <div class="top-mail">
            	novaterritoria@bk.ru
            </div>
            <div class="mail-img"></div>
        </div>
        
		<div class="topmenu">
			
			<? MenuController::route('top-menu');?>
            
            <div class="search">
				<form action="/" method="post" class="form-inline">
					<input type="hidden" name="option" value="search"/>
					<input name="query" id="mod-search-searchword" maxlength="20" class="inputbox search-query" type="text" size="20" value="Поиск..." />
					<button class="button btn btn-primary">Найти</button>	
				</form>
            </div>
		</div>
	</header><!-- .header-->
    
     <div class="slider slider2">
		<div class="sliderContent">
        	<div class="item">
				<img src="temp/images/img1.jpg" alt="Детские площадки" title="Лучшие детские площадки у нас!"/>
			</div>
            <div class="item">
				<img src="temp/images/img2.jpg" alt="Лучшие детские площадки" title="Высокое качество"/>
			</div>
		</div>
	</div>
	<div class="middle">

		<div class="container">
			<main class="content">
				<? ContentController::route($table);?>
			</main><!-- .content -->
		</div><!-- .container-->

		<aside class="left-sidebar">
			<div class="leftmenu">
				<? MenuController::route('left-menu');?>
			</div>
		</aside><!-- .left-sidebar -->

	</div><!-- .middle-->

	<footer class="footer">
    <div class="contact" itemscope itemtype="http://schema.org/LocalBusiness">
    	<div class="contact1">
					<div class="fn org" itemprop="name">Новая территория - novaterritoria.ru</div> 
                    <div class="locality" itemprop="address">г. Москва, Гостиничный проезд, д. 8, корп. 1</div>
                    <div class="locality" itemprop="address">г. Краснодар, ул Гагарина 160</div>
		</div>
        <div class="contact1">
                    <div class="but-tel">
                    	Москва: <span class="tel" itemprop="telephone">8(499)381-57-15</span>, 8(499)381-57-16
                    </div>
                    <div class="but-tel">
                    	Краснодар: <span class="tel" itemprop="telephone">8(918)027-66-57</span>, 8(961)539-97-97
                    </div>
                    <div class="email" itemprop="email">novaterritoria@bk.ru</div>
				    <div>Часы работы:
                    <span class="workhours" itemprop="openingHours">09:00 - 18:00</span></div>
        </div>
	</div>
        
        <div class="metrika"></div>
    
    
		<div class="socbuttons">
				<div class="vk">
				<!-- noindex --><a rel="nofollow" target="_blank" href="http://vkontakte.ru/share.php?url=<?php echo($myurl)?>"></a><!--/ noindex -->
				</div>
				
				<div class="twitter">
				<!-- noindex --><a rel="nofollow" target="_blank" href="http://twitter.com/intent/tweet?text=Новая%20территория:<?php echo($myurl);?>"></a><!--/ noindex -->
				</div>
				
				<div class="facebook">
				<!-- noindex --><a rel="nofollow" target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo($myurl);?>"></a><!--/ noindex -->
				</div>
				
				<div class="mail">
				<!-- noindex --><a rel="nofollow" target="_blank" href="http://connect.mail.ru/share?share_url=<?php echo($myurl);?>"></a><!--/ noindex -->
				</div>
				
				<div class="google">
				<!-- noindex --><a rel="nofollow" target="_blank" href="https://plus.google.com/share?url=<?php echo($myurl);?>"></a><!--/ noindex -->
				</div>
				
				<div class="odnoclassniki">
				<!-- noindex --><a rel="nofollow" target="_blank" href="http://www.odnoklassniki.ru/dk?st.cmd=addShare&amp;st.s=1&amp;st._surl=<?php echo($myurl);?>"></a><!--/ noindex -->
				</div>
			</div>
	</footer><!-- .footer -->

</div><!-- .wrapper -->

<div class="scroll">Наверх</div>
</body>
</html>