<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Tag;
use Session;


class PostsController extends Controller
{
    
    public function index()
    {
        return view('admin.posts.index')->with('posts', Post::all())
                                        ->with('categories', Category::all());
    }

    
    public function create()
    {

        $categories = Category::all();

        $tags  = Tag::all();

        // if($categories->count() == 0)
        // {
        //     Session::flash('info', 'You must have some categories!');

        //     return redirect()->back();
        // }


        return view('admin.posts.create')->with('categories', $categories)
                                         ->with('tags', $tags);

    }

    public function store(Request $request)
    {
        // dd($request->all());

        $this->validate($request, [

            'title' =>'required|max:255',
            'featured'=>'required|image',
            'content'=>'required',
            'price'=>'required',
            'category_id' => 'required',
            // 'tags' => 'required'
        ]);

        $featured = $request->featured;

        $featured_new_name = time().$featured->getClientOriginalName();

        $featured->move('uploads/posts/', $featured_new_name);


        $post = Post::create([

            'title'      => $request->title,
            'content'    => $request->content,
            'price'      => $request->price,
            'featured'   => 'uploads/posts/' . $featured_new_name,
            'category_id'=> $request->category_id,
            'slug'       => str_slug($request->title)   

        ]);

        $post->tags()->attach($request->tags);

        Session::flash('success', 'Post Created Successfully!!');

        return redirect()->back();
        // dd($request->all());
    }

   
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $post = Post::find($id);
        // $post = Post::pluck('name', 'id')->all();

        return view('admin.posts.edit')->with('post', $post)
                                       ->with('categories', Category::all())
                                       ->with('tags', Tag::all());

    }

    
        public function update(Request $request, $id)
        {
            $this->validate($request, [
                'title'       => 'required',
                'content'     => 'required',
                'category_id' => 'required',
                'price'       => 'required',
            ]);

            $post = Post::find($id);
            if ($request->hasFile('featured')) 
            {
                $featured = $request->featured;
                $featured_new_name = time().$featured->getClientOriginalName();

                $featured->move('uploads/posts', $featured_new_name);

                $post->featured = 'uploads/posts/'.$featured_new_name;

            }

            $post->title =  $request->title;
            $post->price =  $request->price;
            $post->content = $request->content;
            $post->category_id = $request->category_id;

            $post->save();

            //call the tags relationship
            $post->tags()->sync($request->tags);

            Session::flash('success', 'You are Successfully update post!!');

            return redirect()->route('posts');
        }

    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();

        Session::flash('success', 'Successfully, post was trashed doc jit hz!!');

        return redirect()->back();
    }

    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();

        return view('admin.posts.trash')->with('posts', $posts);

        // dd($posts);
    }

    public function permanent($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();

        $post->forceDelete();

        Session::flash('success', 'You are forceDelete the post already!!');

        return redirect()->back();
        // dd($post); 
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();

        $post->restore();

        Session::flash('success', 'You are Successfully restore post man');

        return redirect()->route('posts');
    }
}
