<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;   
use App\CategoryType;
use App\User;
use Session;


class CategoriesController extends Controller
{

        // public function __construct()
        // {
        //     $this->middleware('admin');
        // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //pass some data, uses Category model to get all the record
        $categories = Category::with('categorytype')->get();
        
        return view('admin.categories.index')->with('categories', $categories)
                                             ->with('users', User::all());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.categories.create')->with('types', CategoryType::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $category = new Category;

        $category->name =  $request->name; 

        $category->category_type_id = $request->category_type_id;

        $featured = $request->featured;

        $featured_new_name = time().$featured->getClientOriginalName(); 

        $featured->move('uploads/categories/', $featured_new_name);  

        $category = Category::create([
            'featured'   => 'uploads/categories/' . $featured_new_name,
            'name'       => $request->name,
            'category_type_id' => $request->category_type_id,
        ]); 

    

        

        Session::flash('success', 'You are successfully in creating man now!');

        return redirect()->route('categories');
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
        $category = Category::find($id);

        return view('admin.categories.edit')->with('category', $category)
                                            ->with('types', CategoryType::all());
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
        $category = Category::find($id);
        if ($request->hasFile('featured')) 
            {
                $featured = $request->featured;
                $featured_new_name = time().$featured->getClientOriginalName();

                $featured->move('uploads/categories', $featured_new_name);

                $category->featured = 'uploads/categories/'.$featured_new_name;

            }


        $category->name = $request->name; 

        $category->category_type_id = $request->category_type_id;  

        $category->save();

        Session::flash('success', 'You are successfully in Updating a Category man!');

        return redirect()->route('categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        foreach ($category->posts as $post) 
        {
            $post->forceDelete();   
        }

        $category->delete();

        Session::flash('success', 'You are successfully deleting a category man!!!');

        return redirect()->route('categories');
    }
}
