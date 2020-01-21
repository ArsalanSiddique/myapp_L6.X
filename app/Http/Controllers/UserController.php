<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserProfile;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = \App\User::with(['roles','profile'])->get();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = \App\Role::all();
        $countries = \App\Country::all();
        return view('users.create', compact('roles', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = [
            'username' => $request->username,
            'name' => $request->fullname,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ];
        $user = \App\User::create($user);
        
        
        

        if($request->hasFile('photo')) {
            $fileExtension = $request->File('photo')->getClientOriginalExtension();
            $filename = sprintf('photo_%s.'.$fileExtension, random_int(1, 1000));
            $Userphoto = $request->file('photo')->storeAs('profiles', $filename, 'public');
        }else {
            $Userphoto = 'profiles/dummy.jpg';
        }
        
        $profile = new \App\UserProfile([
            'user_id' => $user->id,
            'country_id' => $request->country,
            'city' => $request->city,
            'phone' => $request->phone,
            'photo' => $Userphoto,
        ]);
        $user->profile()->save($profile);
        $user->roles()->attach($request->roles);

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = \App\User::with(['roles','profile'])->where('id', $id)->first();
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = \App\User::with(['roles','profile'])->where('id', $id)->first();
        $countries = \App\Country::all();
        $roles = \App\Role::all();
        return view('users.edit', compact('user', 'countries', 'roles'));
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
        $user = \App\User::find($id);
        $user->name = $request->fullname;
        $user->email = $request->email;
        
        $filename = sprintf('photo_%s.jpg', random_int(1, 1000));
        if($request->hasFile('photo')) {
            $Userphoto = $request->file('photo')->storeAs('profiles', $filename, 'public');
        }else {
            $Userphoto = $user->profile->photo;
        }
        if($user->save()) {
            $profile = [
                'country_id' => $request->country,
                'city' => $request->city,
                'phone' => $request->phone,
                'photo' => $Userphoto,
            ];    
        }
        
        $user->profile()->update($profile);
        $user->roles()->sync($request->roles);

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = \App\User::find($id);
        $user->profile()->delete();
        $user->roles()->detach();
        $user->delete();
        return redirect()->route('users.index');
    }
}
