<?php

require_once("Helper.php");

class database {	
	private $ip, $uname, $upass, $dbName, $handle;

	public function __construct() {
		$this->ip = "localhost";
		$this->uname = "team431";
		$this->upass = "password";
		$this->dbName = "TheNile";
		$this->handle = NULL;
	}

	public function open() {
		if(is_null($this->handle)) {
			$this->handle=new mysqli($this->ip,$this->uname,$this->upass,$this->dbName);
			if(mysqli_connect_errno()) {
				logMsg("Error opening connection to MySQL database", $lvl = LVL_ERROR);
				return false;
			}
			return true;
		}
		return "Already open";
	}

	public function getError() {
		if(!is_null($this->handle))
			return $this->handle->error;
		return FALSE;
	}

	public function close() {
		if(!is_null($this->handle))
			$this->handle->close();
		$this->handle = NULL;
		return true;
	}

	public function last_insert_id() {
		if(!is_null($this->handle))
			return $this->handle->insert_id;
	}

	public function real_escape_string($str) {
		$close = false;
		if(is_null($this->handle)) {
			$this->open();
			$close = true;
		}
		$ret = $this->handle->real_escape_string($str);
		if($close)
			$this->close();
		return $ret;
	}

	public function query($q) {
		// echo($q);
		$close = false;
		if(is_null($this->handle)) {
			$this->open();
			$close = true;
		}
		$ret = $this->handle->query($q);
		if($close)
			$this->close();
		return $ret;
	}

	public function createDB() {
		if(!is_null($this->handle)) {
			$this->handle=new mysqli($ip,$uname,$pass);
			if(mysqli_connect_errno()) {
				logMsg("Error opening connection to MySQL database", $lvl = LVL_ERROR);
				return false;
			}
		}
		$this->query("CREATE DATABASE " . $this->dbName . ";");
		$this->close();
	}
}

?>




