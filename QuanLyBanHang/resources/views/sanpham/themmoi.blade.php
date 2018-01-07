@extends('layouts.master')
@section('title')
  Thêm mới sản phẩm
@stop
@section('main')
@if(isset($ms_them))
    @if($ms_them == true)
    <div class="alert alert-success">
        <strong>Success!</strong> thêm thành công;
    </div>
    @else
    <div class="alert alert-danger">
        <strong>Error!</strong> thêm thất bại;
    </div>
    @endif
@else

@endif
    {{ Form::open(array('url' => 'sanpham/themmoi','method' => 'post')) }}
    <div class="form-group">
        <label for="tensanpham">Tên sản phẩm:</label>
        <input type="text" class="form-control" id="tensanpham" placeholder="Nhập tên sản phẩm" name="tensanpham" required>
    </div>
    <div class="form-group">
        <label for="soluong">Số lượng:</label>
        <input type="number" class="form-control" id="soluong" placeholder="Nhập số lượng" name="soluong" required >
    </div>
    <div class="form-group">
        <label for="nhacungcap">Nhà cùng cấp:</label>
        <input type="text" class="form-control" id="nhacungcap" placeholder="Nhập nhà cung cấp" name="nhacungcap" required>
    </div>
    <a href="/QuanLyBanHang/sanpham/danhsach" class="btn btn-info">Quay lại</a>
    <button type="submit" class="btn btn-primary">Thêm mới</button>
    <button type="reset" class="btn btn-warning">Đặt lại</button>
    {{ Form::close() }}
@stop

