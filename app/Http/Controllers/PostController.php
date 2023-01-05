<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Provider2;
use Illuminate\Http\Request;

class PostController extends Controller
{
     public function index() {
        
        $title = '';
        if(request('category')){
        $category = Category::firstwhere('slug', request('category'));
        $title = 'in' . $category->name; 
        }

        $title = '';
        if(request('user')) {
            $user = User::firstwhere('username', request('user'));
            $title = 'in' . $user->name;
        }
        
         $title = '';
         if(request('city')) {
             $city = City::firstwhere('slug', request('city'));
             $title = 'in' . $city->name;
         }
         $title = '';
         if(request('provider2')) {
             $provider2 = Provider2::firstwhere('slug', request('provider2'));
             $title = 'in' . $provider2->name;
         }

        return view('posts', [
            "title" => "Posts",
             "active" => "posts",
            "posts" => Post::latest()->filter(request(['search','category','user','city','provider2']))->
            paginate(12)->withQueryString()
        ]);
    }

    public function show(Post $post) 
    {
        return view('post', [
            "title" => " single post",
            "active" => "posts",
            "post" => $post
        ]);
    }
}
