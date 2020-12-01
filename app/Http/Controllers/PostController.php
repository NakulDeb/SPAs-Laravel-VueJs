<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('postDescription')->with('category');

        $searchType = request()->query('search-type');
        $query = request()->query('search');
        $category = request()->query('category');

        switch ($searchType){
            case 'search-box': $posts = $posts->where('title', 'like', "%{$query}%"); break;
            case 'category-search': $posts = $posts->where('category_id', $category); break;
        }
        $posts = $posts->paginate(4);
        return response(['posts'=> $posts]);
    }


    public function searchPost(Request $request){
//        $posts = Post::search($request->parem)->get();
        $posts = Post::with('postDescription')->with('category')->get();
        return response(['posts'=> $posts]);
    }


    public function searchPostWeb(){
        $query = request()->query('searchKey');
        if($query){
            $posts = Post::search($query)->get();;
        }
        else{
            $posts = Post::all();;
        }
        return view('post')->withPosts($posts);
    }

//    public function searchPostWeb(){
//        $query = request()->query('searchKey');
//        if($query){
//            $posts = Post::search($query)->within('postDescriptions')->within('categories')->get();
//        }
//        else{
//            $posts = Post::within('postDescriptions')->within('categories')->get();
//        }
//        return view('post')->withPosts($posts);
//    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
