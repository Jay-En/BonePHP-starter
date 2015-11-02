<?php
	Class Redirect{
		public function toUrl($location=null){
			if($location){
				header('Location: '.$location);
				exit();
			}

		}
		public function to($location=null){
			if($location){
				header('Location: '.config::get('base_url').$location);
				exit();
			}

		}
	}


	