<?php
//главный контроллер, от него создаются остальные контроллеры. Здесь контроллеры нужны для подключения нужных файлов представления через get запрос

abstract class Controller{
	function __construct(){}
	

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

}
	
	
?>
