@extends('layouts.master')
@section('title')
  Sửa sản phẩm
@stop
@section('main')
@if(isset($ms_capnhat))
    @if($ms_capnhat == true)
    <div class="alert alert-success">
        <strong>Success!</strong> cập nhật thành công;
    </div>
    @else
    <div class="alert alert-danger">
        <strong>Error!</strong> cập nhật thất bại;
    </div>
    @endif
@else

@endif
@foreach($sanpham as $value)
    {{ Form::open(array('url' => 'sanpham/capnhat','method' => 'post')) }}
    <div class="form-group">
        <label for="ma"> <h3> Sửa sản phẩm </h3> </label>
        <input type="hidden" class="form-control" id="ma" name="ma" value="{{$value->Ma}}">
    </div>
    <div class="form-group">
        <label for="tensanpham">Tên sản phẩm:</label>
        <input type="text" class="form-control" id="tensanpham" placeholder="Nhập tên sản phẩm" name="tensanpham" value="{{$value->TenSanPham}}" required>
    </div>
    <div class="form-group">
        <label for="soluong">Số lượng:</label>
        <input type="number" class="form-control" id="soluong" placeholder="Nhập số lượng" name="soluong" value="{{$value->SoLuong}}" required >
    </div>
    <div class="form-group">
        <label for="nhacungcap">Nhà cùng cấp:</label>
        <input type="text" class="form-control" id="nhacungcap" placeholder="Nhập nhà cung cấp" name="nhacungcap" value="{{$value->NhaCungCap}}" required>
    </div>
    <a href="/QuanLyBanHang/sanpham/danhsach" class="btn btn-info">Quay lại</a>
    <button type="submit" class="btn btn-primary">Sửa</button>
    <button type="reset" class="btn btn-warning">Đặt lại</button>
    {{ Form::close() }}
@endforeach
@stop


