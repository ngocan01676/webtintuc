<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tintuc;
use App\Theloai;
use App\Loaitin;
use App\Comment;
class Tintuccontroller extends Controller
{

 public function getdanhsach()
 {  
     $tintuc=Tintuc::orderBy('id','DESC')->get();
     return view('admin/tintuc/danhsach',['tintuc'=>$tintuc]);

 }
 public function getthem()
 {  
    $theloai=Theloai::all();
    $loaitin=Loaitin::all();
    return view('admin.tintuc.them',['theloai'=>$theloai,'loaitin'=>$loaitin]);
}
public function postthem(Request $r)
{ 
   $this->validate($r,
    [

     'txttieude'=>'required|max:200|min:5',
     'txttomtat'=>'required|min:5|max:200',
     'txtnoidung'=>'required',

 ],
 [
    'txttieude.required'=>'Bạn Chưa nhập Tiêu Đề',
    'txttomtat.required'=>'Bạn Chưa nhập tóm tắt',
    'txtnoidung.required'=>'Bạn Chưa nhập nội dung',

]);
   $tintuc=new Tintuc;
   $tintuc->TieuDe=$r->txttieude;
   $tintuc->TomTat=$r->txttomtat;
   $tintuc->NoiDung=$r->txtnoidung;
   $tintuc->NoiBat=$r->txtnoibat;
   $tintuc->idLoaiTin=$r->txtloaitin;
   if($r->hasFile('txthinh'))
   {
       $file=$r->file('txthinh');
       $name=$file->getClientOriginalName();
       $tenhinh= str_random(4)."_".$name;
       $file->move('upload/tintuc',$tenhinh);
       $tintuc->Hinh=$tenhinh;
   }else{
    $tintuc->Hinh='';
}
$tintuc->save();
return redirect('admin/tintuc/them')->with('thongbao','Thêm Mới Thành Công');

}
public function getsua($id)

{   
    $tintuc=Tintuc::find($id);
    $theloai=Theloai::all();
    $loaitin=Loaitin::all();
    return view('admin/tintuc/sua',['tintuc'=>$tintuc,'loaitin'=>$loaitin,'theloai'=>$theloai]);
}
public function postsua(Request $r,$id)
{
   $this->validate($r,
    [

     'txttieude'=>'required|max:200|min:5',
     'txttomtat'=>'required|min:5|max:200',
     'txtnoidung'=>'required',

 ],
 [
    'txttieude.required'=>'Bạn Chưa nhập Tiêu Đề',
    'txttomtat.required'=>'Bạn Chưa nhập tóm tắt',
    'txtnoidung.required'=>'Bạn Chưa nhập nội dung',

]);
   $tintuc=Tintuc::find($id);
   $tintuc->TieuDe=$r->txttieude;
   $tintuc->TomTat=$r->txttomtat;
   $tintuc->NoiDung=$r->txtnoidung;
   $tintuc->NoiBat=$r->txtnoibat;
   $tintuc->idLoaiTin=$r->txtloaitin;
   if($r->hasFile('txthinh'))
   {
       $file=$r->file('txthinh');
       $name=$file->getClientOriginalName();
       $tenhinh= str_random(4)."_".$name;
       $file->move('upload/tintuc',$tenhinh);
       unlink('upload/tintuc/'.$tintuc->Hinh);
       $tintuc->Hinh=$tenhinh;
   }
   $tintuc->save();
   return redirect('admin/tintuc/sua')->with('thongbao','Sửa Thành Công');

}
public function getxoa($id)
{
    $tintuc=Tintuc::find($id);
    $tintuc->delete();
    return redirect('admin/tintuc/danhsach')->with('thongbao','Xóa Thành Công');
}
}
