<?php

 class contactController extends Controller{
 	function index(){
 		$user = new User();
 		if($user->hasPermission('admin')){
 			echo "Welcome admin!";
 		}else{
 			echo "Welcome ".$user->data()->name."!";
 		}
 		$this->htmlResponse("index.html", ['title'=>'JN', 
											'error' => Session::flash('error'),
											'success' => Session::flash('success')]);


 	}

 	function getByID($id){

 		$contact = Contact::find($id);
 		echo json_encode($contact);
 	}

 	function showAll(){
 		$contact = Contact::all();
 		echo json_encode($contact);
 	}

 	function create(){
 		if(Input::exist()){
 		$data=Input::parse();
 		$contact = Contact::create($data);
 		$contact->save();
 		
 		echo json_encode($contact);
 		}
 	}
 	public function edit($id)
 	{
 		if(Input::exist()){
	 		$data=Input::parse();
	 		$contact = Contact::find($id);
	 		$contact->update($data);

	 		echo json_encode($contact);
 		}
 	}
 	public function remove($id)
 	{
 		$contact = Contact::find($id);
 		$contact->delete();
 		echo json_encode($contact);
 		
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
		    // echo ' and after action';
		}


 }