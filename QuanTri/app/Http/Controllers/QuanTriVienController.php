<?php

namespace App\Http\Controllers;
use App\QuanTriVien;
use App\User;
use Auth;
use Illuminate\Http\Request;

class QuanTriVienController extends Controller
{
    public function getQuanTriVien(){
    	$quantrivien = QuanTriVien::all();

    	return view('quantrivien/DS_Quan_Tri_Vien',['quantrivien'=>$quantrivien]);
    }

    public function getThemMoiQuanTriVien(){
    	$quantrivien = QuanTriVien::all();
    	return view('quantrivien/Them-Moi-Quan-Tri-Vien');
    }

    public function postThemQuanTriVien(Request $request){
    	$quantrivien = new QuanTriVien;
    	$quantrivien->ten_dang_nhap = $request->ten_dang_nhap;
    	$quantrivien->mat_khau = bcrypt($request->mat_khau);
    	$quantrivien->ho_ten = $request->ho_ten;
    	$quantrivien->save();

    	return redirect('quan-tri-vien/them-moi')->with('success','Thêm quản trị viên thành công');
    }

    

    public function getSuaQuanTriVien(Request $request, $id){
        $qtv = QuanTriVien::find($id);
        return view('quantrivien/Sua-Quan-Tri-Vien',['qtv'=>$qtv]);
    }

    public function postSuaQuanTriVien(Request $request, $id){
        $qtv = QuanTriVien::find($id);
        $qtv->ten_dang_nhap = $request->ten_dang_nhap;
        $qtv->mat_khau = $request->mat_khau;
        $qtv->ho_ten = $request->ho_ten;
        $qtv->save();

        return redirect('quan-tri-vien');
    }

    public function xoaQuanTriVien($id){
        $qtv = QuanTriVien::find($id);
        $qtv->delete();

        return redirect('quan-tri-vien');
    }
    
    public function getDangNhap(){
        return view('Dang-Nhap');
    }

    public function postDangNhap(Request $request){
        if(Auth::attempt(['ten_dang_nhap'=>$request->ten_dang_nhap,'password'=>$request->mat_khau])){
                return redirect()->route('home');
            }
               return redirect('dang-nhap')->with('warning','đăng nhập thất bại');
        }

    public function getDangXuat(){
        Auth::logout();
        return redirect('dang-nhap');
    }
}
