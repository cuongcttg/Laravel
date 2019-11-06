<?php

namespace App\Http\Controllers;
use App\LinhVuc;
use DB;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class QAcontroller extends Controller
{
    public function home(){
    	return(view('mainlayout'));
    }

    public function getLinhVuc(){
    	$linhvuc = LinhVuc::all();
    	return view('linhvuc/DS_Linh_Vuc',compact('linhvuc'));
    }

    public function getTrash(){
        $trash = DB::table('linh_vuc')->whereNotNull('deleted_at')->get();
        return view('linhvuc/Thung-Rac-Linh-Vuc',['trash'=>$trash]);
    }

    public function getRestore($id){
        $linhvuc = LinhVuc::withTrashed()->find($id)->restore();

        return redirect('linh-vuc/thung-rac')->with('success','Phục hồi thành công');
    }

    public function getThemMoilinhvuc(){
    	return(view('linhvuc/Them-Moi-Linh-Vuc'));
    }

    public function postThemMoilinhvuc(Request $request){
    	$linhvuc = new LinhVuc;
        $request->validate([
            'Ten_linh_vuc' => 'required|unique:linh_vuc,Ten_linh_vuc'
        ],
        [
            'Ten_linh_vuc.required' =>'Bạn chưa nhập lĩnh vực',
            'Ten_linh_vuc.unique' =>'Tên lĩnh vực đã tồn tại'
        ]);
    	$linhvuc->Ten_linh_vuc = $request->Ten_linh_vuc;
    	$linhvuc->save();

    	return redirect('linh-vuc/them-moi')->with('success','Thêm lĩnh vực thành công');
    }

    public function getSualinhvuc($id){
    	$linhvuc = LinhVuc::find($id);
    	return view('linhvuc/Sua-Linh-Vuc',compact('linhvuc'));
    }

    public function postSualinhvuc(Request $request, $id){
    	$linhvuc = LinhVuc::find($id);
    	$linhvuc->Ten_linh_vuc = $request->Ten_linh_vuc;

    	$linhvuc->save();

    	return redirect('linh-vuc/');
    }

    public function Xoalinhvuc($id){

    	$linhvuc = LinhVuc::find($id);
    	$linhvuc->delete();

    	return redirect('linh-vuc/');
    }

    public function layDanhSachLinhVuc(Request $request) {
        $listLinhVuc = LinhVuc::all();

        return response()->json([
            'data'  => $listLinhVuc
        ]);
    }
}
