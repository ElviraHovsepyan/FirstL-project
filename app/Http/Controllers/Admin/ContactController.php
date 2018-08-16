<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{

	// protected $request;
	// public function __construct(Request $request){
	// 	$this->request = $request;
	// }


    public function show(Request $request,$id=false){

    	// print_r($request->all());
    	// print_r($request->only('name'));
    	// print_r($request->except('name'));
    	// if($request->has('name')){
    		// echo '<h1 style = "margin-top:100px">'.$request->input('name','default').'</h1>';
    	// }

    	// echo '<h1 style = "margin-top:100px">'.$request->name.'</h1>';

    	// if($request->is('contact/*')){

    	// 	echo '<h1 style = "margin-top:100px">'.$request->path().'</h1>';
    	// }

    		// echo '<h1 style = "margin-top:100px">'.$request->url().'</h1>';
    		// echo '<h1 style = "margin-top:100px">'.$request->fullUrl().'</h1>';
    		// echo '<h1 style = "margin-top:100px">'.$request->method().'</h1>';
    		// echo '<h1 style = "margin-top:100px">'.$request->root().'</h1>';
    		 // echo '<h1 style = "margin-top:100px">'.$request->query('option').'</h1>';

//    		if($request->isMethod('post')){

    			// $request->flash();
    			// $request->old('name');
    			// $request->flush();      jnjum e sessianer@
    			// $request->flashOnly('name');
    			// $request->flashExcept('name');
    			// redirect()->route('contact')->withInput(); //pahum e sessianer@
//    		}


    //validation

        if($request->isMethod('post')){

            $rules = [
                'name'=>'required|max:10',
                'email'=>'required|email'
            ];

            $this->validate($request,$rules);
            dump($request->all());

        }



    	return view('default.contact',['title'=>'Contacts']);
    }
}
