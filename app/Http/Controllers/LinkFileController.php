<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LinkFile;
use App\User;
use File;
use JWTAuth;
class LinkFileController extends Controller
{
    private $image_ext = ['jpg', 'jpeg', 'png', 'gif'];
    private $audio_ext = ['mp3', 'ogg', 'mpga'];
    private $video_ext = ['mp4', 'mpeg'];
    private $document_ext = ['doc', 'docx', 'pdf', 'odt'];
    private $filepath;
    public function __construct()
    {
        $this->filepath = public_path('../../public_html/file');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $file = LinkFile::with('user')->get();
        return $file;
    }
    public function landing()
    {
        $file = LinkFile::where('status','1')->orderBy('updated_at', 'desc')->with('user')->get();
        return $file;
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
    private function allExtensions()
    {
        return array_merge($this->image_ext, $this->audio_ext, $this->video_ext, $this->document_ext);
    }
    public function store(Request $request)
    {
        $max_size = (int)ini_get('upload_max_filesize') * 1000;
        $all_ext = implode(',', $this->allExtensions());


        $this->validate($request, [
            'file' => 'required|file|mimes:' . $all_ext . '|max:' . $max_size
        ]);

        if (!is_dir($this->filepath)) {
            mkdir($this->filepath, 0777);
        }
        $model = new File();

        $file = $request->file('file');
        $ext = $file->getClientOriginalExtension();
        $name = sha1(date('YmdHis') . str_random(30));
        $save_name = $name . '.' . $ext;
        $file->move($this->filepath, $save_name);
       
        $datafile = new LinkFile();
        $datafile->filename = $save_name;
        $datafile->original_name = basename($file->getClientOriginalName());
        $datafile->author_id = JWTAuth::parseToken()->authenticate()->id;
        $datafile->save();

        return response()->json($datafile);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        
        $this->validate($request, [
            'status' => 'required',
        ]);

        $file = LinkFile::findOrFail($id);
        $file->status = $request->status;
        $file->save();

        return 'sukses';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = LinkFile::findOrFail($id);

        if(empty($file)){
            return Response::json(['message' => 'Sorry file does not exist'], 400);
        }
        $file_path = $this->filepath . '/' . $file->filename;
        if (file_exists($file_path)) {
            unlink($file_path);
        }
        if (!empty($file)) {
            $file->delete();
        }
        return $file_path;
    }
}
