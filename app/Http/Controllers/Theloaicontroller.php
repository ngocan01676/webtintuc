<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theloai;

class Theloaicontroller extends Controller
{
    public function getdanhsach()
    {  

    	$theloai=Theloai::all();



    	return view('admin.theloai.danhsach',['theloai'=>$theloai]);
    }
     public function getthem()
    {
    	return view('admin.theloai.them');
    }
    public function postthem(Request $r)
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
        $theloai=new Theloai;
        $theloai->Ten=$r->txtten;
        $theloai->TenKhongDau=$r->txttenkhongdau;
        $theloai->save();
        return redirect('admin/theloai/them')->with('thongbao','thêm thành công');
    }
     public function getsua($id)
    
    { 
        $theloai=Theloai::find($id);
    	return view('admin.theloai.sua',['theloai'=>$theloai]);
    }
    public function postsua(Request $r,$id)
    {
        $theloai=Theloai::find($id);
        $this->validate($r,
            [
                 'txtten'=>'required|unique:theloai,Ten|min:3|max:100',

            ],
            [
               'txtten.required'=>"Bạn chưa nhập tên",
               'txtten.unique'=>"Tên Thể loại đã tồn tại",
               'txtten.min'=>'tên quá ngắn',
               'txtten.max'=>'tên quá dài',

            ]);
        $theloai->Ten= $r->txtten;
        $theloai->TenKhongDau=$r->txttenkhongdau;
        $theloai->save();
        return redirect('admin/theloai/sua/'.$theloai->id)->with('thongbao','Sửa Thành Công');
    }
    public function getxoa($id)
    {
        $theloai=Theloai::find($id);
        $theloai->delete();
        return redirect('admin/theloai/danhsach')->with('thongbao','xóa thành công');
    }
}
