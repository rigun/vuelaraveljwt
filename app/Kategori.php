<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    public function post(){
        return $this->belongsToMany('App\Post','kategori_post','kategori_id','post_id');

    }
}
