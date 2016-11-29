<?php
 
class Uri{

function __construct(){}

static function getContent($uri){
	global $mysqli;
	//получаем имя таблицы, содержащей uri
	$result = $mysqli->query("SELECT table_name FROM uri WHERE uri = '$uri'");
	$table = $result->fetch_assoc();
	return $table['table_name'];
}


}
 
 
?>
