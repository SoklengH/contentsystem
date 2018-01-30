<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events;
use Session;


class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //pass some data, uses Category model to get all the record
        
        return view('admin.events.index')->with('events', Events::all());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.events.create')->with('events', Events::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $event = new Events;

        $event->name =  $request->name; 

        $featured = $request->featured;

        $featured_new_name = time().$featured->getClientOriginalName(); 

        $featured->move('uploads/events/', $featured_new_name);  

        $event = Events::create([
            'featured'         => 'uploads/events/' . $featured_new_name,
            'name'             => $request->name,
            'description' => $request->content,
        ]); 

    

        

        Session::flash('success', 'You are successfully in creating event now!');

        return redirect()->route('events');
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
        $event = Events::find($id);

        return view('admin.events.edit')->with('event', $event);
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
        $event = Events::find($id);
        if ($request->hasFile('featured')) 
            {
                $featured = $request->featured;
                $featured_new_name = time().$featured->getClientOriginalName();

                $featured->move('uploads/categories', $featured_new_name);

                $event->featured = 'uploads/categories/'.$featured_new_name;

            }


        $event->name = $request->name; 

        $event->description = $request->content;  

        $event->save();

        Session::flash('success', 'You are successfully in Updating a Event man!');

        return redirect()->route('events');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Events::find($id);

        $event->delete();

        Session::flash('success', 'Successfully, Event was trashed doc jit hz!!');

        return redirect()->back();
    }
}
