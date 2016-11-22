<?php
 
abstract class Core{
	
	//проверка валидности числа
	public function toInteger($data){
		$data = abs((int)$data);
		return $data;
	}
	
	//жесткая проверка валидности строки
	public function toString($data){
		$data = htmlspecialchars(stripslashes(strip_tags(trim($data))));
		return $data;
	}

	//метод для получения выборки из базы
	//static abstract function getContent($uri);
	 
}
 
 
?>
