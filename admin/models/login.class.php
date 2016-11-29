<?php
 
class Login extends Core{
	
function __construct(){}

//получаем материал
static function getLogin($auth){
	global $mysqli;
	
	//подготовленный запрос
	$stmt = $mysqli->prepare("SELECT name, hash FROM users WHERE name = ? AND hash = ?") or die('Ошибка авторизации');
	$stmt->bind_param("ss", $auth['name'], $auth['hash']) or die('Ошибка b');
	$stmt->execute() or die('Ошибка e');
	$result = $stmt->get_result() or die('Ошибка r');
	$stmt->close();
	
	$bdAuth = $result->fetch_assoc();
	//возвращаем логин и пароль
	return $bdAuth;
}
	
}
 
 
?>
