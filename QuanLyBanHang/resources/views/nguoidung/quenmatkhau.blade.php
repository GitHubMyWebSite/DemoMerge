@extends('layouts.dangnhap')
@section('main')
@if(isset($ms_capnhat))
    @if($ms_capnhat == true)
        <script>
             alert("Thay đổi mật khẩu thành công");
        </script>
    @else
        <script>
                alert("Không tìm thấy tài khoản kiểm tra lại");
        </script>
    @endif
@else

@endif
<div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            {{ Form::open(array('url' => 'dangnhap/quenmatkhau', 'method' => 'post', 'class' => 'form-signin')) }}
                <span id="reauth-email" class="reauth-email"></span>
                <span id="reauth-email" class="reauth-email"></span>
                <input type="email" id="taikhoan"  name="taikhoan" class="form-control" placeholder="Email address" required autofocus>
                <input type="password" id="matkhau"  name="matkhau" class="form-control" placeholder="New Password" required>
                <input type="password" id="matkhaunhaplai"  name="matkhaunhaplai" class="form-control" placeholder="Again Password" required>
                <button class="btn btn-lg btn-primary btn-block btn-signin" id="checkpass" type="submit" >Đổi mật khẩu</button>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="reset">Tạo lại</button>
            {{ Form::close() }}<!-- /form -->
            <a href="/QuanLyBanHang/dangnhap" class="forgot-password">
                Đăng nhập
            </a>
</div><!-- /card-container -->
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