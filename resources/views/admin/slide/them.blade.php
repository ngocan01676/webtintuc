@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Product
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
        <div class="alert alert-success">{{session('thongbao')}}</div>
        @endif
        <form action="admin/slide/them" method="POST" enctype="multipart/form-data">
         <input type="hidden" name="_token" value="{{csrf_token()}}"/>



         <div class="form-group">
          <label>Tên</label>
          <input class="form-control" name="txtten" placeholder="Please" />
        </div>
        <div class="form-group">
          <label>Nội Dung</label>
          <textarea name="txtnoidung" id="demo" class="form-control ckeditor"></textarea>
        </div>
        <div class="form-group">
          <label>Link</label>
          <input class="form-control" name="txtlink" placeholder="Please" />
        </div>
    


        <div class="form-group">
          <label>Images</label>
          <input type="file" name="txthinh">
        </div>

      
        <button type="submit" class="btn btn-default">Product Add</button>
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

