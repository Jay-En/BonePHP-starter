<?php

		return 	[ 
					"base_url" =>	"http://jnbruno.ml/bonephp/",
		
					"mysql"		=>	[
										'driver'    => 'mysql',
										'host'      => 'localhost',
										'database'  => 'test',
										'username'  => 'root',
										'password'  => 'P@ssword123',
										'charset'   => 'utf8',
										'collation' => 'utf8_unicode_ci',
										'prefix'    => ''
									],
				    "autoload" => 	[
					    				"app/Controller",
					    				"app/Model"
				    			  	],
				    "cookie" => 	[
				    					"name" => "hash",
				    					"expiry" => 604800
				    			  	],
				    "session" => 	[
				    					"session_name" => "user",
				    					"token_name" => "token"
				    			  	],
				    "encryption"    => [
				    				"hash" => "JustArandomTextWeCanPutHere"
				    			]

				];
