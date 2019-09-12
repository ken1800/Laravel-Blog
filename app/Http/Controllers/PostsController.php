<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\Posts\CreatePostRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{


    public function index()
    {
        //
        return view('posts.index')->with('posts',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('posts.create')->with('categories',Category::all())->with('tags',Tag::all());
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request )
    {

       // dd($request->img);
 $mage = $request->img->store('posts');
           //dd($request->all());
$post=Post::create([

    'title'=> $request->ttl,
    'description'=>$request->Descrip,
    'contents'=>$request->contents,
    'image'=>$mage,
    'published_at'=>$request->pba,
    'category_id'=>$request->category,
    'user_id'=>auth()->user()->id

]);
        if($request->tags){

            $post->tags()->attach($request->tags);
        }

        session()->flash('success', 'Post created successfully');
        return redirect(route('posts.index'));

    }


    public function trashed_post(){


        $trashed = Post::onlyTrashed()->get();

        return view('posts.index')->withPosts($trashed);


    }



    public function show($id)
    {
        //
    }
    public function delete($id)
    {
        $post=Post::withTrashed()->where('id',$id)->firstOrFail();
        if($post->trashed()){
            Storage::delete($post->image);
            $post->forceDelete();
        }else{
            $post->delete();
        }



        session()->flash('success', 'post deleted successfully');
        return redirect(route('posts.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //

        return view('posts.create')->with('post',$post)->with('categories',Category::all())->with('tags',Tag::all());

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request,Post $post)
    {
        // Check if there is any image update

        if($request->hasFile('img')){

            $mage = $request->img->store('posts');
        //Delete if any

            Storage::delete($post->image);

        //update the variables
            $post->update([
               // 'image'=>$request->img,
                  'image'=>$mage,
            ]);
        }

        if($request->tags){
            $post->tags()->sync($request->tags);
        }


        $post->update([

            'title'=>$request->ttl,
            'description'=>$request->Descrip,
            'contents'=>$request->contents,
            'published_at'=>$request->pba
        ]);




        session()->flash('success', 'Post updated successfully');
        return redirect(route('posts.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
        //$post->delete();

        session()->flash('success', 'Post deleted successfully');
        return redirect(route('posts.index'));

    }



    public function restore_post($id){

        $post=Post::withTrashed()->where('id',$id)->firstOrFail();
        $post->restore();
        session()->flash('success', 'Post restored successfully');
        return redirect()->back();
    }

}
