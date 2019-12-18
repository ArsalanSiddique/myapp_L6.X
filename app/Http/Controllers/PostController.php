<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreBlogPost;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // HTTP request path
        // ===================================================================
        // return $request->path();
        // return $request->url();
        // return $request->fullurl();  // http://localhost:8000/post?age=21&name=arsalan
        // return $request->query('name'); // http://localhost:8000/post?age=21&name=arsalan
        // return $request->input('name'); // http://localhost:8000/post?age=21&name=arsalan
        
        // checking request path
        // ===================================================================
        // if($request->is('post')) {
        //     echo 'Request Is Accepted';
        //     dd();
        // }else {
        //     echo 'Request Not Accepted';
        //     dd();
        // }
        
        // Detect request method
        // ===================================================================
        //  return $request->method();
        // if($request->isMethod('GET')) {
        //     echo 'Request Is Accepted'; 
        //     dd();
        // }else {
        //     echo 'Request Not Accepted';
        //     dd();
        // }
        
        $posts = new Post();
        $data = $posts->data();
        return view('posts.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogPost $request)
    {
        // return $request->input('check');
        // return $request->input('check.0');
        // return $request->title;
        
        // ===========================================> STORE IMAGES
        // return $request->file('profile')->store('images', 'public');
        // $fileName = 'image_'.random_int(1, 1000).'.jpg';
        // $request->file('profile')->storeAs('images', $fileName,'public');

        // ===========================================> RESPONSE WITH HEADER
        // return response('<h2>Hello Laravel 6.7</h2>', 200) ->
        //     header('Content-Type', 'application/json');

        // $data =  $request->all();
        // return view('posts.show', compact('data'));

        // ===========================================> RESPONSE WITH VALIDATION

        $request->validated();

        return back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBlogPost $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
