<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Imports\UsersImport;
use App\Role;
use App\UsersDetail;
use DB;
use Session;
use Input;
use File;
use Excel;
class UserController extends Controller
{
    public function index()
    {
        $users = User::whereRoleIs('user')->get();
        return view('manage.users.index')->withUsers($users);
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

    public function apiIndex(){
        $users = User::with('detail')->whereRoleIs('user')->get();
        return $users;
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
            'name' => 'required|max:255',
            'username' => 'required|max:255|unique:users',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required|max:255',
            'alamat' => 'required|max:255',
            'kelas' => 'required|max:255',
            'angkatan' => 'required|max:255',
          ]);
  
    
          $password = trim($request->tanggal_lahir);
          
          $user = new User();
          $user->name = $request->name;
          $user->username = $request->username;
          $user->password = Hash::make($password);
          $user->save();

          $id = User::where('username',$user->username)->first()->id;
          $detailUser = new UsersDetail();
          $detailUser->tanggal_lahir = $request->tanggal_lahir;
          $detailUser->tempat_lahir = $request->tempat_lahir;
          $detailUser->alamat = $request->alamat;
          $detailUser->kelas = $request->kelas;
          $detailUser->angkatan = $request->angkatan;
          $detailUser->user_id = $id;
          $detailUser->save();

          if ($request->roles) {
            $user->syncRoles(explode(',', $request->roles));
          }
    
          return response()->json(['status' => 'success','msg'=>'Admin berhasil dibuat']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::with('detail')->where('id',$id)->get();
        return $users;
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
        $this->validateWith([
            'name' => 'required|max:255',
            'username' => 'required|unique:users,username,'.$id,
            'detail.tanggal_lahir' => 'required',
            'detail.tempat_lahir' => 'required|max:255',
            'detail.alamat' => 'required|max:255',
            'detail.kelas' => 'required|max:255',
            'detail.angkatan' => 'required|max:255',
          ]);
  
         
        
          $user = User::findOrFail($id);
          $user->name = $request->name;
          $user->username = $request->username;
          if ($request->password_options == true) {
            $user->password = Hash::make('12345678');
            $json=['status' => 'success','msg'=>'data berhasil di update dan password berhasil di update menjadi 12345678'];
          }else{
            $json=['status' => 'success','msg'=>'data berhasil di update tanpa merubah password'];
          } 
          $user->save();

          if($idDetail = UsersDetail::where('user_id',$id)->first()){
            $detailUser = UsersDetail::findOrFail($idDetail->id);
            $detailUser->tanggal_lahir = $request->input('detail.tanggal_lahir');
            $detailUser->tempat_lahir = $request->input('detail.tempat_lahir');
            $detailUser->alamat = $request->input('detail.alamat');
            $detailUser->kelas = $request->input('detail.kelas');
            $detailUser->angkatan = $request->input('detail.angkatan');
            if(!is_null($request->input('detail.foto'))){
                $detailUser->foto = $request->input('detail.foto');

            }
            $detailUser->save();

          }else{
            $detailUser = new UsersDetail();
            $detailUser->tanggal_lahir = $request->input('detail.tanggal_lahir');
            $detailUser->tempat_lahir = $request->input('detail.tempat_lahir');
            $detailUser->alamat = $request->input('detail.alamat');
            $detailUser->kelas = $request->input('detail.kelas');
            $detailUser->angkatan = $request->input('detail.angkatan');
            $detailUser->user_id = $id;
            if(!is_null($request->input('detail.foto'))){
                $detailUser->foto = $request->input('detail.foto');

            }
            $detailUser->save();
          }
          
    
         
          return response()->json($json);
    }

    public function updatePassword(Request $request, $id)
    {
        $this->validateWith([
            'password_lama' => 'required',
            'password_baru' => 'required',

          ]);
          $user = User::findOrFail($id);
          if(Hash::check($request->password_lama, $user->password)){
            $user->password = Hash::make($request->password_baru);    
            $json=['status' => 'success','msg'=>'Password berhasil diubah'];
          }else{
            $json=['status' => 'failed','msg'=>'Password yang anda masukkan salah, silahkan coba lagi'];
          }
          $user->save();
          
          return response()->json($json);
    }
    public function firstLogin(Request $request)
    {
        $this->validateWith([
            'password_baru' => 'required',
          ]);
          $id = JWTAuth::parseToken()->authenticate()->id;

          $user = User::findOrFail($id);
          $user->password = Hash::make($request->password_baru); 
             
          $json=['status' => 'success','msg'=>'Password berhasil diubah'];
          $user->save();

          $idDetail = UsersDetail::where('user_id',$id)->first();
          $detailUser = UsersDetail::findOrFail($idDetail->id); 
          $detailUser->status = 1;
          $detailUser->save();
          return response()->json($json);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if($user->count()>0){
            $user->delete();
            return response()->json(['status'=>'success','msg'=>'Data siswa berhasil dihapus']);
        } else {
            return response()->json(['status'=>'error','msg'=>'Gagal menghapus data Siswa']);
        }
    }

    public function getAuthenticatedUser()
    {
            try {

                    if (! $user = JWTAuth::parseToken()->authenticate()) {
                            return response()->json(['user_not_found'], 404);
                    }

            } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

                    return response()->json(['token_expired'], $e->getStatusCode());

            } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

                    return response()->json(['token_invalid'], $e->getStatusCode());

            } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

                    return response()->json(['token_absent'], $e->getStatusCode());

            }
            $userdata = User::with(['detail','roles'])->where('id',$user->id)->first();
            return response()->json(compact('userdata'));
    }

    public function uploadExcel(Request $request){
        //validate the xls file
        $this->validate($request, array(
            'file'      => 'required'
        ));
 
        if($request->hasFile('file')){
            $extension = File::extension($request->file->getClientOriginalName());
            if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {
 
                $path = $request->file->getRealPath();
                // $data = Excel::load($path, function($reader) {
                // })->get();
                $data = Excel::toCollection(new UsersImport, $request->file);
                foreach($data as $key => $value){
                    foreach($value as $value2){
                        if($value2['tanggal'] < 10){
                            $tanggal = '0'.$value2['tanggal'];
                        }else{
                            $tanggal = $value2['tanggal'];
                        }
                        if($value2['bulan'] < 10){
                            $bulan = '0'.$value2['bulan'];
                        }else{
                            $bulan = $value2['bulan'];
                        }
                        $password = trim($tanggal.'/'.$bulan.'/'.$value2['tahun']);
                
                        $user = new User();
                        $user->name = $value2['name'];
                        $user->username = $value2['username'];
                        $user->password = Hash::make($password);
                        $user->save();
    
                        $detailUser = new UsersDetail();
                        $detailUser->tanggal_lahir = $value2['tahun'].'-'.$bulan.'-'.$tanggal;
                        $detailUser->tempat_lahir = $value2['tempat_lahir'];
                        $detailUser->alamat = $value2['alamat'];
                        $detailUser->kelas = $value2['kelas'];
                        $detailUser->angkatan = $value2['angkatan'];
                        $detailUser->user_id = $user->id;
                        $detailUser->save();
    
                        if ($value2['roles']) {
                            $user->syncRoles(explode(',', $value2['roles']));
                        }
                    }
                    
                }
                return response()->json(['status'=>'success','msg'=> $user]);
            }else {
                return response()->json(['status'=>'error','msg'=>'Data siswa gagal ditambahkan']);
            }
        }
    }
}
