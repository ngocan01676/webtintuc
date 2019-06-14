<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theloai;
use App\Slide;
use App\Loaitin;
use App\Tintuc;
use App\Comment;
use Auth;

class Pagecontroller extends Controller
{
    


    function __construct()
    {
    	$theloai=Theloai::all();
    	$slide=Slide::all();
       view()->share('theloai',$theloai);
       view()->share('slide',$slide);
       if(Auth::check())
       {
        view()->share('nguoidung',Auth::user());
       }
    }

function trangchu()
{
	
	return view('page.trangchu');
}
public function lienhe()
{
	$theloai=Theloai::all();
	return view('page.lienhe');
}
public function loaitin($id)
{  
  $loaitin=Loaitin::find($id);
  $tintuc=Tintuc::where('idLoaitin',$id)->paginate(4);
  return view('page.loaitin',['loaitin'=>$loaitin,'tintuc'=>$tintuc]);
}
public function tintuc($id){

   $tintuc=Tintuc::find($id);
   $tinnoibat=Tintuc::where('NoiBat',1)->take(4)->get();
   $tinlienquan=Tintuc::where('idLoaiTin',$tintuc->idLoaiTin)->take(4)->get();
     if(Auth::check())
       {
          $nguoidung=  Auth::user();
       }

   return view('page.tintuc',['tintuc'=>$tintuc,'tinnoibat'=>$tinnoibat,'tinlienquan'=>$tinlienquan,'nguoidung'=>$nguoidung]);
}
public function getdangnhap()
{
  return view('page.dangnhap');
}
public function postdangnhap(Request $r)
{
  $this->validate($r,
    [
      'email'=>'required|email',
      'password'=>'required|min:5'
      
    ],
    [

      'email.required'=>'Vui lòng nhập email',
      'email.email'=>'email không hợp lệ',
      'password.required'=>'Vui lòng nhập mật khẩu',
      'password.min'=>'Mật khẩu quá ngắn'
    ]);
     if(Auth::attempt(['email'=>$r->email,'password'=>$r->password]))
     {
      return redirect('trangchu');
     }else{
      return redirect()->back()->with('thongbao','Đăng nhập thất bại @@');
     }
}
public function dangxuat()
{
  Auth::logout();
  return redirect('dangnhap');
}
public function postcmt(Request $r)
{
    $comment=new Comment;
    $comment->idUser=Auth::user()->id;
    $comment->idTinTuc=$r->idtintuc;
    $comment->NoiDung=$r->txtcomment;
    $comment->save();
    return redirect('tintuc/'.$r->idtintuc)->with('thongbao','Viết bình luận thành công');


}
}
