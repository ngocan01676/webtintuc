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
                        <option 
                         @if($tintuc->loaitin->theloai->id==$tl->id)
                        {{"selected"}}
                    
                         @endif value="{{$tl->id}}">
                        {{$tl->Ten}}</option>
                      @endforeach


                  </select>
              </div>
              <div class="form-group">
                <label>Loại Tin</label>
                <select class="form-control" name="txtloaitin" id="loaitin">
                  @foreach($loaitin as $lt)
                 
                   <option 
                         @if($tintuc->loaitin->id==$lt->id)
                        {{"selected"}}
                    
                         @endif value="{{$lt->id}}">
                        {{$lt->Ten}}</option>
                  @endforeach


              </select>
          </div>
          <div class="form-group">
            <label>Tiêu Đề</label>
            <input class="form-control" name="txttieude" value="{{$tintuc->TieuDe}}" placeholder="Please" />
        </div>
        <div class="form-group">
            <label>Tóm tắt</label>
            <textarea name="txttomtat" id="demo"  value="" class="form-control ckeditor">{{$tintuc->TomTat}}</textarea>
        </div>
        <div class="form-group">
            <label>Nội Dung</label>
            <textarea name="txtnoidung" id="demo" value="" class="form-control ckeditor">{{$tintuc->NoiDung}}</textarea>
        </div>


        <div class="form-group">
            <label>Images</label>
            <p><img src="upload/tintuc/{{$tintuc->Hinh}}" width="100px" height="100px" alt=""></p>
            <input type="file" name="txthinh">
        </div>

        <div class="form-group">
            <label>Nổi Bật</label>
            <label class="radio-inline">
                <input name="txtnoibat" value="1" type="radio" @if($tintuc->NoiBat==1) {{"Checked"}} @endif >Có
            </label>
            <label class="radio-inline">
                <input name="txtnoibat" value="0" type="radio" @if($tintuc->NoiBat==0) {{"Checked"}} @endif>Không
            </label>
        </div>
        <button type="submit" class="btn btn-default">Product Add</button>
        <button type="reset" class="btn btn-default">Reset</button>
        <form>
        </div>
    </div>
    <!-- /.row -->
           <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category
                            <small>List</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->

                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                           @if(session('thongbao'))
                    <div class="alert alert-success">{{session('thongbao')}}</div>
                    @endif
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Người dùng</th>    
                                <td>Nội Dung</td>
                                <td>Ngày đăng</td>
                          
                                <th>Delete</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tintuc->comment as $cm)
                            <tr class="odd gradeX" align="center">
                                <td>{{$cm->id}}</td>
                                <td>{{$cm->user->name}}
                            
                                <td>{{$cm->NoiDung}}</td>
                                <td>{{$cm->created_at}}</td>
                              
                                
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/comment/xoa/{{$cm->id}}"> Delete</a></td>
                             
                            </tr>
                         @endforeach
                        </tbody>
                    </table>

                </div>
               
                <!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>

<!-- /#page-wrapper -->
@endsection