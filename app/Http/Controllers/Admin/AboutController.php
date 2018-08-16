<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use DB;
class AboutController extends Controller
{
    public function show(){

    	if(view()->exists('default.about')){

    		// return view('default.about')->withTitle('Hello!');

    	

    	// $view = view('default.about')->withTitle('Hello World!')->render();

    	// return(new Response($view))->header('Content-Type','newType');

    	// return response()->json(['name'=>'hello','name1'=>'hello1']);


    	// return response()->view('default.about',['title'=>'hello']);

    	// return response()->download('robots.txt','myfile.txt');

    	// return response()->withHeadres(['header1'=>'cxshjcbcdhs']);

    	

    	// return redirect('/articles');
    	// return redirectResponse::create('/articles');

    	// return redirect('/articles')->withInput();  //tvyalner@ pahum e sessiayi mej

    	// return redirect()->route('home');

    	// return redirect()->action('Admin\ContactController@show');

    	// return redirect('/articles')->with('param1','hello');  // sessiayi mej e pahum



        // $articles = DB::select("SELECT * FROM `articles` WHERE id = ?",[1]);

        // $articles = DB::select("SELECT * FROM `articles`");
        // dump($articles);    //dd() dump+die


        // DB::insert("INSERT INTO articles (`name`,`text`,`img`) VALUES (?, ?, ?)",['name7','text7','img7']);
        // $result = DB::connection()->getPdo()->lastInsertId();
        // dump($result);


        // $result = DB::update("UPDATE articles SET `name`= ? WHERE `id` = ? ",['test2',14]);
        // dump($result);

        // $result = DB::delete("DELETE FROM `articles` WHERE `id`= ? ",[14]);
        // dump($result);

         // DB::statement('DROP table `articles`');   

        return view('default.about')->withTitle('Hello World!');




    	}
    	abort(404);
    }
}
