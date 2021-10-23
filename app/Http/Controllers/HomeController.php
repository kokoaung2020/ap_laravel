<?php

namespace App\Http\Controllers;

use App\Test;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePostRequest;
use App\Mail\PostCreated;
use App\Mail\StoredPost;
use Illuminate\Support\Facades\Mail;
use App\Policies\PostPolicy;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   
        // Mail::raw('Hello World',function($smg){
        //     $smg->to('kokoaung2019aungaung@gmail.com')->subject('AP Index Function');
        // });

        //dd(config('ap.info.third'));
        $data = Post::where('user_id',auth()->id())->orderBy('id','desc')->get();
        return view('home',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = Category::all();
        return view('create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {   

        $validated = $request->validated();
        $post = Post::create($validated + ['user_id'=>Auth::user()->id]);

       // Mail::to('kokoaung2019aungaung@gmail.com')->send(new PostCreated()); //StoredPost($post)

        return redirect('/posts')->with('status', config('ap.message.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post) //,Test $test
    {   
        //dd($test);
        $this->authorize('view', $post);
        return view('show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->authorize('view', $post);
        $categories = Category::all();
        return view('edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request, Post $post)
    {   

        $validated = $request->validated();
        $post->update($validated);

        return redirect('/posts')->with('status', config('ap.message.updated'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {

        $post->delete();
        return redirect('/posts');
    }
}
