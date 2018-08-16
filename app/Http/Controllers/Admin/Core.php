<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Article;
use App\Country;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class Core extends Controller
{
	public function __construct(){
		// $this->middleware('mymiddle');
	}

    /**
     *
     */
    public function getArticles(){

   	// $articles = DB::table('articles')->get();
   	// $articles = DB::table('articles')->first();  //nuyn@ limit 1 -ov
   	// $articles = DB::table('articles')->value('name');  //nuyn@ limit 1 -ov u mi dasht@
   	// $articles = DB::table('articles')->pluck('name');  //bolor name-er@
   	// $articles = DB::table('articles')->count();
   	// $articles = DB::table('articles')->max('id');  //tvyal dashti max-@

   	// $articles = DB::table('articles')->select('name','text','id')->get();
   	// $articles = DB::table('articles')->distinct()->select('name')->get();


    // $query = DB::table('articles')->select('name');
   	// $articles = $query->addSelect('text')->get();


//	$articles = $query->DB::table('articles')->select('name')->where('id','=',5);
//  $articles = DB::table('articles')->whereBetween('id',[1,5])->get();
//  $articles = DB::table('articles')->whereNotBetween('id',[1,5])->get();
//  $articles = DB::table('articles')->whereNotIn('id',[1,5])->get();

//    $articles = DB::table('articles')->take(4)->get(); //limit
    // insert, insetrGetID, update,join,increment
//        dump($articles);



//        $articles = DB::table('articles')->get();




        //model

//    $articles = Article::all();

//    foreach($articles as $article){
//        echo $article->name.'<br>';
//    }

//        $article = Article::where('id','>','3')->orderBy('name')->take(2)->get();

//        $article = Article::find(4);  //man e galis id-ov, kareli e massiv poxancel


//        $article = Article::where('id',4)->first(); //nuyn@ constructor-ov
//        echo $article->text;


//        $article = Article::findOrFail(2);


        //insert
//        $article = new Article;
//        $article->name = 'New Article';
//        $article->text = 'New Text';
//        $article->img = 'New Img';
//
//        $article->save();
//        $article = $article->all();



        //update
//        $article = Article::find(16);
//        $article->name = 'Second Name';
//        $article->text = 'Second Text';
//        $article->img = 'Second Img';
//        $article->save();



    // insert, model-um petqa avelacnel tuylatrvac dashter@
//    Article::create([
//        'name'=>'firstName',
//        'text'=>'cgbxhsc',
//        'img'=>'pic777'
//    ]);



//       $article = Article::firstOrCreate([
//            'name'=>'firstName',
//            'text'=>'cgbxhsc',
//            'img'=>'pic777'
//        ]);


        // firstOrNew


        //delete
//        $article = Article::find(22);
//        $article->delete();

//        Article::destroy(21);
//        Article::destroy([20,19]);

//        Article::where('id','>',16)->delete();


        // soft delete
//        $article = Article::find(13);
//        $article->delete();



//        $articles = Article::withTrashed()->get();
//        foreach($articles as $article){
//            if($article->trashed()){
//                echo $article->id.'<br>';
//                $article->restore();
//                echo $article->id.'not deleted<br>';
//            }
//        }

//        $articles = Article::withTrashed()->restore();
//        $articles = Article::onlyTrashed()->restore();

//        $article = Article::find(4);
//        $article->forceDelete();
//        dump($article);
//       return;


        //relations
        //One To One

//        $user = User::find(1);
//        dump($user->country);
//        return;


//        $country = Country::find(1);
//        dump($country->user);
//        return;


        //relations
        //One To Many

//        $user = User::find(1);


//        $articles = $user->articles;
//        foreach($articles as $article){
//            echo $article->name.'<br>';
//        }


//        $articles = $user->articles()->where('id',16)->first();
//        $articles = $user->articles()->where('id','>',13)->get();


//        $article = Article::find(13);
//        dump($article->user->name);
//        return;


        //relations
        //Many To Many

//        $user = User::find(1);

//        foreach($user->roles as $role){
//            echo $role->name.'<br>';
//        }

//        $role = $user->roles()->where('roles.id',2)->first();
//        dump($role);


//        $role = Role::find(1);
//        dump($role->users);

        //end




//        $articles = Article::with('user')->get();
//        foreach($articles as $article){
//            echo $article->user->name;
//        }

//        $articles = Article::all();
//        $articles->load('user');
//        foreach($articles as $article){
//            echo $article->user->name;
//       }


        // add new data
       $user = User::find(1);

       //1
//        $article = new Article([
//
//            'name'=>'New Article',
//            'text'=>'Some Text'
//
//        ]);
//
//        $user->articles()->save($article);
//
        //2
//        $user->articles()->create([
//
//                'name'=>'New Article1',
//                'text'=>'Some Text1'
//        ]);
//        $articles = Article::all();

        //3

//        $user->articles()->saveMany([
//            new Article(['name'=>'New Article2','text'=>'Some Text2']),
//            new Article(['name'=>'New Article3','text'=>'Some Text3'])
//
//        ]);

//        $role = new Role(['name'=>'guest']);
//        $user->roles()->save($role);

//        $user->articles()->where('id',13)->update(['name'=>'some text']);




        // urok 24
//        $country = Country::find(1);
//        $user = User::find(2);
//
//        $country->user()->associate($user);
//        $country->save();


//        $articles = Article::all();
//        $user = User::find(2);
//    foreach($articles as $article){
//        $article->user()->associate($user);
//        $article->save();
//    }

        $user = User::find(2);
        $role_id = User::find(2);
        $user->roles()->attach($role_id);
        $user->roles()->detach($role_id);  //hakarak@



//    dump($articles);
        return;
   }
   public function getArticle($page){
   	echo $page;
   }

}
