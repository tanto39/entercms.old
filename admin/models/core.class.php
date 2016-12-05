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
	
	//метод для проверки и изменения юрл
	static function checkUri($checkUri){
		global $mysqli;
	//проверяем нет ли одинакового юрл, изменяем его
		$uriResult = $mysqli->query("SELECT uri FROM uri WHERE uri='$checkUri'");
		if($uriResult == false){
			return $checkUri;
		}else{
			return $checkUri.uniqid();
		}
		
	}
}
 
 
?>
