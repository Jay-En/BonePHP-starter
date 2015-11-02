<?php
Class DB{
	private static $_instance = null;

	private $_pdo,
			$_query,
			$_error = false,
			$_results,
			$_count=0;

	private function __construct(){
		try{
			$this->_pdo = new PDO("mysql:host=". config::get("mysql/host").";dbname=". config::get("mysql/database"),config::get("mysql/username"),config::get("mysql/password"));
		} catch (PDOException $e){
			die ($e->getMessage());
		}	
	}

	public static function getInstance(){
		if(!isSet(self::$_instance)){
			self::$_instance = new DB();
		}

		return self::$_instance;
	}


	public function query($sql, $params = array()){
		$this->_error = false;
		if($this->_query = $this->_pdo->prepare($sql)){
			$x = 1;
			if(count($params)){
				foreach ($params as $params) {
					$this->_query->bindValue($x, $params);
					$x++;
				}
			}
			if($this->_query->execute()){	
				$this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
				$this->_count = $this->_query->rowCount();
			}else
			{
				$this->_error = true;
			}

		}

		return $this;
	}


	public function action($action, $table, $where  = array()){
		if(count($where) === 3){
			$operators = array('=', '>','<','>=','<=');

			$field = $where[0];
			$operator = $where[1];
			$value = $where[2];


			if(in_array($operator, $operators)){
				$sql = "{$action} From {$table} Where {$field} {$operator} ?";
		
				if(!$this->query($sql,array($value))->error()){
					return $this;

				}

			}
		}
		return false;
	}


	public function insert($table, $fields = array()){
			if(count($fields)){
				$keys = array_keys($fields);
				$values = null;
				$x = 1;

				foreach ($fields as $field) {
					$values .= "?";
					if($x < count($fields)){
						$values .= ", ";
					}
					$x++;

				}

				$sql = "INSERT INTO {$table} (`". implode("`,`",$keys)."`) VALUES ({$values})";
				if(!$this->query($sql, $fields)->error()){
					return true;
				}
			}
				return false;
	}

	public function update($table,$id, $fields = array()){
			$set = "";
			$x = 1;
			foreach ($fields as $name => $value) {
				$set .=	"{$name} = ?";
				if($x < count($fields)){
					$set .= ', ';
				}
			}


			$sql = "UPDATE {$table} SET {$set} WHERE id = {$id}";

			if(!$this->query($sql, $fields)->error()){
					return true;
			}
				return false;
	}

	public function get($table,$where){
		return $this->action('SELECT *', $table, $where);
	}

	public function delete($table,$where){
		return $this->action('DELETE', $table, $where);
	}


	public function error(){
		return $this->_error;
	}



	public function result(){
		return $this->_results;
	}

	public function first(){
		return $this->_results[0];
	}

	public function count(){
		return $this->_error;
	}
}