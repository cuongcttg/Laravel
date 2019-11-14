<?php

namespace App\Http\Controllers;
use App\NguoiChoi;
use DB;
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

    public function getTrash(){
        $trash = DB::table('nguoi_choi')->whereNotNull('deleted_at')->get();
        return view('nguoichoi/Thung-Rac-Nguoi-Choi',['trash'=>$trash]);
    }

    public function getRestore($id){
        $nguoichoi = NguoiChoi::withTrashed()->find($id)->restore();

        return redirect('nguoi-choi/thung-rac')->with('success','Phục hồi thành công');
    }

    public function postThemNguoiChoi(Request $request){
        $nguoichoi = new NguoiChoi;
        $request->validate([
            'ten_dang_nhap' => 'required|unique:nguoi_choi,ten_dang_nhap',
            'mat_khau' => 'required|min:6',
            'email' => 'required|unique:nguoi_choi,email'
        ],
        [
            'ten_dang_nhap.required' =>'Bạn chưa nhập tên đăng nhập',
            'ten_dang_nhap.unique' =>'Tên đăng nhập đã tồn tại',
            'mat_khau.min' =>'Mật khẩu phải nhiều hơn 6 ký tự',
            'mat_khau.required' =>'Bạn chưa nhập mật khẩu',
            'email.required' =>'Bạn chưa nhập email',
            'email.unique' =>'email đã tồn tại'
        ]);

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
            'data'  => $listNguoiChoi
        ]);
    }
}
