<?php

namespace App\Http\Controllers;

use App\Models\post;

use App\Http\Requests\StorepostRequest;
use App\Http\Requests\UpdatepostRequest;
use App\Models\tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Facades\App\Repository\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   

    /**
     * Show the form for creating a new resource.
     */

     
    public function create()
    {
        //
        return view('admin.posts.create')->with([
            'tags' => tag::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorepostRequest $request)
    {
        //
        if($request->validated()){
            $data = $request->except('_token');
            $file = $request->file('photo');
            $image_name = time().'_'.'photo'.'_'.$file->getClientOriginalName();
            $file->move('uploads', $image_name);
            $data['photo'] = 'uploads/'.$image_name;
            $data['slug'] = Str::slug($request->title_en);
            $data['user_id'] = auth()->user()->id;
            $post = Post::create($data);
            $post->tags()->sync($request->tags);
            return redirect()->route('posts.myposts')->with([
                'success' => 'Post added successfully'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(post $post)
    {
        //
        return view('posts.show')->with([
            'post' => $post
        ]);
    }
    public function getPostAuthor($post_id)
    {
        $post = Post::with('user')->find($post_id); // Supposant que la relation avec l'auteur est nommée "author"

        if (!$post) {
            return response()->json(['message' => 'Post not found'], 404);
        }

        return response()->json($post->user);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(post $post)
    {
        //
        return view('admin.posts.edit')->with([
            'tags' => tag::all(),
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatepostRequest $request, post $post)
    {
        //
        if($request->validated()){
            $data = $request->except('_token');
            if(Storage::exists($post->photo)) {
                Storage::delete($post->photo);
            }
                    $file = $request->file('photo');
                    $image_name = time().'_'.'photo'.'_'.$file->getClientOriginalName();
                    $file->move('uploads', $image_name);
                    $data['photo'] = 'uploads/'.$image_name;
        }
            $data['slug'] = Str::slug($request->title_en);
            $data['user_id'] = auth()->user()->id;
            $post->update($data);
            $post->tags()->sync($request->tags);
            return redirect()->route('posts.myposts')->with([
                'success' => 'Post updated successfully'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
        if(Storage::exists($post->photo)) {
            Storage::delete($post->photo);
        }
        $post->delete();
        return redirect()->route('posts.myposts')->with([
            'success' => 'Post deleted successfully'
        ]);
    }
    public function index()
    {
        $posts = post::latest()->paginate(10);
        return view('admin.posts.index')->with([
            'posts' => $posts
        ]);
    }
   
    public function getlike(Request $request)
    {
        $post = Post::find($request->post);
        return response()->json([
            'post'=>$post,
        ]);
    }
    public function like(Request $request)
    {
        $post = Post::find($request->post);
        $value = $post->like;
        $post->like = $value+1;
        $post->save();
        return response()->json([
            'message'=>'',
        ]);
    }    
    public function getDislike(Request $request)
    {
        $post = Post::find($request->post);
        return response()->json([
            'post'=>$post,
        ]);
    }
    public function dislike(Request $request)
    {
        $post = Post::find($request->post);
        $value = $post->dislike;
        $post->dislike = $value+1;
        $post->save();
        return response()->json([
            'message'=>'',
        ]);
    }
    public function togglePublished(Post $post){
        $post->update([
            'published' => !$post->published
        ]);
        return redirect()->route('posts.index')->with([
            'sucess' => 'post updated successfully'
        ]);

    }
    public function togglePremium(Post $post){
        $post->update([
            'premium' => !$post->premium
        ]);
        return redirect()->route('posts.index')->with([
            'sucess' => 'post updated successfully'
        ]);

    }
    public function myposts()
{
    // Get the currently authenticated user's ID
    $userId = Auth::id();

    // Retrieve posts published by the user with the given ID
    $posts = Post::where('user_id', $userId)->get();

    return view('posts.myposts')->with([
        'posts' => $posts
    ]);
}
public function otherposts($userId)
{
    // Retrieve posts published by the user with the given ID
    $posts = Post::where('user_id', $userId)->get();

    return view('posts.myposts')->with([
        'posts' => $posts
    ]);
}

}
