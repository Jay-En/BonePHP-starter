<?php

Class Token{
	public function generate(){
		return Session::put(config::get("session/token_name"),md5(uniqid()));

	}

	public static function check($token){
		$tokenName = config::get("session/token_name");
		if(Session::exist($tokenName) && $token === Session::get($tokenName)){
			Session::delete($tokenName);
			return true;
		} 
	}
}