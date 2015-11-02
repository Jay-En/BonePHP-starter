<?php 

Class Validate {
	private $_passed = false,
			$_errors = array(),
			$_db = null;

	public function __construct (){
		$this->_db = DB::getInstance();
	}

	public function check($source, $items = array(), $primarykey=null){
		foreach ($items as $item => $rules) {
			foreach ($rules as $rule => $rule_value) {
				$value = $source[$item];

				if($rule === 'required' && empty($value)){
					$this->addError("{$item} is required");
				}elseif(!empty($value)){
					switch ($rule) {
						case 'min':
							if(strlen($value)<$rule_value)
								$this->addError("{$item} must be a minimum of {$rule_value}");
							break;
						case 'max':
							if(strlen($value)>$rule_value)
								$this->addError("{$item} must be a maximum of {$rule_value}");
							break;
						case 'matches':
							if($value != $source[$rule_value]){
								$this->addError("{$item} must match {$rule_value}");
							}
							break;
						case 'unique':
						if(!$primarykey){
							$primarykey = 'id';
						}
								$check = $this->_db->get($rule_value, array($item,"=",$value));
								
								if($check->count()){

									if(!isSet($source[$primarykey])){
										$this->addError("{$item} already exist");
									}else
									{
									$result = (array) $check->first();
									if($source[$primarykey] !== $result[$primarykey]){
										$this->addError("{$item} already exist");
									}
									}
								}
						
							break;
						
						default:
							break;
					}
				}
			}
		
		}

		if(empty($this->_errors)){
			$this->_passed = true;
		}

		return $this;
	}

	private function addError($error){
		return $this->_errors[] = $error;
	}

	public function errors(){
		return $this->_errors;
	}
	public function passed(){
		return $this->_passed;
	}
}