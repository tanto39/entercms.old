<?php
 
class Db{
	private $_db;
	private static $mysqli = null;
	//данные для подключения к БД
	private $db_host = 'localhost';
	private $db_user = 'tanto39';
	private $db_password = '393939';
	private $db_base = 'enterCMS';
	
	private function __construct(){
		$this->_db = @new mysqli($this->db_host, $this->db_user, $this->db_password, $this->db_base) or die('ошибка 1');
		if(!$this->_db->connect_error){
			$this->_db->query("SET NAMES 'utf8'");
		}else{exit ('ошибка 2');}
	}
	
	//создаем статический метод для вызова конструктора, он не требует создания экземпляра класса, чтобы получить статическое свойство используем self
	//создаем экземпляр класса Db внутри самого класса возвращаем статическое свойство $mysqli, это синглтон
	public static function getMysqli(){
		if(self::$mysqli == null){
			$db = new Db();
			self::$mysqli = $db->_db;
		}
			return self::$mysqli;
	}
		 
}
 
 
?>
