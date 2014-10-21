<?php
//
//    PostgreSQL Database Abstraction Layer
//

class postgres {
	var $pg_connect_id;
	// _pg_connect($host, $username, $password, $database, $port)
	public function _pg_connect($host, $username, $password, $database, $port = false) {
		$connection_string = '';
		if($host)
			$connection_string .= "user=$username ";
		if($password)
			$connection_string .= "password=$password ";
		if($host) {
			$connection_string .= "host=$host ";
			if($port)
				$connection_string .= "port=$port ";
		}
		if($database)
			$connection_string .= "dbname=$database ";
		if(!function_exists('pg_connect'))
			return false;
		$this->pg_connect_id = pg_connect($connection_string);
		return ($this->pg_connect_id) ? true : false;
	}
	//INSERT, UPDATE, DELETE
	public function _pg_transaction($status) {
		switch($status) {
			case 'begin':
				return @pg_query($this->pg_connect_id, 'BEGIN');
			break;
			case 'commit':
				return @pg_query($this->pg_connect_id, 'COMMIT');
			break;
			case 'rollback':
				return @pg_query($this->pg_connect_id, 'ROLLBACK');
			break;
		}
		return true;
	}
	public function _pg_fetch_row($result) {
		return @pg_fetch_row($this->pg_connect_id, $query);
	}
	public function _pg_fetch_all($result) {
		return @pg_fetch_all($result);
	}
	public function _pg_num_rows($result) {
		return @pg_num_rows($result);
	}
	// _pg_query($query, $arg1 .. $argn)
	public function _pg_query($query) {
		if(func_num_args() == 1)
			return pg_query($this->pg_connect_id, $query);
		else {
			$args = func_get_args();
			$params = array_splice($args, 1);
			print $this->_pg_debug($query, $params);
			return pg_query_params($this->pg_connect_id, $query, $params);
		}
	}
	// _pg_real_escape($string)
	public function _pg_real_escape($string) {
		return @pg_escape_string($this->pg_connect_id, $string);
	}
	// _pg_string_literal($string)
	public function _pg_string_literal($string) {
		return @pg_string_literal($this->pg_connect_id, $string);
	}
	// _pg_close()
	public function _pg_close() {
		if(!$this->pg_connect_id)
			return false;
		if(@pg_close($this->pg_connect_id))
			$this->pg_connect_id = false;
	}
	// _pg_debug($arg1..$argn)
	function _pg_debug($query, $params) {
		echo preg_replace_callback('/\$(\d+)\b/', function($match) use ($params) {
			$key = ($match[1] - 1);
			return(is_null($params[$key]) ? 'NULL' : @pg_escape_literal($this->pg_connect_id, $params[$key]));
		}, $query);
	}
}
?>
