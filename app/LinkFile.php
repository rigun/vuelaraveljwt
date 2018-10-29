<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LinkFile extends Model
{
    public function user(){
        return $this->belongsTo(User::class,'author_id');
    }
}
