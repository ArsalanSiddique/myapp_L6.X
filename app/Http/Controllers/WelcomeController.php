<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    // public function welcome($name = "Guest") {
    //     echo "welcome {$name} to WelcomeController";
    // }

    // public function welcome() {
    //     return view('welcome', ['name'=>'Arsalan','Company'=>'DevDesign']);
    // }

    public function welcome() {
        $posts = new Post();
        $data = $posts->data();
        return view('welcome', compact('data'));
    }
}
