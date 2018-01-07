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

class NguoiDungController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function danhsach()
    {
        $nguoidung = DB::table('dangnhap')->get();
        return view('nguoidung/danhsach',compact('nguoidung'));
    }
    public function sua($ma)
    {
        if(session()->has('dangnhapthanhcong') && session()->get('dangnhapthanhcong') == true){
            // return redirect('dangnhap');
          }else{
              return redirect('dangnhap');
          }
        try {
            $nguoidung = DB::table('dangnhap')->where("Ma",$ma)->get();
         } catch (Exception $e) {
             echo 'Caught exception: ',  $e->getMessage(), "\n";
         } finally {
             
         }
        return view("nguoidung/suadangnhap",compact('nguoidung'));
    }
    public function capnhap(Request $request)
    {
        if(session()->has('dangnhapthanhcong') && session()->get('dangnhapthanhcong') == true){
            // return redirect('dangnhap');
          }else{
              return redirect('dangnhap');
          }
        $ma = $request->input("ma");
        $matkhau = $request->input("matkhau");
        $trangthai = $request->input("trangthai");
        try {
            DB::table('dangnhap')
            ->where('Ma', $ma)
            ->update(['MatKhau' => $matkhau,'TrangThai' => $trangthai]);
            $nguoidung = DB::table('dangnhap')->where("Ma",$ma)->get();
            $ms_capnhat = true;
         } catch (Exception $e) {
             echo 'Caught exception: ',  $e->getMessage(), "\n";
             $ms_capnhat = false;
         } finally {
             
         }
        return view("nguoidung/suadangnhap",compact('nguoidung','ms_capnhat'));
    }
    public function xoa(Request $request)
    {
        if(session()->has('dangnhapthanhcong') && session()->get('dangnhapthanhcong') == true){
            // return redirect('dangnhap');
          }else{
              return redirect('dangnhap');
          }
        try {
            $maxoa = $request->input("maxoa");
            DB::table('dangnhap')->where('Ma',$maxoa)->delete();
            $nguoidung = DB::table('dangnhap')->get();
             $ms_xoa = true;
         } catch (Exception $e) {
             echo 'Caught exception: ',  $e->getMessage(), "\n";
             $ms_xoa = false;
         } finally {
             
         }
         return view("nguoidung/danhsach",compact('nguoidung','ms_xoa'));
    }
    public function timkiem(Request $request)
    {

        try {
            $timkiem = $request->input("timkiem");
            $nguoidung = DB::table('dangnhap')
            ->where('Ma', 'like', "%$timkiem%")
            ->orwhere('TaiKhoan','like',"%$timkiem%")
            ->get();
           
         } catch (Exception $e) {
             echo 'Caught exception: ',  $e->getMessage(), "\n";
            
         } finally {
             
         }
         return view("nguoidung/danhsach",compact('nguoidung'));
    }
}
