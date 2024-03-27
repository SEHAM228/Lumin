<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\category; 

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

     
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     public function showCheckMailView()
    {
        return view('checkMail'); // Assurez-vous que 'checkMail' correspond au nom de votre vue
    }
    public function index()
    {
      $posts= Post::published()->latest()->paginate(4);
      $postsPremium= Post::published()->premium()->latest()->get();
      return view('home')->with([
        'posts' => $posts,
        'postsPremium' => $postsPremium
    ]);
    }
    
    public function postsBycategory(Category $category){
        return view('home')->with([
            'posts' => $category->posts()->paginate(10),
            'category' => $category
        ]);
    }
    public function postsByTag(Tag $tag){
        return view('home')->with([
            'posts' => $tag->posts()->paginate(10),
            'tag' => $tag
        ]);
    }
    public function SearchByTerm(Request $request){
        $posts = Post::orderBy('created_at','desc')->where('title_en','like', '%'.$request->term.'%')->published()->get();
        return response()->json($posts);
    }
   
}
