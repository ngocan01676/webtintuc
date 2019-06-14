<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
//use Auth;
use Illuminate\Support\Facades\Auth;

class Usercontroller extends Controller
{
     
     public function getdangnhapAdmin()
     {
     	return view('admin.login');
     }
     public function postdangnhapAdmin(Request $r)
     {
     	$this->validate($r,
     		[

               'email'=>'required|email|max:50,|min:10',
               'password'=>'required|min:5',
     		],
     		[

              'email.required'=>'Không được để trống email',
              'password.required'=>'Không được để trống mật khẩu',

     		]);
       
          $mang=array('email'=>$r->email,'password'=>$r->password);
         //['email'=>$r->email,'password'=>$r->password]
           if(Auth::attempt($mang))
           {
           	return redirect('admin/theloai/danhsach');
           }else{
           	return redirect('admin/dangnhap')->with('thongbao','đăng nhập không thành công');
           }
     }
  public function getdangxuat()
  {
  	Auth::logout();
  	return view('admin.login');
  }
	public function getdanhsach()
	{  
		$user=User::all();
		return view('admin/user/danhsach',['user'=>$user]);

	}
	public function getthem()
	{  
		return view('admin/user/them');
	}
	public function postthem(Request $r)
	{ 
         $this->validate($r,
      	[

             'txtten'=>'required|min:5|max:20',
          'txtemail'=>'required|email|unique:users,email',
         'txtpass'=>'required|min:5|max:32',
          'txtrepass'=>'required|same:txtpass'
        	],
        	[
             'txtten.required'=>'Bạn chưa nhập tên',
               'txtemail.required'=>'bạn chưa nhập email',
               'txtemail.unique'=>'email đã tồn tại',
             'txtpass.required'=>'bạn chưa nhập password',
                'txtrepass.same'=>'mật khẩu không khớp', 

        	]);
          $user=new User;
        $user->name=$r->txtten;
         $user->email=$r->txtemail;
        $user->password=$r->txtpass;
       $user->quyen=$r->txtquyen;
       $user->save();
         return view('admin/user/them')->with('thongbao','Thêm mới thành công');
         
         
	}
	public function getsua($id)

	{   

	}
	public function postsua(Request $r,$id)
	{


	}
	public function getxoa($id)
	{

	}

}