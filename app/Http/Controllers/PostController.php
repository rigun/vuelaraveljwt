<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Kategori;
use App\User;
use DB;
use Session;
use Input;
use Illuminate\Support\Facades\Auth;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Purifier;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $this->validateWith([
            'slug' => 'required',
            'title' => 'required',
            'content' => 'required',
            'kategori_name' => 'required',
          ]);
          
        $post = new Post;
        $post->slug =  $request->slug;
        $post->title = $request->title;
        $post->content = Purifier::clean($request->content);
        $post->published_at = date("Y-m-d h:i:s");
        $post->author_id = JWTAuth::parseToken()->authenticate()->id;
        $post->save();

        $category = Kategori::where('name', $request->kategori_name)->first();
        $post->kategori()->attach($category);

        return $post;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategori = Kategori::where('name', $id)->first();
        return $kategori->post;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
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
        $this->validateWith([
            'slug' => 'required',
            'title' => 'required',
            'content' => 'required',
            'kategori_name' => 'required',
        ]);
        

        $post = Post::findOrFail($id);
        $post->slug =  $request->slug;
        $post->title = $request->title;
        $post->content = Purifier::clean($request->content);
        $post->published_at = date("Y-m-d h:i:s");
        $post->author_id = JWTAuth::parseToken()->authenticate()->id;
        $post->save();

        $category = Kategori::where('name', $request->kategori_name)->first();
        $post->kategori()->attach($category);

        return $post;
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
    }
    public function apiCheckUnique(Request $request)
    {
        return json_encode(!Post::where('slug', '=', $request->slug)->exists());
    }
}
