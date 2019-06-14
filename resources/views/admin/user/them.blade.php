@extends('admin.layout.index')
@section('content')
@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Category
                    <small>Add</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @if(count($errors)>0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $er)
                    {{$er}}<br>

                    @endforeach
                </div>
                @endif
                @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
                @endif
                <form action="admin/user/them" method="POST" >

                   <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                   <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="txtten" placeholder="Please Enter Category Order" />
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input  type="email" class="form-control" name="txtemail" placeholder="Please Enter Category Keywords" />
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="txtpass" placeholder="Please Enter Category Keywords" />
                </div>
                <div class="form-group">
                    <label>Re-password</label>
                    <input type="password"  class="form-control" name="txtrepass" placeholder="Please Enter Category Keywords" />
                </div>
                <div class="form-group">
                    <label>Quyền</label>
                    <label class="radio-inline">
                        <input name="txtquyen" value="1" checked="" type="radio">Admin
                    </label>
                    <label class="radio-inline">
                        <input name="txtquyen" value="0" type="radio">Thường
                    </label>
                </div>

                <button type="submit" class="btn btn-default">Category Add</button>
                <button type="reset" class="btn btn-default">Reset</button>
                <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
    @endsection

