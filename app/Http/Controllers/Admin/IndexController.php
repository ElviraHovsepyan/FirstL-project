<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function show(){

        // popoxakanneri poxancum@ view-in

    	// $data=array('title'=>'Hello World!');
    	// return view('default.Template',$data);


    	// return view('default.Template')->with('title','hello2');


    	// $view = view('default.Template');
    	// $view->with('title','Hello3');
    	// $view->with('title2','Hello4');
    	// return $view;

        // return $view->withTitle('Hello5');

    	$array = array(
    			'title'=>'Laravel Project',
    			'data'=>[
    				'one'=>'List 1',
    				'two'=>'List 2',
    				'three'=>'List 3',
    				'four'=>'List 4',
    				'five'=>'List 5'

    			],
    			'dataI'=>['List 1','List 2','List 3','List 4','List 5'],
    			'bvar'=>true,
    			'script'=>"<script>alert('hello')</script>"

    	);

    	
    	if(view()->exists('default.index')){


    		// $path=config('view.paths');
    		// return view()->file($path[0].'/default/Template.php')->withTitle('Hello World!');



            // view()->name('default.Template','myview');
            // return view()->of('myview')->withTitle('Hello World!');

            

    		// $view = view('default.index',['title'=>'Hello World!'])->render();
    		// echo $view;
    		// return;

    		return view('default.index',$array);

    		// return view('default.Template')->withTitle('Hello World!');

    	}
    	abort(404);
    }
}
