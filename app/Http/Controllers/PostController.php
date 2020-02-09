<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreBlogPost;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Category;
use DB;
use Gate;


class PostController extends Controller
{

    public function __construct() {
        $this->authorizeResource(Post::class, 'post');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = \App\Post::with(['categories','user'])->get();
        return view('dashboard.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        // $response = Gate::inspect('create');
        // if($response->denied()) {
        //     // dd($response);
        //     return redirect()->back()->with('status', 'You are not authorize to create post');
        // }
        return view('dashboard.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $response = Gate::inspect('allowCreating', $post);
        // if($response->denied()) {
        //     return redirect()->route('posts.index')->with('status', $response->message());
        // }
        if($request->hasFile('thumbnail')) {
            $fileExtension = $request->File('thumbnail')->getClientOriginalExtension();
            $filename = sprintf('thumbnail_%s.'.$fileExtension, random_int(1, 1000));
            $filename = $request->file('thumbnail')->storeAs('posts', $filename, 'public');
        }else {
            $filename = 'posts/dummy.jpg';
        }

        $post = [
            'user_id' => Auth::id(),
            'title' => $request->title,
            'content' => $request->content,
            'thumbnail' => $filename,
            'slug' => $request->title,
        ];
        $post = Post::create($post);

        
        if($post) {
            $post->categories()->attach($request->categories);
            return redirect()->route('posts.index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = \App\Post::with(['categories','user'])->where('id', $id)->first();
        return view('dashboard.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // $post = \App\Post::with(['categories','user'])->where('id', $id)->orWhere('slug', $id)->first();
        // $response = Gate::inspect('update', $post);
        // if($response->denied()) {
        //     return redirect()->route('posts.index')->with('status', $response->message());
        // }
        $categories = \App\Category::all();
        return view('dashboard.posts.edit', compact('post', 'categories'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // $post = \App\Post::find($id);

        // $response = Gate::inspect('update', $post);
        // if($response->denied()) {
        //     return redirect()->route('posts.index')->with('status', $response->message());
        // }
        
        if($request->hasFile('thumbnail')) {
            $fileExtension = $request->file('thumbnail')->getClientOriginalExtension();
            $filename = sprintf('thumbnail_%s.jpg', random_int(1, 1000));
            $filename = $request->file('thumbnail')->storeAs('posts', $filename, 'public');
        }else {
            $filename = $post->thumbnail;
        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->thumbnail = $filename;
        $post->slug = $request->title;

        if($post->save()) {
            $post->categories()->sync($request->categories);       
            return redirect()->route('posts.index');
        }
           
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // $post = \App\Post::find($id);
        // $response = Gate::inspect('delete', $post);
        // if($response->denied()) {
        //     dd($response);
        //     return redirect()->back()->with('status', $response->message());
        // }
        $post->categories()->detach();
        $post->delete();
        return redirect()->route('posts.index');
    }}
