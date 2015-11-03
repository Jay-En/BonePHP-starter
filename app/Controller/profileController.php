<?php

class profileController extends Controller{

	function renderProfile(){

		$user = new User();
		$params = array(
			"title" => "Profile",
			'error' => Session::flash('error'),
			'success' => Session::flash('success'),
			'name' => $user->data()->name,
			'username' => $user->data()->username,
			'token' => Token::generate()
			);
		$this->htmlResponse("profile.html",$params);

	}
	function updateProfile(){
			$input = Input::parse();
			if(Token::check($input['token'])){

			$user = new User();
			$user->set(array(
					'name' => $input['name'],
					'username' => $input['username']

			));

			if(!$user->errors()){
				
				$user->update();
				Session::flash('success','Successfully updated');
				Redirect::to('profile');

			}else{

			Session::flash('error',$user->errors());
			Redirect::to('profile');
			}
		}
	}

	function renderChangePassword()
	{
		$params = array(
			"title" => "Login",
			'error' => Session::flash('error'),
			'success' => Session::flash('success'),
			'token' => Token::generate()
			);
		$this->htmlResponse("changepassword.html",$params);

	}
	function changePassword(){
			$input = Input::parse();

			if(Token::check($input['token'])){

			$validate = new Validate();
			$validate->check($input,array(
						'password_current' => [
									'required' => true,
									'min' => 6
									],
						'password' => [
									'required' => true,
									'min' => 6
									],
						'password_repeat' => [
									'required' => true,
									'min' => 6,
									'matches' => 'password'
									]

			));

			if($validate->passed()){
				$user = new User();
				if(Hash::make($input['password_current'],config::get('encryption/salt')) !== $user->data()->password){
					echo "incorrent password";
				}else{
						
						$user->update(array(
								'password' => Hash::make($input['password'], config::get('ecryption/salt'))
							));
				Session::flash('success','Successfully changed password');
				Redirect::to('changepassword');
				}

			}else{

			Session::flash('error',$validate->errors());
			Redirect::to('changepassword');
			}
		}
	}




	function beforeroute()
		{

			$user = new User();

			if(!$user->isLoggedIn()){
				Redirect::to("login");
			}

	}

	function afterroute()
		{
		}
}