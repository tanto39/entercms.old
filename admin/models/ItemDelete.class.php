<?php
 
class ItemDelete extends Core{

function __construct(){}

//удаляем из базы
static function deleteContent($id, $type){
	global $mysqli;
	//подготовленный запрос
	if($type=='articles'){$stmt = $mysqli->prepare("DELETE FROM articles WHERE id = ?") or die('Ошибка удаления');}
	if($type=='product'){$stmt = $mysqli->prepare("DELETE FROM products WHERE id = ?") or die('Ошибка удаления');}
	if($type=='category'){$stmt = $mysqli->prepare("DELETE FROM categories WHERE id = ?") or die('Ошибка удаления');}
	if($type=='categoriesProduct'){$stmt = $mysqli->prepare("DELETE FROM productcat WHERE id = ?") or die('Ошибка удаления');}
	if($type=='itemMenu'){$stmt = $mysqli->prepare("DELETE FROM menu WHERE id = ?") or die('Ошибка удаления');}
	if($type=='menu'){$stmt = $mysqli->prepare("DELETE FROM menus WHERE id = ?") or die('Ошибка удаления');}
	
	$stmt->bind_param("s", $id) or die('Ошибка b');
	$stmt->execute() or die('Ошибка e');
	$stmt->close();
	
}

}
 
 
?>
