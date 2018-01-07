<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// đăng nhập
Route::get('/', function () {
    return redirect('dangnhap');
});
Route::get('dangnhap','DangNhapController@dangnhap');
Route::post('dangnhap','DangNhapController@kiemtradangnhap');
Route::get('dangnhap/taotaikhoan','DangNhapController@taotaikhoan');
Route::post('dangnhap/taotaikhoan','DangNhapController@taikhoan');
Route::get('dangnhap/quenmatkhau','DangNhapController@quenmatkhau');
Route::post('dangnhap/quenmatkhau','DangNhapController@doimatkhau');

// sản phẩm
Route::get('sanpham', function () {
    return redirect('sanpham/danhsach');
});
Route::get('sanpham/danhsach','SanPhamController@danhsach');
Route::get('sanpham/themmoi','SanPhamController@themoi');
Route::post('sanpham/themmoi', 'SanPhamController@postthemmoi');
Route::get('sanpham/sua/{ma}','SanPhamController@sua');
Route::post('sanpham/capnhat', 'SanPhamController@capnhat');
Route::get('sanpham/timkiem','SanPhamController@timkiem');
Route::get('sanpham/xoa','SanPhamController@xoa');

// người dùng
Route::get('nguoidung', function () {
    return redirect('nguoidung/danhsach');
});
Route::get('nguoidung/danhsach','NguoiDungController@danhsach');
Route::get('nguoidung/sua/{ma}','NguoiDungController@sua');
Route::post('nguoidung/capnhap','NguoiDungController@capnhap');
Route::get('nguoidung/timkiem','NguoiDungController@timkiem');
Route::get('nguoidung/xoa','NguoiDungController@xoa');