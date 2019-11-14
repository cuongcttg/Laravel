<?php

namespace App\Http\Controllers;
use App\GoiCredit;
use DB;
use Illuminate\Http\Request;

class GoiCreditController extends Controller
{
    public function getGoiCredit(){
    	$goicredit = GoiCredit::all();

    	return view('credit/DS_Goi_Credit',['goicredit'=>$goicredit]);
    }

    public function getTrash(){
        $trash = DB::table('goi_credit')->whereNotNull('deleted_at')->get();
        return view('credit/Thung-Rac-Goi-Credit',['trash'=>$trash]);
    }

    public function getRestore($id){
        $goicredit = GoiCredit::withTrashed()->find($id)->restore();

        return redirect('goi-credit/thung-rac')->with('success','Phục hồi thành công');
    }

    public function getThemMoiGoiCredit(){
    	return view('credit/Them-Moi-Goi-Credit');
    }

    public function postThemGoiCredit(Request $request){
    	$goicredit = new GoiCredit;
    	$goicredit->ten_goi=$request->ten_goi;
    	$goicredit->so_tien=$request->so_tien;
    	$goicredit->credit=$request->credit;
    	$goicredit->save();

    	return redirect('goi-credit/them-moi')->with('success','Thêm gói credit thành công');
    }

    public function getSuaGoiCredit(Request $request,$id){
    	$goicredit = GoiCredit::find($id);
    	return view('credit/Sua-Goi-Credit',['goicredit'=>$goicredit]);
    }

    public function postSuaGoiCredit(Request $request,$id){
    	$goicredit = GoiCredit::find($id);
    	$goicredit->ten_goi=$request->ten_goi;
    	$goicredit->so_tien=$request->so_tien;
    	$goicredit->credit=$request->credit;
    	$goicredit->save();

    	return redirect('goi-credit');
    }

    public function xoaGoiCredit($id){
    	$goicredit = GoiCredit::find($id);
    	$goicredit->delete();

    	return redirect('goi-credit');
    }

    public function layDanhSachGoiCredit(Request $request) {
        $listGoiCredit = GoiCredit::all();

        return response()->json([
            'data'  => $listGoiCredit
        ]);
    }
}
