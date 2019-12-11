<?php

namespace App\Http\Controllers;
use App\CauHoi;
use App\LinhVuc;
use DB;
use Illuminate\Http\Request;

class CauHoiController extends Controller
{
    public function getCauHoi(){
    	$cauhoi = CauHoi::all();
    	return view('cauhoi/DS_Cau_Hoi',compact('cauhoi'));
    }

    public function getTrash(){
        $trash = CauHoi::onlyTrashed()->get();
        return view('cauhoi/Thung-Rac-Cau-Hoi',compact('trash'));
    }

    public function getRestore($id){
        $cauhoi = CauHoi::withTrashed()->find($id)->restore();

        return redirect('cau-hoi/thung-rac')->with('success','Phục hồi thành công');
    }

    public function getThemMoicauhoi(){
        $linhvuc = LinhVuc::all();
        return view('cauhoi/Them-Moi-Cau-Hoi',compact('linhvuc'));
    }


    public function postThemcauhoi(Request $request){
        $request->validate([
            'noi_dung' => 'required|unique:cau_hoi,noi_dung',
            'phuong_an_a' => 'required',
            'phuong_an_b' => 'required',
            'phuong_an_c' => 'required',
            'phuong_an_d' => 'required',
            'dap_an' => 'required',
        ],
        [
            'noi_dung.required' =>'Bạn chưa nhập nội dung',
            'noi_dung.unique' =>'nội dung đã tồn tại',
            'phuong_an_a.required' =>'Bạn chưa nhập phương án A',
            'phuong_an_b.required' =>'Bạn chưa nhập phương án B',
            'phuong_an_c.required' =>'Bạn chưa nhập phương án C',
            'phuong_an_d.required' =>'Bạn chưa nhập phương án D',
            'dap_an.required' =>'Bạn chưa nhập đáp án',

        ]);

        $cauhoi = new CauHoi;
        $cauhoi->noi_dung = $request->noi_dung;
        $cauhoi->linh_vuc_id = $request->linh_vuc_id;
        $cauhoi->phuong_an_a = $request->phuong_an_a;
        $cauhoi->phuong_an_b = $request->phuong_an_b;
        $cauhoi->phuong_an_c = $request->phuong_an_c;
        $cauhoi->phuong_an_d = $request->phuong_an_d;
        $cauhoi->dap_an = $request->dap_an;
        $cauhoi->save();

        return redirect('cau-hoi/them-moi')->with('success','Thêm câu hỏi thành công');
    }

    public function getSuacauhoi($id){  
        $cauhoi = CauHoi::find($id);     
        $linhvuc = LinhVuc::all();
        return view('cauhoi/Sua-Cau-Hoi',[
            'cauhoi'=>$cauhoi,
            'linhvuc'=>$linhvuc
        ]);
    }

    public function postSuacauhoi(Request $request, $id){
        $cauhoi = CauHoi::find($id);
        $cauhoi->noi_dung = $request->noi_dung;
        $cauhoi->linh_vuc_id = $request->linh_vuc_id;
        $cauhoi->phuong_an_a = $request->phuong_an_a;
        $cauhoi->phuong_an_b = $request->phuong_an_b;
        $cauhoi->phuong_an_c = $request->phuong_an_c;
        $cauhoi->phuong_an_d = $request->phuong_an_d;
        $cauhoi->dap_an = $request->dap_an;
        $cauhoi->save();

        return redirect('cau-hoi');
    }

    public function Xoacauhoi($id){
        $cauhoi = CauHoi::find($id);

        $cauhoi->delete();

        return redirect('cau-hoi');
    }


    public function layDanhSachCauHoi($id) {
        $listCauHoi = CauHoi::where('linh_vuc_id','=',$id)->get()->random(1);
        return response()->json([
            'data'  => $listCauHoi
        ]);
    }
}
