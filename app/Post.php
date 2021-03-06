<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public function user(){
        return $this->belongsTo(User::class,'author_id');
    }
    public function kategori(){
        return $this->belongsToMany('App\Kategori','kategori_post','post_id','kategori_id');
    }
    public function foto(){
        return $this->belongsTo('App\Upload','picture_id');
    }
}
