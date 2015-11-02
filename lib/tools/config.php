<?php

	Class config{

		function get($path=null){
			if($path){
				$config = $GLOBALS['config'];
				$path = explode('/', $path);
				foreach ($path as $bit) {
					if(isSet($config[$bit])){
						$config = $config[$bit];
					}else{
               			$config=false;
					}
				}
			}

			return $config;
		}
	}