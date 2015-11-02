<?php

	Class User extends Mapper{
		
		private $_sessionName;
		private $_cookieName;
		private $_salt;
		private $_isLoggedIn;
		protected $table='users';
		protected $identifier='id';
		protected $guarded=array('password');
		protected $schema=[
								'username' => [
											'required' => true,
											'min' => 5,
											'max' => 20,
											'unique' => 'users'
											],
								'name' => [
											'required' => true,
											'min' => 2,
											'max' => 50
										],
								'password' => [
											'required' => true,
											'min' => 6
							]];
		

		public function __construct($user=null)
		{
			parent::__construct("users");


			$this->_salt = config::get('encryption/salt');
			$this->_sessionName = config::get('session/session_name');
			$this->_cookieName = config::get('cookie/name');
			if(!$user){
				if(Session::exist($this->_sessionName)){
					$user = Session::get($this->_sessionName);
					
					if($this->find(['id','=',$user])){
						$this->_isLoggedIn = true;
					}
				}
			}else{
				$this->find(['id','=',$user]);
			}
		}

		public function login ($username = null , $password = null, $remember = false){
			if(!$username && !$password && $this->exists()){
				Session::put($this->_sessionName, $this->data()->id);
			}else{
				$user = $this->find(array('username','=',$username));
				if($user){
					if($this->data()->password === Hash::make($password, $this->_salt)){
						Session::put($this->_sessionName, $this->data()->id);

						if($remember){
							$db = DB::getInstance();
							$hash = Hash::unique();
							$hashCheck = $db->get('users_session', array('user_id','=',$this->data()->id));
							if(!$hashCheck->count()){
								$db->insert('users_session',array(
									'user_id' => $this->data()->id,
									'hash' => $hash
									));

							}else{
								$hash = $hashCheck->first()-hash;
							}
							Cookie::put($this->_cookieName,$hash);
						}
						return true;
					}
				}

			}
			return false;
		}

		public function isLoggedIn(){
			return $this->_isLoggedIn;
		}

		public function logout(){
			$db = DB::getInstance()->delete('users_session',array('user_id','=',$this->data()->id));
			Session::delete($this->_sessionName);
			Cookie::delete($this->_cookieName);
		}

		public function exists(){
			$data = $this->data();
			return (!empty($data)) ? true : false;
		}


		public function hasPermission($key){
			$group = DB::getInstance()->get('groups',array('id','=',$this->data()->group_id));
			if($group->count()){
				$permissions = json_decode($group->first()->permission, true);
				if(isSet($permissions[$key])){

					if($permissions[$key] == true){

						return true;
					} 
				}	
			}
		
			return false;

		}
	}