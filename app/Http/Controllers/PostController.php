<?php

namespace App\Http\Controllers;
use App;
use App\Post;
use App\PostTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('lang')->paginate(20);
        return view('admin.post.index', compact('posts') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post;
        return view('admin.post.create', compact('post') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'              => 'required|required|max:191',
            'description'        => 'max:1000000',
            'locale'             => 'required|min:2|max:2',
            'image'              => 'image|max:2000',
            'status'             => 'required|numeric|max:100000',
        ]);

        $post = Post::create( $request->all() );
        $post->lang()->create( $request->all() );

        Session::flash('success' , 'تم الاضافة بنجاح');
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.post.edit', compact('post') );       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->update( $request->all() );
        $post->lang->updateOrCreate(
            ['locale' => App::getLocale(), 'post_id'=> $post->id], $request->all()
        );

        Session::flash('success' , 'تم التعديل بنجاح');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        Session::flash('success' , 'تم الحذف بنجاح');
        return redirect()->route('post.index');
    }
}
