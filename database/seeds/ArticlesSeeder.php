<?php

use Illuminate\Database\Seeder;
use App\Article;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//1
        DB::insert("INSERT INTO articles (`name`, `text`,`img`) VALUES (?,?,?)",
        	[

        		'blog post',
        		'<p>jdscnsjncd csdncjdc sdcnjdsfcn cnsdkjcdnv sndcfkjdsnfckjd</p>',
        		'pic1.jpg'

        	]);
        //2
        DB::table('articles')->insert([

        		[
        			'name'=>'blog post2',
        			'text'=>'<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>',
					'img'=>'pic2.jpg'
        		],
        		[
        			'name'=>'blog post3',
        			'text'=>'<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim ve
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>',
					'img'=>'pic3.jpg'
        		]

        ]);

        //3

        Article::create([
        	'name'=>'blog post4',
        	'text'=>'<p>Hello World!</p>',
			'img'=>'pic4.jpg'
        ]);

    }
}


