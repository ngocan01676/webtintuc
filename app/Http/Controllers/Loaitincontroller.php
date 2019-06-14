<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Loaitin;
use App\Theloai;

class Loaitincontroller extends Controller
{
    

    public function getdanhsach()
    {  

    	$loaitin=Loaitin::all();



    	return view('admin.loaitin.danhsach',['loaitin'=>$loaitin]);
    }
     public function getthem()
    {
    	$theloai=Theloai::all();
    	return view('admin.loaitin.them',['theloai'=>$theloai]);
    }
    public function postthem(Request $r)
    {

        $this->validate($r,
        
         [

             'txtten'=>'required|min:3|max:100|unique:loaitin,Ten',

         ],
         [

               'txtten.required'=>'bạn chưa nhập tên thể loại',
               'txtten.min'=>'tên quá ngắn',
               'txtten.max'=>'tên quá dài',
         ]


        );
        $loaitin=new Loaitin;
        $loaitin->Ten=$r->txtten;
        $loaitin->idTheLoai=$r->txttheloai;
        $loaitin->TenKhongdau=$r->txttenkhongdau;

        $loaitin->save();
        return redirect('admin/loaitin/them')->with('thongbao','thêm thành công');
    }
     public function getsua($id)
    
    { 
        $loaitin=Loaitin::where('id','=',$id)->first();
        $theloai=Theloai::all();
    	return view('admin.loaitin.sua',['loaitin'=>$loaitin,'theloai'=>$theloai]);
    }
    public function postsua(Request $r,$id)
    {
       
        $this->validate($r,
        
         [

             'txtten'=>'required|min:3|max:100',

         ],
         [

               'txtten.required'=>'bạn chưa nhập tên thể loại',
               'txtten.min'=>'tên quá ngắn',
               'txtten.max'=>'tên quá dài',
         ]


        );
        $loaitin =loaitin::find($id);
        $loaitin->idTheLoai=$r->txttheloai;
        $loaitin->Ten=$r->txtten;
        $loaitin->TenKhongDau=$r->txttenkhongdau;
        $loaitin->save();
        return redirect('admin/loaitin/sua/'.$id)->with('thongbao','Sửa Thành Công');

    }
    public function getxoa($id)
    {
        $loaitin=Loaitin::find($id);
        $loaitin->delete();
        return redirect('admin/loaitin/danhsach')->with('thongbao','xóa thành công');
    }
}
