<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Profile;
use Session;

class UsersController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('admin');
    // }
    
    public function index()
    {
        return view('admin.users.index')->with('users', User::all());
    }

   
    public function create()
    {
        return view('admin.users.create');
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required',
            'email' => 'required'
        ]);

        $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt('password')
            ]);

        $user->profile->save(new Profile([
            'avatar' => 'uploads/avatars/1514906326cool-wallpaper-3.jpg'
        ]));


        Session::flash('success', 'User added!!');

        return redirect()->route('users');  


    }

   
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        //
    }

  
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $user = User::find($id);
        // $user->profile->delete();
        $user->delete();    

        Session::flash('success', 'User deleted!');

        return redirect()->back();
    }

    public function admin($id)
    {
        $user = User::find($id);

        $user->admin = 1;
        $user->save();

        Session::flash('success', 'Admin Created!');

        return redirect()->back();
    }

    public function not_admin($id)
    {
        $user = User::find($id);

        $user->admin = 0;
        $user->save();

        Session::flash('success', 'Admin Created!');

        return redirect()->back();
    }
}
