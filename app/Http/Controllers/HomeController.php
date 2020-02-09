<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Contracts\Encryption\DecryptException;

use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if($request->isMethod('POST')) {
            $token = Str::random(80);
            $user = $request->user();
            $user->token = $token;
            $user->secret = encrypt($request->secret);
            $user->save();           
            return redirect('/home');
        }

        try {
            $secret = decrypt(auth()->user()->secret);
        } catch (DecryptException $e) {
            $secret = 'N/A or Modified';
        } 


        return view('home', compact('secret'));
    }
}
