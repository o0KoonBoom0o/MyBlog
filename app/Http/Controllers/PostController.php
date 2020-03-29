<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postdesc = DB::table('posts')->orderBy('id', 'desc')->simplePaginate(10);
        $post = Post::all();
        return view('post.index', compact('postdesc', $postdesc));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'posttitle' => 'required|min:3',
            'postcontent' => 'required',
            'posttag' => 'required',
            'posttitleimg' => ['required|mimes:jpeg,jpg,png|max:1000|', Rule::dimensions()->maxHeight(700)]
        ]);
        $path = $request->file('posttitleimg')->store('blog-photo','public');

        $post = Post::create([
            'title' => $request->posttitle,
            'tag' => $request->posttag,
            'content' => $request->postcontent,
            'image' => $request->file('posttitleimg')->hashName(),
            'user' => Auth::user()->id
        ]);
        return redirect('/post/' .  $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        return view('post.post', compact('post', $post));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
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
    public function update(Request $request, post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        //
    }
}
