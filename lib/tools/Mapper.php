<?php

 Class Mapper{
 	private $_db;
 	private $_table;
 	private $_data;
 	private $_identifier;

 	private $_fields;
 	private $_errors;


 	public function __construct(){
 		$this->_table = $this->table;
 		if(!isSet($this->identifier)){
 			$this->_identifier = 'id';
 		}else{
 			 $this->_identifier = $this->identifier;
 		}
 		$this->_table = $this->table;
 		$this->_db = DB::getInstance();
 	}

 	public function create($fields = null){
 		if(!$fields){
 			$fields = $this->_fields;
 		}

 		if(!$this->_db->insert($this->_table,$fields)){
 			throw new Exception("Problem creating record in database.");
 		}
 	}

	public function find($query){
		$data = $this->_db->get($this->_table, $query);
		if($data){
			$this->_data = $data->first();
			$this->_fields = (array) $data->first();
			return true;
		}
		return false;
	}

	public function update($fields = null, $id = null){

 		if(!$fields){
 			$fields = $this->_fields;
 		}

		if(!$id){	
			$id = $this->data()->id;
		}
		unset($this->_fields[$this->_identifier]);
		$where = array($this->_identifier,'=',$id);
 		if(!$this->_db->update($this->_table,$where,$this->_fields)){
 			throw new Exception("Problem updating record in database.");
 		}
	}


	public function delete($id = null){
		if(!$id){	
			$id = $this->data()->id;
		}
		$where = array($this->_identifier,'=',$id);
 		if(!$this->_db->delete($this->_table,$where)){
 			throw new Exception("Problem updating record in database.");
 		}
	}

	public function set($data){

		foreach ($data as $key => $value) {
		 		$this->_fields[$key] = $value;
		}
		 if(isSet($this->schema)){
		 	$validate = new Validate();
			$validate->check($this->_fields,$this->schema,$this->_identifier);

		 	if(!$validate->passed()){
		 		$this->_errors = $validate->errors();
		 	}


		 }

		$this->clean();
	}
	public function clean(){
		foreach ($this->guarded as $key) {
			if(isSet($this->_fields[$key])) 
				unset($this->_fields[$key]);
		}
	}
	public function get(){
		return $this->_fields;
	}
	public function errors(){
		return $this->_errors;
	}



	public function data(){
		return $this->_data;
	}
 }