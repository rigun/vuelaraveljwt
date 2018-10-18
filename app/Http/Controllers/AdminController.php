<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use DB;
use Session;
use Hash;
use Input;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = User::whereRoleIs('administrator')->get();
      return view('manage.admin.index')->withUsers($users);
    }

    public function apiIndex(){
      $user = User::whereRoleIs('administrator')->get();
      return $user;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $roles = Role::all();
      return view('manage.admin.create')->withRoles($roles);
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
        ]);

        if (!empty($request->password)) {
          $password = trim($request->password);
        } else {
          # set the manual password
          $length = 10;
          $keyspace = '123456789abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
          $str = '';
          $max = mb_strlen($keyspace, '8bit') - 1;
          for ($i = 0; $i < $length; ++$i) {
              $str .= $keyspace[random_int(0, $max)];
          }
          $password = $str;
        }
      
        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = Hash::make($password);
        $user->save();
  
        if ($request->roles) {
          $user->syncRoles(explode(',', $request->roles));
        }
  
        return response()->json(['status' => 'success','msg'=>'Admin berhasil dibuat']);
            

      // if () {
      //
      // } else {
      //   Session::flash('danger', 'Sorry a problem occurred while creating this user.');
      //   return redirect()->route('users.create');
      // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $user = User::where('id', $id)->with('roles')->first();
      return view("manage.admin.show")->withUser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $roles = Role::all();
      $user = User::where('id', $id)->with('roles')->first();
      return view("manage.admin.edit")->withUser($user)->withRoles($roles);
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
        'username' => 'required|unique:users,username,'.$id
      ]);

      $user = User::findOrFail($id);
      $user->name = $request->name;
      $user->username = $request->username;

      if (!empty($request->password)) {
        $password = trim($request->password);
        $user->password = Hash::make($password);
        $json=['status' => 'success','msg'=>'data dan password berhasil di update'];
      }else{
        if ($request->password_options == true) {
          $user->password = Hash::make('12345678');
          $json=['status' => 'success','msg'=>'data berhasil di update dan password berhasil di update menjadi 12345678'];
        }else{
          $json=['status' => 'success','msg'=>'data berhasil di update tanpa merubah password'];
        } 
      }
      $user->save();
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
        return response()->json(['statur'=>'success','msg'=>'Admin berhasil dihapus']);
      } else {
        return response()->json(['statur'=>'error','msg'=>'Gagal menghapus Admin']);
      }
    }
    public function auth(Request $request){
      $user = User::find(Auth::user()->id);
      return response([
              'status' => 'success',
              'data' => $user
          ]);
    }
}
