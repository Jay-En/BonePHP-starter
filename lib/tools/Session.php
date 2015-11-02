<?php
	if(!isset($_SESSION)) 
				 	{ 
				 		session_start(); 
				 	}
	Class Session {
		public static function put($name, $value){
			return $_SESSION[$name] = $value;
		}

		public function exist($name)
		{
			return (isSet($_SESSION[$name])) ? true : false;
		}

		public static function delete($name){
			if(self::exist($name)){
				unset($_SESSION[$name]);
			}
		}

		public static function get($name){
			return $_SESSION[$name];
		}

		public static function flash($name, $string=""){
			if($string){
				self::put($name,$string);
			}else{
			if(self::exist($name)){
				$session = self::get($name);
				self::delete($name);
				return $session;
			}
				
			}
		}
	}