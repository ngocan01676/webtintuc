<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table="comment";
    public function tintuc()
    {
    	return $this->belogsTo("App\tintuc","idtinTuc",'id');
    }
    public function user()
    {
    	return $this->belongsTo('App\user','idUser','id');
    }

}
