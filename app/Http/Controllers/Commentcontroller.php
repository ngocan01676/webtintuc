<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class Commentcontroller extends Controller
{
    public function getxoa($id)
    { 
    	$comment=Comment::find($id);
         $comment->delete();
         return Redirect()->back();


    }
}
