<?php

namespace App\Http\Controllers;
use App;
use App\Post;
use App\PostTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class PostController extends Controller
{

    protected $rules = [
        'title'              => 'required|max:191',
        'slug'               => 'nullable|max:191',
        'description'        => 'max:1000000',
        'locale'             => 'required|min:2|max:2',
        'image'              => 'nullable|image|max:2000',
        'status'             => 'required|numeric|max:100000',
    ];


    public function __construct()
    {
        $this->middleware('auth:users');
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
        return view('admin.post.create', [
            'post'          => new Post,
            'action'        => route('post.store', [App::getLocale()]),
            'patch'         => null,
            'title'         => old('title'),
            'slug'          => old('slug'),
            'description'   =>  old('description'),
            'status'        => old('status'),
        ] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules);

        $attributes             = $request->all();
        $attributes['image']    = uploadImage(800, 800, 'image');
        $attributes['slug']     = $this->createSlug($request->slug ? $request->slug : $request->title);
        $attributes['added_by'] = auth()->id();

        $post = Post::create( $attributes );
        $post->lang()->create( $attributes );

        Session::flash('success' , 'Added Successfully');
        return redirect()->route('post.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.post.edit', [
            'post'          => $post,
            'action'        => route('post.update' , $post->id ),
            'patch'         => '<input type="hidden" name="_method" value="PATCH">',
            'title'         => $post->lang->title ,
            'slug'          => $post->slug,
            'description'   =>  $post->lang->description,
            'status'        => $post->status,
        ] );       
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
        $this->validate($request, $this->rules);

        $attributes                 = $request->all();
        $attributes['updated_by']   = auth()->id();
        $attributes['image']        = $request->image ? uploadImage(800, 800, 'image') : $post->image;
        $attributes['slug']         = ( $request->slug === $post->slug ? $post->slug : 
                                            $this->createSlug($request->slug ? $request->slug : $request->title)
                                        );
        $post->update( $attributes );
        $post->lang->updateOrCreate(
            ['locale' => App::getLocale(), 'post_id'=> $post->id], 
            $attributes
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


    public function createSlug($title, $id = 0)
    {
        // Normalize the title
        $title = substr($title, 0, 140);
        $slug = str_slug($title);

        // Get any that could possibly be related.
        // This cuts the queries down by doing it once.
        $allSlugs = $this->getRelatedSlugs($slug, $id);
        // If we haven't used it before then we are all good.
        if (! $allSlugs->contains('slug', $slug)){
            return $slug;
        }
        // Just append numbers like a savage until we find not used.
        for ($i = 1; $i <= 10; $i++) {
            $newSlug = $slug.'-'.$i;
            if (! $allSlugs->contains('slug', $newSlug)) {
                return $newSlug;
            }
        }
        throw new \Exception('Can not create a unique slug');
    }


    protected function getRelatedSlugs($slug, $id = 0)
    {
        return Post::select('slug')->where('slug', 'like', $slug.'%')
            ->where('id', '<>', $id)
            ->get();
    }

}
