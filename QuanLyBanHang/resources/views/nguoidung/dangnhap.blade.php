@extends('layouts.dangnhap')
@section('main')
@if(isset($mess_check))
    @if($mess_check == false)
        <script>
             alert("Đăng nhập không thành công kiểm tra tài khoản ");
        </script>
    @endif
@endif
<div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            {{ Form::open(array('url' => 'dangnhap', 'method' => 'post', 'class' => 'form-signin')) }}
                <span id="reauth-email" class="reauth-email"></span>
                @if(Session::has('nhotaikhoan'))
                    <input type="email" id="taikhoan"  name="taikhoan" value="{{Session::get('taikhoan')}}" class="form-control" placeholder="Email address" required autofocus>
                    <input type="password" id="matkhau"  name="matkhau" value="{{Session::get('matkhau')}}" class="form-control" placeholder="Password" required>
                @else
                    <input type="email" id="taikhoan"  name="taikhoan" class="form-control" placeholder="Email address" required autofocus>
                    <input type="password" id="matkhau"  name="matkhau" class="form-control" placeholder="Password" required>
                @endif
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me" name="nhotaikhoan"> Remember me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
            {{ Form::close() }}<!-- /form -->
            <a href="/QuanLyBanHang/dangnhap/quenmatkhau" class="forgot-password">
                Bạn quên mật khẩu ?
            </a>
            </br>
            <a href="/QuanLyBanHang/dangnhap/taotaikhoan" class="forgot-password">
                Tạo tài khoản mới
            </a>
</div><!-- /card-container -->

@stop