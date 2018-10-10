<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersDetail extends Model
{
        //
        protected $fillable = [
            'tempat_lahir', 'tanggal_lahir', 'alamat', 'kelas',
            'poin', 'predikat', 'angkatan', 'foto','status','user_id'
        ];
    
        public function user(){
            return $this->belongsTo(User::class);
        }
}
