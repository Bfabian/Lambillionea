<?php

namespace App\Http\Controllers;

//On charge le modèle dont le contrôleur a besoin
use App\Blog;

use Illuminate\Http\Request;

use App\Http\Requests;

class BlogController extends Controller{
    //Les derniers articles du blog
      public function liste(){ 
        $blogs = Blog::all(); 
       // var_dump($revues); die;
         
        return view('Blogs.liste',['blogs'=>$blogs]);

    }
}
