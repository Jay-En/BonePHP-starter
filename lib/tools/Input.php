<?php
	Class Input {
		public static function exist(){
			
					return (!($GLOBALS['config']['body']=="")) ? true : false;
		}

		public static function parse(){

        $head=getallheaders();
        $body=$GLOBALS['config']['body'];
        if($body=="")  Bone::error(400,['Invalid Request Body']);
        switch (true) {
            case (strpos($head['Content-Type'],'application/json')!==false):
                $input=(array)json_decode($body);
                break;
            case (strpos($head['Content-Type'],'application/x-www-form-urlencoded')!==false):
                 parse_str($body,$input);
                break;
            default:
                 parse_str($body,$input);
                break;
        }


        return $input;

	}
}