<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\customPostRequest;
use App\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::find(1);
        echo $posts;
        session(['first'=>'Saif Hesham']);
        session(['second'=>'Hesham Abdallah']); //this for add new or change value session 
        echo '<br>';
        session()->forget('second'); //for remove only one or many from session 
        //session()->flush(); // for remove all session 
        print_r(session()->all());
        if(session()->exists('first')) echo 'this for check if this session is exist';
        echo '<br>';
        return View('posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(customPostRequest $request)
    {
        //
        //return $request->all();
        echo 'store method! ';
        $validatedData = $request->validated();
    //     $validatedData = $request->validate([
    //     'title' => 'required|unique:posts|max:255',
    //     'body' => 'required',
    // ]);
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        echo $file;
        foreach($request->all() as $key => $value){
            echo $key.': '.$value;
            echo '<br>';
        }
        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        $file->move('images',$fileName);
        $post->images()->create(['path'=>$fileName]);
        echo $post;
        echo '<br>';
        echo 'File name:    '.$fileName;
        
        $posts = Post::create($post);
        return redirect(route('posts.show','show'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function show($id)
    {
        $images = [];
        if(is_numeric($id) and $id > 0){
            $posts = Post::where('id',$id)->get();
        }else{
            $posts = Post::all();
        }
        $images = [];
        foreach($posts as $post){
            if(count($post->images) > 0){
                $paths = [];
                foreach($post->images as $img){
                    $paths[] = $img->path;
                }
                $images[$post->id] = $paths;
                
            }
        }
        return view('posts.show',compact(['posts','images']));
        
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
        echo 'edit';
        $post = Post::findOrFail($id);
        return view('posts.update',compact('post'));
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
        //
        $result = Post::findOrFail($id)->update(['title'=>$request->title,'body'=>$request->body]);
        return redirect(route('posts.show','show'));
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
        Post::findOrFail($id)->destroy($id);
        return redirect(route('posts.show','show'));
    }
    public function show_post($id){return view('post')->with('id',$id);}
    public function show_contact($id){
        $people = ['ahmed','mohammed','ibrahem'];
        return view('contact',compact('people'))->with('id',$id);
    }
}
