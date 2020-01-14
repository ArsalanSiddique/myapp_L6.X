<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    // public function welcome($name = "Guest") {
    //     echo "welcome {$name} to WelcomeController";
    // }

    public function welcome() {

        // $users = \App\User::all();   =====================> LAZY LOADING
        $users = \App\User::with('profile.country:id,name')->get();
        
        // $users = \App\User::with([
        //     'profile' => function($profile) {
        //         return $profile->with([
        //             'country' => function($country) {
        //                 return $country->where('id', 1);
        //             }
        //         ]);
        //     }
        // ])->get();

        return view('welcome', compact('users'));
        // return view('welcome', ['name'=>'Arsalan','Company'=>'DevDesign']);


    }

    // public function welcome() {
    //     $posts = new Post();
    //     $data = $posts->data();
    //     return view('welcome', compact('data'));
    // }
}
