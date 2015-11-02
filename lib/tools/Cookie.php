<?php
	CLass Cookie {
		public static function exists($name){
			return (isSet($_COOKIE[$name])) ? true : false;
		}

		public static function get($name){
			return $_COOKIE[$name];
		}

		public static function put($name, $value, $expiry=null){
			if(!$expiry) $expiry=config::get('cookie/expiry');
			if(setcookie($name, $value, time()+$expiry,'/')){
				return true;
			}
		return false;
		}

		public static function delete($name){
			self::put($name,'',time()-1);
		}
	}