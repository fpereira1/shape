<?php

class Model {

	public $data;

	public function __construct() {
		//mysql -u peartree1 -p -h mysql.peartree.me peartreeme_live
		$link = mysql_connect('mysql.peartree.me', 'peartree1', '1q2w3e');
		// $link = mysql_connect('localhost', 'peartree1', '1q2w3e');	
		mysql_select_db('peartreeme_live');

		$this->table = strtolower(get_class($this));

	}

	public function find() {
		$sql = "SELECT * FROM $this->table";

		$query = mysql_query($sql);

		$out = array();
		while($row = @mysql_fetch_assoc($query)) {
			$out[] = $row;
		}
		return $out;
	}

	public function save() {

		$fields = implode(",", array_keys($this->data));
		$values = '';
		foreach(array_values($this->data) as $value) {
			$values .= '"' . mysql_real_escape_string($value) . '",';
		}
		$values = rtrim($values, ',');
		
		$sql = "INSERT INTO $this->table ($fields) VALUES ($values);";
		mysql_query($sql);
	}

}