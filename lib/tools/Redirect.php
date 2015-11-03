<?php
	Class Redirect{
		public static function toUrl($location=null){
			if($location){
				header('Location: '.$location);
				exit();
			}

		}
		public static function to($location=null){
			if($location){
				header('Location: '.config::get('base_url').$location);
				exit();
			}

		}
	}


	