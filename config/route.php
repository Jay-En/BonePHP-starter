<?php

		return [
				"/test/" => [
							[
							 "method"=>"GET", 
							 "function"=>function(){
							 	$user = new User();
							 	$user->set(array(
							 				'username' => "jnbruno",
							 				'name' => "JN"
							 			));
							 	var_dump($user->get());
							 	$user->update();
							 }
							]
					],
				"/" => [
							[
							 "method"=>"GET", 
							 "function"=>'contactController->index'
							]
					],
				"home/" => [
							[
							 "method"=>"GET", 
							 "function"=>'contactController->index'
							]
					],
				"contact/" => [
							[
							 "method"=>"GET", 
							 "function"=>'contactController->showall'
							],
							[
							 "method"=>"POST", 
							 "function"=>'contactController->create'
							]
					],
				"contact/{id}" => [
							[
							 "method"=>"GET", 
							 "function"=>'contactController->getByID'
							],
							[
							 "method"=>"PUT", 
							 "function"=>'contactController->edit'
							],

							[
							 "method"=>"DELETE", 
							 "function"=>'contactController->remove'
							]
					],



				"login/" => [
							[
							 "method"=>"GET", 
							 "function"=>'userController->renderLogin'
							],
							[
							 "method"=>"POST", 
							 "function"=>'userController->login'
							]
					],
				"logout/" => [
							[
							 "method"=>"GET", 
							 "function"=>'userController->renderLogout'
							],
							[
							 "method"=>"POST", 
							 "function"=>'userController->login'
							]
					],
				"profile/" => [
							[
							 "method"=>"GET", 
							 "function"=>'profileController->renderProfile'
							],
							[
							 "method"=>"POST", 
							 "function"=>'profileController->updateProfile'
							]
					],

				"changepassword/" => [
							[
							 "method"=>"GET", 
							 "function"=>'profileController->renderChangePassword'
							],
							[
							 "method"=>"POST", 
							 "function"=>'profileController->changePassword'
							]
					],
				"signup/" => [
							[
							 "method"=>"GET", 
							 "function"=>'userController->renderSignup'
							],
							[
							 "method"=>"POST", 
							 "function"=>'userController->signup'
							]
					]
				];