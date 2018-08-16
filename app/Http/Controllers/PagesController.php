<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function getIndex(){
    	echo __METHOD__;
    	Article::where('id',1)->get();
    }
}


