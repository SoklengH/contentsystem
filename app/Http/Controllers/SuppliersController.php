<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Suppliers;
use Session;

class SuppliersController extends Controller
{
    public function index()
    {
        //pass some data, uses Category model to get all the record
        
        return view('admin.suppliers.index')->with('suppliers', Suppliers::all());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.suppliers.create')->with('suppliers', Suppliers::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $supplier = new Suppliers;

        $supplier->name =  $request->name; 

        $featured = $request->featured;

        $featured_new_name = time().$featured->getClientOriginalName(); 

        $featured->move('uploads/suppliers/', $featured_new_name);  

        $supplier = Suppliers::create([
            'featured'         => 'uploads/suppliers/' . $featured_new_name,
            'name'             => $request->name,
            'description' => $request->content,
        ]); 

    

        

        Session::flash('success', 'You are successfully in creating supplier now!');

        return redirect()->route('suppliers');
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
        $supplier = Suppliers::find($id);

        return view('admin.suppliers.edit')->with('supplier', $supplier);
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
        $supplier = Suppliers::find($id);
        if ($request->hasFile('featured')) 
            {
                $featured = $request->featured;
                $featured_new_name = time().$featured->getClientOriginalName();

                $featured->move('uploads/suppliers', $featured_new_name);

                $supplier->featured = 'uploads/suppliers/'.$featured_new_name;

            }


        $supplier->name = $request->name; 

        $supplier->description = $request->content;  

        $supplier->save();

        Session::flash('success', 'You are successfully in Updating a Supplier man!');

        return redirect()->route('suppliers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = Suppliers::find($id);

        $supplier->delete();

        Session::flash('success', 'Successfully, Supplier was trashed doc jit hz!!');

        return redirect()->back();
    }
}
