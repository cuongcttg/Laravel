<?php

namespace App\Http\Controllers;
use App\LinhVuc;
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

    public function getThemMoilinhvuc(){
    	return(view('linhvuc/Them-Moi-Linh-Vuc'));
    }

    public function postThemMoilinhvuc(Request $request){
    	$linhvuc = new LinhVuc;
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
