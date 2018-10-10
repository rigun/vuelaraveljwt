<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

use App\Role;
use App\UsersDetail;
use DB;
use Session;
use Input;

class UserController extends Controller
{
    public function index()
    {
        $users = User::whereRoleIs('user')->paginate(10);
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
        $users = User::with('detail')->whereRoleIs('user')->paginate(10);
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
            $detailUser->save();

          }else{
            $detailUser = new UsersDetail();
            $detailUser->tanggal_lahir = $request->input('detail.tanggal_lahir');
            $detailUser->tempat_lahir = $request->input('detail.tempat_lahir');
            $detailUser->alamat = $request->input('detail.alamat');
            $detailUser->kelas = $request->input('detail.kelas');
            $detailUser->angkatan = $request->input('detail.angkatan');
            $detailUser->user_id = $id;
            $detailUser->save();
          }
          
    
         
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
            return response()->json(['statur'=>'success','msg'=>'Data siswa berhasil dihapus']);
        } else {
            return response()->json(['statur'=>'error','msg'=>'Gagal menghapus data Siswa']);
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
            $roles = $user->roles->first()->name;
            return response()->json(compact('user'));
    }
}
