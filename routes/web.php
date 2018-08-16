<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('/',['as'=>'home','uses'=>'Admin\IndexController@show']);
Route:: get('/about',['as'=>'about','uses'=>'Admin\AboutController@show']);
Route::resource('test','TestController');
 



// resource controllers
// Route:: get('pages/add','Admin\CoreResource@add');
// Route:: resource('/pages','Admin\CoreResource',['only'=>['index','show']]);

// Route:: controller('/pages','PagesController'); es errora talis



//middleware
// Route::get('/',['as'=>'home','middleware'=>'mymiddle',function () {
//     return view('welcome');
// }]);



Route:: get('/articles',['uses'=>'Admin\Core@getArticles','as'=>'articles']);
// Route:: get('/article/{page}',['uses'=>'Admin\Core@getArticle','as'=>'article','middleware'=>'mymiddle']);
// Route:: get('/article/{page}',['uses'=>'Admin\Core@getArticle','as'=>'article'])->middleware(['mymiddle']);
Route:: get('/article/{id}',['middleware'=>'mymiddle:admin','uses'=>'Admin\Core@getArticle','as'=>'article'])->where('id','[0-9]+');


// Route::resource('/pages','PagesController');

Route:: match(['get','post'],'/contact/{id?}',['uses'=>'Admin\ContactController@show','as'=>'contact']);



 //groups

 Route::group(['prefix'=>'admin'],function(){

 	Route::get('page/create',function(){
 		// return redirect()->route('article',array('id'=>25));
 		$route = Route::current();
 		echo $route->getName();

 	})->name('createpage');


 	Route::get('page/edit',function(){
 		echo 'page/edit';
 	});
 });


 ///////////// You Tube API

 Route::get('/start',['uses'=>'ApiController@start','as'=>'start']);
 Route::get('/first',['uses'=>'ApiController@initClient','as'=>'initClient']);
 Route::get('/redirectData',['uses'=>'ApiController@getRedirectData','as'=>'redirect']);
 Route::get('/search',['uses'=>'ApiController@searchView','as'=>'searchView']);
 Route::post('/search',['uses'=>'ApiController@youTubeSearch','as'=>'search']);
 Route::post('/upload',['uses'=>'ApiController@upload','as'=>'upload']);







