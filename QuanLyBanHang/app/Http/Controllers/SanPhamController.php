<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Session;

class SanPhamController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct() // tại sao lại không dùng được __contruct
    {
        if(session()->has('dangnhapthanhcong') && session()->get('dangnhapthanhcong') == true){
           //return redirect('dangnhap');
        }else{
            return redirect('dangnhap');
        }
    }
    public function danhsach()
    {
        if(session()->has('dangnhapthanhcong') && session()->get('dangnhapthanhcong') == true){
           // return redirect('dangnhap');
         }else{
             return redirect('dangnhap');
         }
        $sanpham = DB::table('sanpham')->get();
        return view("sanpham/danhsach",compact('sanpham'));
    }
    public function themoi()
    {
        if(session()->has('dangnhapthanhcong') && session()->get('dangnhapthanhcong') == true){
            // return redirect('dangnhap');
          }else{
              return redirect('dangnhap');
          }
        return view("sanpham/themmoi");
    }
    public function postthemmoi(Request $request)
    {
        if(session()->has('dangnhapthanhcong') && session()->get('dangnhapthanhcong') == true){
            // return redirect('dangnhap');
          }else{
              return redirect('dangnhap');
          }
        //$ma = $request->input("ma");
       $tensanpham = $request->input("tensanpham");
       $soluong = $request->input("soluong");
       $nhacungcap = $request->input("nhacungcap");
       try {
           $check = DB::table('sanpham')->insert(
            ['TenSanPham' => $tensanpham, 'SoLuong' => $soluong, 'NhaCungCap'=>$nhacungcap]);
            $ms_them = true;
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
            $ms_them = false;
        } finally {
            
        }
       return view("sanpham/themmoi",compact('ms_them'));
    }
    public function sua($ma)
    {
        if(session()->has('dangnhapthanhcong') && session()->get('dangnhapthanhcong') == true){
            // return redirect('dangnhap');
          }else{
              return redirect('dangnhap');
          }
        try {
            $sanpham = DB::table('sanpham')->where("Ma",$ma)->get();
         } catch (Exception $e) {
             echo 'Caught exception: ',  $e->getMessage(), "\n";
         } finally {
             
         }
        return view("sanpham/sua",compact('sanpham'));
    }
    public function capnhat(Request $request)
    {
        if(session()->has('dangnhapthanhcong') && session()->get('dangnhapthanhcong') == true){
            // return redirect('dangnhap');
          }else{
              return redirect('dangnhap');
          }
        $ma = $request->input("ma");
        $tensanpham = $request->input("tensanpham");
        $soluong = $request->input("soluong");
        $nhacungcap = $request->input("nhacungcap");
        try {
            DB::table('sanpham')
            ->where('Ma', $ma)
            ->update(['TenSanPham' => $tensanpham,'SoLuong' => $soluong,'NhaCungCap'=>$nhacungcap ]);
            $sanpham = DB::table('sanpham')->where("Ma",$ma)->get();
            $ms_capnhat = true;
         } catch (Exception $e) {
             echo 'Caught exception: ',  $e->getMessage(), "\n";
             $ms_capnhat = false;
         } finally {
             
         }
        return view("sanpham/sua",compact('sanpham','ms_capnhat'));
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
            DB::table('sanpham')->where('Ma',$maxoa)->delete();
            $sanpham = DB::table('sanpham')->get();
             $ms_xoa = true;
         } catch (Exception $e) {
             echo 'Caught exception: ',  $e->getMessage(), "\n";
             $ms_xoa = false;
         } finally {
             
         }
         return view("sanpham/danhsach",compact('sanpham','ms_xoa'));
    }
    public function timkiem(Request $request)
    {

        try {
            $timkiem = $request->input("timkiem");
            $sanpham = DB::table('sanpham')
            ->where('Ma', 'like', "%$timkiem%")
            ->orwhere('TenSanPham','like',"%$timkiem%")
            ->orwhere('NhaCungCap', 'like', "%$timkiem%")
            ->get();
           
         } catch (Exception $e) {
             echo 'Caught exception: ',  $e->getMessage(), "\n";
            
         } finally {
             
         }
         return view("sanpham/danhsach",compact('sanpham'));
    }
}