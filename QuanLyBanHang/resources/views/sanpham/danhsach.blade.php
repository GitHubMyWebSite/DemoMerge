
@extends('layouts.master')
@section('title')
  Danh sách sản phẩm
@stop
@section('main')
@if(isset($ms_xoa))
    @if($ms_xoa == true)
    <div class="alert alert-success">
        <strong>Success!</strong> xóa thành công;
    </div>
    @else
    <div class="alert alert-danger">
        <strong>Error!</strong> xóa thất bại;
    </div>
    @endif
@else

@endif
</br>
{{ Form::open(array('url' => 'sanpham/timkiem','method' => 'get')) }}
<div class="form-inline">
        <input type="text" class="form-control" id="timkiem" name="timkiem" placeholder="nhập tìm kiếm">
        <button type="submit" class="btn btn-primary" > Tìm kiếm </button>
        <a href="/QuanLyBanHang/sanpham/themmoi" class="btn btn-primary pull-right">Thêm mới sản phẩm </a>
</div> 

{{ Form::close() }}
</div>
</br>
<table class="table table-condensed">
    <thead>
      <tr>
        <th>Mã</th>
        <th>Tên sản phẩm</th>
        <th>Số lượng</th>
        <th>Nhà cung câp</th>
        <th>Thao tác</th>
      </tr>
    </thead>
    <tbody>
    @if($sanpham != null)
      @foreach ($sanpham as $value)
      <tr>
          <td>{{$value->Ma}}</td>
          <td>{{$value->TenSanPham}}</td>
          <td>{{$value->SoLuong}}</td>
          <td>{{$value->NhaCungCap}}</td>
          <td>
            <a href="/QuanLyBanHang/sanpham/sua/{{$value->Ma}}" type="button" class="btn btn-warning">Sửa</a>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal" onclick="getmaxoa({{$value->Ma}})">Xóa</button>
          </td>
        </tr>
      @endforeach
    @else 
        <tr>
        <td colspan="4"> Không có dữ liệu </td>
        </tr>
    @endif  
    </tbody>
  </table>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Xác nhận</h4>
        </div>
        <div class="modal-body">
        {{ Form::open(array('url' => 'sanpham/xoa','method' => 'get')) }}
          <h4>  bạn có đồng ý xóa sản phẩm này không ? </h4>
          <input type="hidden" id="maxoa" name="maxoa" >
          <button type="submit" class="btn btn-primary">Đồng ý</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        {{ Form::close() }}
        
        </div>
      </div>
      
    </div>
 
<script>
  function getmaxoa(ma){
    $("#maxoa").val(ma);
  }
</script>
@stop

