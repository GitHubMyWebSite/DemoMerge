@extends('layouts.master')
@section('title')
  Sửa người dùng
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
@foreach($nguoidung as $value)
    {{ Form::open(array('url' => 'nguoidung/capnhap','method' => 'post')) }}
    <div class="form-group">
        <label for="ma"> <h3> Sửa sản phẩm </h3> </label>
        <input type="hidden" class="form-control" id="ma" name="ma" value="{{$value->Ma}}">
    </div>
    <div class="form-group">
        <label for="taikhoan">Tài khoản </label>
        <input type="email" class="form-control" id="taikhoan" value="{{$value->TaiKhoan}}" placeholder="Nhập tên tài khoản" name="taikhoan" value="{{$value->TaiKhoan}}" disabled>
    </div>
    <div class="form-group">
        <label for="matkhau">Mật khẩu</label>
        <input type="password" id="matkhau"  name="matkhau" value="{{$value->MatKhau}}" class="form-control" placeholder="New Password" required>
    </div>
    <div class="form-group">
        <label for="matkhaunhaplai">Nhập lại mật khẩu</label>
        <input type="password" id="matkhaunhaplai"  name="matkhaunhaplai" value="{{$value->MatKhau}}" class="form-control" placeholder="Again Password" required>
    </div>
    <div class="form-group">
    <label for="trangthai">Example select</label>
    <select class="form-control" id="trangthai" name="trangthai">
    @if($value->TrangThai == true)
        <option value="1" selected>Hoat động</option>
        <option value="0">Không hoạt động</option>
    @else
        <option value="1" >Hoat động</option>
        <option value="0" selected>Vô hiệu hóa</option>
    @endif
    </select>
  </div>
    <a href="/QuanLyBanHang/nguoidung/danhsach" class="btn btn-info">Quay lại</a>
    <button type="submit" class="btn btn-primary" id="checkpass">Sửa</button>
    <button type="reset" class="btn btn-warning">Đặt lại</button>
    {{ Form::close() }}
@endforeach
<script>
$( "#checkpass" ).mouseover(function() {
    var pass1 = $("#matkhau").val();
    var pass2 = $("#matkhaunhaplai").val();
        if(pass1 !== pass2){
            alert("nhập lại mật khẩu không đúng");
            $("#matkhaunhaplai").val("");
            $("#matkhaunhaplai").focus();
           
        }else if(pass1 !== '' && pass2 !== '') {
            $("#matkhau").focus();
           // alert("đúng");
        }
  });
</script>
@stop


