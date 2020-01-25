<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreBlogPost;
use App\Post;
use App\Category;
use DB;


class PostController extends Controller
{

/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = \App\Post::with(['categories','user'])->get();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->hasFile('thumbnail')) {
            $fileExtension = $request->File('thumbnail')->getClientOriginalExtension();
            $filename = sprintf('thumbnail_%s.'.$fileExtension, random_int(1, 1000));
            $filename = $request->file('thumbnail')->storeAs('posts', $filename, 'public');
        }else {
            $filename = 'posts/dummy.jpg';
        }

        $post = [
            'user_id' => 1,
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
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = \App\Post::with(['categories','user'])->where('id', $id)->first();
        $categories = \App\Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = \App\Post::find($id);
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
    public function destroy($id)
    {
        $post = \App\Post::find($id);
        $post->categories()->detach();
        $post->delete();
        return redirect()->route('posts.index');
    }}
