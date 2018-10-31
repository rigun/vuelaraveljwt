<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Kategori;
use App\User;
use App\Upload;
use DB;
use Session;
use Input;
use Illuminate\Support\Facades\Auth;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Purifier;

class ImportantPostController extends Controller
{
    private $photos_path;
 
    public function __construct()
    {
        $this->photos_path = public_path('../../public_html/images/upload');
    }
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($kategori)
    {
        $data = Kategori::where('name',$kategori)->first();
        return $data->post()->orderBy('id', 'desc')->with(['user','foto'])->get();
    }
    public function landingPage($kategori)
    {
        $data = Kategori::where('name',$kategori)->first();
        return $data->post()->orderBy('published_at', 'desc')->where('status','1')->with(['user','foto'])->get();
    }
    public function IndexSiswa($kategori)
    {
        $data = Kategori::where('name',$kategori)->first();
        $id = JWTAuth::parseToken()->authenticate()->id;
        return $data->post()->where('author_id',$id)->with('user')->get();
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
    public function store(Request $request, $kategori)
    {
        $this->validateWith([
            'slug' => 'required',
            'title' => 'required',
            'content' => 'required',
            'picture_id' => 'required'

          ]);
          $beforeclean = $request->content;
        $afterclean =  Purifier::clean($request->content);
        $post = new Post;
        $post->slug =  $request->slug;
        $post->title = $request->title;
        $post->content = Purifier::clean($request->content);
        $post->published_at = date("Y-m-d h:i:s");
        $post->author_id = JWTAuth::parseToken()->authenticate()->id;
        $post->status = 0;
        $post->picture_id = $request->picture_id;
        $post->save();

        $category = Kategori::where('name', $kategori)->first();
        $post->kategori()->attach($category);

        return json_encode(['post'=>$post,'beforeClean'=>$beforeclean,'afterclean'=>$afterclean]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,$kategori)
    {
        $kategori = Kategori::where('name',$kategori)->first();
        $post = $kategori->post()->where('id',$id)->first();
        if($post->picture_id != null){
            $image = Upload::findOrFail($post->picture_id);
        }else{
            $image = null;
        }
        return json_encode(['post'=>$post,'picture'=>$image]);
    }

    public function showAll($kategori)
    {
        $kategori = Kategori::where('name',$kategori)->first();
        $post = $kategori->post;
        $image = Upload::findOrFail($post->id);
        return json_encode(['post'=>$post,'image'=>$image]);
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
            'picture_id' => 'required'

        ]);
        

        $post = Post::findOrFail($id);
        $post->slug =  $request->slug;
        $post->title = $request->title;
        $post->content = Purifier::clean($request->content);
        $post->published_at = date("Y-m-d h:i:s");
        $post->status = 1;
        $post->picture_id = $request->picture_id;
        $post->save();

        return $post;
    }
    public function updateSiswa(Request $request, $id)
    {
        $this->validateWith([
            'slug' => 'required',
            'title' => 'required',
            'content' => 'required',
            'picture_id' => 'required'

        ]);
        

        $post = Post::findOrFail($id);
        $post->slug =  $request->slug;
        $post->title = $request->title;
        $post->content = Purifier::clean($request->content);
        $post->published_at = date("Y-m-d h:i:s");
        $post->status = 0;
        $post->picture_id = $request->picture_id;
        $post->save();

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
        $post = Post::findOrFail($id);
        if($post->count()>0){
            $uploaded_image = Upload::findOrFail($post->picture_id);
            $file_path = $this->photos_path . '/' . $uploaded_image->filename;
            $resized_file = $this->photos_path . '/' . $uploaded_image->resized_name;
     
            if (file_exists($file_path)) {
                unlink($file_path);
            }
     
            if (file_exists($resized_file)) {
                unlink($resized_file);
            }
     
            if (!empty($uploaded_image)) {
                $uploaded_image->delete();
            }
            $post->delete();
            return response()->json(['statur'=>'success','msg'=>'Data siswa berhasil dihapus']);
        } else {
            return response()->json(['statur'=>'error','msg'=>'Gagal menghapus data Siswa']);
        }
    }
    public function apiCheckUnique(Request $request)
    {
        return json_encode(!Post::where('slug', '=', $request->slug)->exists());
    }

    public function blog($slug)
    {
        if(Post::where('slug', '=', $slug)->exists()){
            $post = Post::where('slug', '=', $slug)->with('kategori')->first();
        }else{
            $post = 'not found';
        }
        return $post;
    }
}
