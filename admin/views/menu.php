<?php $menu = MenuController::getView(MenuController::$name); global $uri;//получаем меню ?>
<!-- Расшифровка массива, возвращаемого из базы

$menu[i]['title'] - заголовок пункта меню
$menu[i]['name'] - имя меню, 
$menu[i]['href'] - ссылка пункта меню
$menu[i]['parent'] - родительский пункт меню
$menu[i]['has_child'] - наличие вложенных пунктов 0-нет, 1-да

пример $menu[0]['title']
-->

<ul class="<? MenuController::$name?>">
	<? foreach($menu as $itemMenu) : ?>
		<!-- получаем корневые пункты меню -->
		<? if($itemMenu['parent'] == 'first') : ?>
			<li class="<? if($itemMenu['href'] == $uri){echo 'active';}else{echo 'noactive';}?>">
				<a href="<? echo $itemMenu['href']; ?>"><? echo $itemMenu['title']; ?></a>
				
				<!-- получаем вложенное меню -->
				<? if($itemMenu['has_child'] == 1) : ?>
					<ul>
					<? foreach($menu as $innerMenu) : ?>
						<? if($innerMenu['parent'] == $itemMenu['title']) : ?>
							<li class="<? if($innerMenu['href'] == $uri){echo 'active';}else{echo 'noactive';}?>">
								<a href="<? echo $innerMenu['href']; ?>"><? echo $innerMenu['title']; ?></a>
							</li>
						<? endif; ?>
					<? endforeach; ?>
					</ul>
				<? endif; ?>
				
			</li>
		<? endif; ?>
	<? endforeach; ?>
</ul>

 

