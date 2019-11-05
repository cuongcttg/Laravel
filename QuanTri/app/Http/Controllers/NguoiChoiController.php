<?php

namespace App\Http\Controllers;
use App\NguoiChoi;
use Illuminate\Http\Request;

class NguoiChoiController extends Controller
{
    public function getNguoiChoi(){
    	$nguoichoi = NguoiChoi::all();

    	return view('nguoichoi/DS_Nguoi_Choi',['nguoichoi'=>$nguoichoi]);
    }

    public function getThemMoiNguoiChoi(){
    	$nguoichoi = NguoiChoi::all();
    	return view('nguoichoi/Them-Moi-Nguoi-Choi',['nguoichoi'=>$nguoichoi]);
    }

    public function postThemNguoiChoi(Request $request){
    	$nguoichoi = new NguoiChoi;
    	$nguoichoi->ten_dang_nhap=$request->ten_dang_nhap;
    	$nguoichoi->mat_khau=bcrypt($request->mat_khau);
    	$nguoichoi->email=$request->email;
    	$nguoichoi->hinh_dai_dien=$request->hinh_dai_dien;
    	$nguoichoi->diem_cao_nhat=$request->diem_cao_nhat;
    	$nguoichoi->credit=$request->credit;
    	$nguoichoi->save();

    	return redirect('nguoi-choi/them-moi')->with('success','Thêm người chơi thành công');
    }

    public function getSuaNguoiChoi(Request $request, $id){
    	$nguoichoi = NguoiChoi::find($id);
    	return view('nguoichoi/Sua-Nguoi-Choi',['nguoichoi'=>$nguoichoi]);
    }

    public function postSuaNguoiChoi(Request $request, $id){
    	$nguoichoi = NguoiChoi::find($id);
    	$nguoichoi->ten_dang_nhap=$request->ten_dang_nhap;
    	$nguoichoi->mat_khau=$request->mat_khau;
    	$nguoichoi->email=$request->email;
    	$nguoichoi->hinh_dai_dien=$request->hinh_dai_dien;
    	$nguoichoi->credit=$request->credit;
    	$nguoichoi->save();
    	return redirect('nguoi-choi');
    }

    public function xoaNguoiChoi($id){
    	$nguoichoi = NguoiChoi::find($id);
    	$nguoichoi->delete();

    	return redirect('nguoi-choi');
    }

    public function layDanhSachNguoiChoi(Request $request) {
    	$listNguoiChoi = NguoiChoi::orderBy('diem_cao_nhat', 'desc')->get();

    	return response()->json([
    		'data'	=> $listNguoiChoi
    	]);
    }
}
