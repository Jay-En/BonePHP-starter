<?php

use Illuminate\Database\Capsule\Manager as Capsule;  

class eloquent{
	function start($db){
	$capsule = new Capsule; 

    $capsule->addConnection($db);

    $capsule->bootEloquent();
	}
}