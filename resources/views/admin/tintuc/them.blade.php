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
                <form action="admin/tintuc/them" method="POST" enctype="multipart/form-data">
                   <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                   <div class="form-group">
                    <label>Thể Loại</label>
                    <select class="form-control" name="txttheloai" id="theloai">
                      @foreach($theloai as $tl)
                      <option value="{{$tl->id}}">{{$tl->Ten}}</option>
                      @endforeach


                  </select>
              </div>
              <div class="form-group">
                <label>Loại Tin</label>
                <select class="form-control" name="txtloaitin" id="loaitin">
                  @foreach($loaitin as $lt)
                  <option value="{{$lt->id}}">{{$lt->Ten}}</option>
                  @endforeach


              </select>
          </div>
          <div class="form-group">
            <label>Tiêu Đề</label>
            <input class="form-control" name="txttieude" placeholder="Please" />
        </div>
        <div class="form-group">
            <label>Tóm tắt</label>
            <textarea name="txttomtat" id="demo" class="form-control ckeditor"></textarea>
        </div>
        <div class="form-group">
            <label>Nội Dung</label>
            <textarea name="txtnoidung" id="demo" class="form-control ckeditor"></textarea>
        </div>


        <div class="form-group">
            <label>Images</label>
            <input type="file" name="txthinh">
        </div>

        <div class="form-group">
            <label>Nổi Bật</label>
            <label class="radio-inline">
                <input name="txtnoibat" value="1" checked="" type="radio">Có
            </label>
            <label class="radio-inline">
                <input name="txtnoibat" value="0" type="radio">Không
            </label>
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
@section('script')
<script>
    $(document).ready(function(){
      $("#theloai").change(function(){
         var idtheloai=$(this).val();
             //alert(idtheloai);
             $.get("admin/ajax/loaitin/"+idtheloai,function(data){
                   //alert(data);
                   $("#loaitin").html(data);

               });

         });

  });
</script>
@endsection
