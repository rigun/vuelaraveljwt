<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Intervention\Image\Facades\Image;
use App\Upload;
use App\UsersDetail;
use App\Role;

use JWTAuth;
use App\User;
use Tymon\JWTAuth\Exceptions\JWTException;


class UploadImagesController extends Controller
{
    private $photos_path;
 
    public function __construct()
    {
        $this->photos_path = public_path('/images/upload');
    }
 
    /**
     * Display all of the images.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $author_id = JWTAuth::parseToken()->authenticate()->id;
        // $author_id = 3;
        $photos = Upload::where([['author_id', $author_id],['type','imageUpload']])->get();
        return $photos;
    }
    public function showSlide()
    {
        $photos = Upload::where('type','slider')->get();
        return $photos;
    }
 
    /**
     * Show the form for creating uploading new images.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('upload');
    }

    public function show($id)
    {
        $picture = Upload::findOrFail($id);
        return $picture;
    }
    /**
     * Saving images uploaded through XHR Request.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $photos = $request->file('file');
 
        if (!is_array($photos)) {
            $photos = [$photos];
        }
 
        if (!is_dir($this->photos_path)) {
            mkdir($this->photos_path, 0777);
        }
 
        for ($i = 0; $i < count($photos); $i++) {
            $photo = $photos[$i];
            $name = sha1(date('YmdHis') . str_random(30));
            $save_name = $name . '.' . $photo->getClientOriginalExtension();
            $resize_name = $name . str_random(2) . '.' . $photo->getClientOriginalExtension();
 
            Image::make($photo)
                ->resize(250, null, function ($constraints) {
                    $constraints->aspectRatio();
                })
                ->save($this->photos_path . '/' . $resize_name);
 
            $photo->move($this->photos_path, $save_name);
 
            $upload = new Upload();
            $upload->filename = $save_name;
            $upload->resized_name = $resize_name;
            $upload->original_name = basename($photo->getClientOriginalName());
            $upload->author_id = JWTAuth::parseToken()->authenticate()->id;
            $upload->type = "imageUpload";
            $upload->save();
        }

        $picture = Upload::where('filename',$save_name)->first();
        return Response::json([
            'picture' => $picture
        ], 200);
    }
    public function storePost(Request $request)
    {
        $photos = $request->file('file');
 
        if (!is_array($photos)) {
            $photos = [$photos];
        }
 
        if (!is_dir($this->photos_path)) {
            mkdir($this->photos_path, 0777);
        }
 
        for ($i = 0; $i < count($photos); $i++) {
            $photo = $photos[$i];
            $name = sha1(date('YmdHis') . str_random(30));
            $save_name = $name . '.' . $photo->getClientOriginalExtension();
            $resize_name = $name . str_random(2) . '.' . $photo->getClientOriginalExtension();
 
            Image::make($photo)
                ->resize(250, null, function ($constraints) {
                    $constraints->aspectRatio();
                })
                ->save($this->photos_path . '/' . $resize_name);
 
            $photo->move($this->photos_path, $save_name);
 
            $upload = new Upload();
            $upload->filename = $save_name;
            $upload->resized_name = $resize_name;
            $upload->original_name = basename($photo->getClientOriginalName());
            $upload->author_id = JWTAuth::parseToken()->authenticate()->id;
            $upload->type = "postPicture";
            $upload->save();
        }

        $picture = Upload::where('filename',$save_name)->first();
        $author_id = JWTAuth::parseToken()->authenticate()->id;
        $user = User::findOrFail($author_id);
        if($user->roles()->first()->name == 'user'){
            $idDetail = UsersDetail::where('user_id',$author_id)->first();
            $detailUser = UsersDetail::findOrFail($idDetail->id);
            $detailUser->foto = $picture->id;
            $detailUser->save();
        }
        return Response::json([
            'picture' => $picture
        ], 200);
    }

    public function storeSlide(Request $request, $id)
    {
        if($uploaded_image = Upload::where([['resized_name', $id],['type','slider']])->first()){
            $file_path = $this->photos_path . '/' . $uploaded_image->filename;
    
            if (file_exists($file_path)) {
                unlink($file_path);
            }
    
            if (!empty($uploaded_image)) {
                $uploaded_image->delete();
            }
        };
        $photos = $request->file('file');
 
        if (!is_array($photos)) {
            $photos = [$photos];
        }
 
        if (!is_dir($this->photos_path)) {
            mkdir($this->photos_path, 0777);
        }


        for ($i = 0; $i < count($photos); $i++) {
            $photo = $photos[$i];
            $save_name = $id . '.' . $photo->getClientOriginalExtension();
            $resize_name = $id;
 
            $photo->move($this->photos_path, $save_name);
 
            $upload = new Upload();
            $upload->filename = $save_name;
            $upload->resized_name = $resize_name;
            $upload->original_name = basename($photo->getClientOriginalName());
            $upload->author_id = JWTAuth::parseToken()->authenticate()->id;
            $upload->type = "slider";
            $upload->save();
        }
        
        return Response::json([
            'message' => 'Image saved Successfully'
        ], 200);
    }
 
    /**
     * Remove the images from the storage.
     *
     * @param Request $request
     */
    public function destroy($id)
    {
       
        $uploaded_image = Upload::findOrFail($id);
 
        if (empty($uploaded_image)) {
            return Response::json(['message' => 'Sorry file does not exist'], 400);
        }
 
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
        $author_id = JWTAuth::parseToken()->authenticate()->id;
        $user = User::findOrFail($author_id);
        if($user->roles()->first()->name == 'user'){
            $idDetail = UsersDetail::where('user_id',$author_id)->first();
            $detailUser = UsersDetail::findOrFail($idDetail->id);
            $detailUser->foto = null;
            $detailUser->save();
        }
        return "Terhapus";
    }
}
