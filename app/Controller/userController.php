<?php


class userController extends Controller{
	function renderLogin(){

		$params = array(
			"title" => "Login",
			'error' => Session::flash('error'),
			'success' => Session::flash('login'),
			'token' => Token::generate()
			);
		$this->htmlResponse("login.html",$params);
	}
	function login(){
		$input = Input::parse();
		if(Token::check($input['token'])){

		}

		$validate = new Validate();
		$validate->check($input,array(
					'username' => [
								'required' => true
								],
					'password' => [
								'required' => true
							]

		));
		if($validate->passed()){
			$user = new User();
			$remember = ($input['remember'] === 'on') ? true : false; 
			$login = $user->login($input['username'],$input['password'],$remember);
			if($login){
				Redirect::to("home");
			}else{
			Session::flash('error',array('Invalid credentials!'));
			Redirect::to('login');
			}

		}else
		{
			Session::flash('error',$validate->errors());
			Redirect::to('login');
		}
	}
	function renderSignup(){

		Token::generate();
		$this->htmlResponse("register.html",array(
							"title" => "Sign Up",
							'error' => Session::flash('error'),
							"token" => Token::generate()
			));

		
	}
	function signup(){
		$input = Input::parse();
		if(Token::check($input['token'])){
		$validate = new Validate();
		$validate->check($input,array(
					'username' => [
								'required' => true,
								'min' => 5,
								'max' => 20,
								'unique' => 'users'
								],
					'name' => [
								'required' => true,
								'max' => 50
							],
					'password' => [
								'required' => true,
								'min' => 6
							]

		));


		if($validate->passed()){

			$user = new User();
			$salt = config::get("encription/hash");

			try{
				$user->create(array(
						'username' => $input['username'],
						'password' => Hash::make($input['password']),
						'name' => $input['name'],
						'joined' => date('Y-m-d H:i:s'),
						'group_id' => 1
					));
			}catch (Exception $e){
				die($e->getMessage());
			}

			Session::flash('login','You registered successfully! Please login!');
			Redirect::to('login');
		}else
		{
			Session::flash('error',$validate->errors());
			Redirect::to('signup');
		}
		}else{
			echo "Invalid token";
		}
	}


	function renderLogout(){
		$user = new User();

		$user->logout();
		Redirect::to("login");
	}

		function beforeroute()
		{
			
			if(Cookie::exists(config::get('cookie/name')) && !Session::exist(config::get('session/session_name'))){
				$hash = Cookie::get(config::get('cookie/name'));
				$hashCheck = DB::getInstance()->get('users_session',array('hash','=',$hash));

				if($hashCheck->count()){
					$user = new User($hashCheck->first()->user_id);
					$user->login();
					Redirect::to('home');
				}
			}
		}
}