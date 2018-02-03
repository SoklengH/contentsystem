<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use User;
use Auth;
use Session;
use App\Profile;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.profile')->with('user', Auth::user());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()    
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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


    //we deleted id cos, we already use middleware and auth to check that
    public function update(Request $request)
    {
        $this->validate($request, [
            'name'    =>'required',
            'email'   =>'required|email',
            'facebook'=>'required|url',
            'youtube' =>'required|url'
        ]);

        $user = Auth::user();
        $profile = Profile::where(
            'user_id', '=', $user->id
        )->first();
        if($request->hasFile('avatar'))
        {
            $avatar = $request->avatar;
            $avatar_new_name = time().$avatar->getClientOriginalName();

            $avatar->move('uploads/avatars', $avatar_new_name);
            // dd($user->profile);
            $profile->avatar = 'uploads/avatars/'.$avatar_new_name;   
            
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $profile->facebook = $request->facebook;
        $profile->youtube  = $request->youtube;
        $profile->about = $request->about;

        $profile->save();    

        if($request->has('passsword'))
        {
            $user->passsword  = bcrypt($request->passsword);
        }

        $user->save();

        Session::flash('success', 'Your account updated');

        return redirect()->route('users');

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
