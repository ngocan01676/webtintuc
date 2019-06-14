@extends('admin.layout.index')
@section('content')
  <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category
                            <small>Edit</small>
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
                        <form action="admin/theloai/sua/{{$theloai->id}}" method="POST">
                           <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Tên</label>
                                <input class="form-control" name="txtten" placeholder="Please Enter Category Name" value="{{$theloai->Ten}}" />
                            </div>
                            <div class="form-group">
                                <label>Tên Không dấu</label>
                                <input class="form-control" name="txttenkhongdau" placeholder="Please Enter Category Order" value="{{$theloai->TenKhongDau}}" />
                            </div>
                        
                            <button type="submit" class="btn btn-default">Category Edit</button>
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