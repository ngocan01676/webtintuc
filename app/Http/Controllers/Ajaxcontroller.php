<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\loaitin;

class Ajaxcontroller extends Controller
{
	public function getloaitin($idtheloai)
	{
		$loaitin=loaitin::where('idTheLoai',$idtheloai)->get();
		foreach ($loaitin as $key) {
			echo    "<option value='".$key->id."'>".$key->Ten."</option>";
		}
	}
}
