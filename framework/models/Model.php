<?php

class Model {

	public $data;

	public function __construct() {

		$link = mysql_connect(
			get_config('db.host'),
			get_config('db.user'),
			get_config('db.pass')
		);

		mysql_select_db(get_config('db.name'));

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