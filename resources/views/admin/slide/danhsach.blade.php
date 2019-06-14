@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
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
                    <th>Tên</th>    
                    <td>Hình</td>
                    <td>Nội dung</td>
                    <td>Link</td>
                    <td>XÓA</td>
                    <td>Sửa</td>
                </tr>
            </thead>
            <tbody>
                @foreach($slide as $slide)
                <tr class="odd gradeX" align="center">
                    <td>{{$slide->id}}</td>
                    <td>{{$slide->Ten}}</td>
                    <td><img src="upload/slide/{{$slide->Hinh}}" width="600px" height="200px" alt=""></td>

                    <td>{{$slide->NoiDung}}</td>
                    <td>{{$slide->link}}</td>


                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/slide/xoa/{{$slide->id}}"> Delete</a></td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/slide/sua/{{$slide->id}}">Edit</a></td>
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