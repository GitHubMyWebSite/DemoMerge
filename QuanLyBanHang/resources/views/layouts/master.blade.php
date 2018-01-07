<!DOCTYPE html>
<html lang="en">
<head>
  <title>@yield('title')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand active" href="/QuanLyBanHang/sanpham">Quản lý bán hàng</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="/QuanLyBanHang/dangnhap"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="/QuanLyBanHang/dangnhap"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
  </nav>
  <main role="main" class="container">
      <div class="row row-offcanvas row-offcanvas-right">
      <div class="col-6 col-md-3 sidebar-offcanvas" id="sidebar">
          <div class="list-group">
            <a href="#" class="list-group-item active">Menu</a>
            <a href="/QuanLyBanHang/sanpham" class="list-group-item">Quản lý sản phẩm</a>
            <a href="/QuanLyBanHang/nguoidung" class="list-group-item">Quản lý người dùng </a>
          </div>
        </div><!--/span-->
        <div class="col-12 col-md-9">
          <div class="row">
            <div class="col-12">
             @yield("main")
            </div><!--/span-->
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->
    </main>
</body>
</html>