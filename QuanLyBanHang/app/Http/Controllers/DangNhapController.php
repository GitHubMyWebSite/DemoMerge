<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Cookie\CookieJar;
use Session;

class DangNhapController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function dangnhap()
    {
        return view('nguoidung/dangnhap');
    }
    public function kiemtradangnhap(Request $request)
    {
       
        try {
            $taikhoan = $request->input("taikhoan");
            $matkhau = $request->input("matkhau");
            $nhotaikhoan = $request->input("nhotaikhoan");
            $sql = "SELECT * FROM dangnhap where TaiKhoan = '$taikhoan' and MatKhau = '$matkhau'";
            $dangnhap = DB::select($sql);
            if($dangnhap != null){
                session()->put('dangnhapthanhcong', true);
                if($nhotaikhoan == true){
                    session()->put('nhotaikhoan', true);
                    session()->put('taikhoan', $taikhoan);
                    session()->put('matkhau', $matkhau);
                }else{
                   
                    session()->forget('nhotaikhoan');
                    session()->forget('taikhoan');
                    session()->forget('matkhau');
                }
                return redirect('sanpham/danhsach');
            }else{
                session()->forget('dangnhapthanhcong');
                $mess_check = false;
                return view('nguoidung/dangnhap',compact('mess_check'));
            }
             
         } catch (Exception $e) {
             echo 'Caught exception: ',  $e->getMessage(), "\n";
         } finally {
             
         }
        
    }
    public function quenmatkhau()
    {
        return view('nguoidung/quenmatkhau');
    }
    public function doimatkhau(Request $request)
    {
        $taikhoan = $request->input("taikhoan");
        $matkhau = $request->input("matkhau");
        try {
            $nguoidung = DB::table('dangnhap')->where("TaiKhoan", $taikhoan)->get();
            if(!$nguoidung->isEmpty()){
                DB::table('dangnhap')->where('TaiKhoan', $taikhoan)
                ->update(['MatKhau' => $matkhau]);
                $ms_capnhat = true;
            }else {
                $ms_capnhat = false;
            }
           
         } catch (Exception $e) {
             echo 'Caught exception: ',  $e->getMessage(), "\n";
             $ms_capnhat = false;
         } finally {
             
         }
         return view('nguoidung/quenmatkhau',compact('ms_capnhat','nguoidung'));
    }
    public function taotaikhoan()
    {
        return view('nguoidung/taotaikhoan');
    }
    public function taikhoan(Request $request)
    {
       $taikhoan = $request->input("taikhoan");
       $matkhau = $request->input("matkhau");
       try {
           $check = DB::table('dangnhap')->insert(
            ['TaiKhoan' => $taikhoan, 'MatKhau' => $matkhau, 'TrangThai'=>true]);
            $ms_them = true;
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
            $ms_them = false;
        } finally {
            
        }
        return view('nguoidung/taotaikhoan',compact('ms_them'));
    }
}
