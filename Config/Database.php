<?php

// Class database (koneksi database)
class Database
{

	// Property
	var $host = "sql3.freesqldatabase.com";
	var $uname = "sql3439638";
	var $pass = "Lk1UEkZBvU";
	var $db = "sql3439638";
	var $connection;

	// Method koneksi kedalam database
	function Connect()
	{
		$this->connection = mysqli_connect($this->host, $this->uname, $this->pass, $this->db);
		return $this->connection;
	}
}
