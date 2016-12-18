<?php 
$menu = View::$getMenu; global $uri;//получаем меню 
$parentsMenu = View::$parentsMenu; //получаем родительские пункты меню
$parentsMenuCount = count($parentsMenu); //количество родительских пунктов

/* Расшифровка массива, возвращаемого из базы

$menu[i]['title'] - заголовок пункта меню
$menu[i]['name'] - имя меню, 
$menu[i]['href'] - ссылка пункта меню
$menu[i]['parent'] - родительский пункт меню

пример $menu[0]['title'] */
?>

<ul class="<? echo View::$nameMenu; ?>">
<? if($parentsMenuCount > 0) : ?>
		<? foreach($menu as $key=>$itemMenu) : ?>
			<? foreach($parentsMenu as $parent) : ?>
				<!-- получаем корневые пункты меню -->
				<? if($parent == $itemMenu['title']) : ?>
					<li class="<? if($itemMenu['href'] == $uri){echo 'active';}else{echo 'noactive';}?>">
						<a href="<? echo $itemMenu['href']; ?>"><? echo $itemMenu['title']; ?></a>
						
						<!-- получаем вложенное меню -->
							<ul>
							<? foreach($menu as $innerMenu) : ?>
								<? if($innerMenu['parent'] == $itemMenu['title']) : ?>
									<li class="<? if($innerMenu['href'] == $uri){echo 'active';}else{echo 'noactive';}?>">
										<a href="<? echo $innerMenu['href']; ?>"><? echo $innerMenu['title']; ?></a>
									</li>
								<? endif; ?>
							<? endforeach; ?>
							</ul>
					</li>
					<? unset($menu[$key]); ?>
				<? endif; ?>
			<? endforeach; ?>
		<? endforeach; ?>
		<!--получаем оставшиеся пункты без родителей-->
		<? foreach($menu as $key=>$itemMenu) : ?>
			<? if($itemMenu['parent'] == 'first') : ?>
				<li class="<? if($itemMenu['href'] == $uri){echo 'active';}else{echo 'noactive';}?>">
					<a href="<? echo $itemMenu['href']; ?>"><? echo $itemMenu['title']; ?></a>
				</li>
			<? endif; ?>
		<? endforeach; ?>
<? else : ?>
<!--меню без подпунктов--->
	<? foreach($menu as $itemMenu) : ?>
			<li class="<? if($itemMenu['href'] == $uri){echo 'active';}else{echo 'noactive';}?>">
				<a href="<? echo $itemMenu['href']; ?>"><? echo $itemMenu['title']; ?></a>
			</li>
	<? endforeach; ?>
<? endif; ?>
	

</ul>

 

