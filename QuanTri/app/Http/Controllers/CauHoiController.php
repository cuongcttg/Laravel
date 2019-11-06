<?php

namespace App\Http\Controllers;
use App\CauHoi;
use App\LinhVuc;
use DB;
use Illuminate\Http\Request;

class CauHoiController extends Controller
{
    public function getCauHoi(){
    	$cauhoi['cauhoilist'] = DB::table('linh_vuc')->join('cau_hoi','linh_vuc.id','=','cau_hoi.linh_vuc_id')->orderBy('cau_hoi.id','desc')->get();
    	return view('cauhoi/DS_Cau_Hoi',$cauhoi);
    }

        

    public function getThemMoicauhoi(){
        $linhvuc = LinhVuc::all();
        return view('cauhoi/Them-Moi-Cau-Hoi',compact('linhvuc'));
    }


    public function postThemcauhoi(Request $request){
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

    public function layDanhSachCauHoi(Request $request) {
        $listCauHoi = CauHoi::all();

        return response()->json([
            'data'  => $listCauHoi
        ]);
    }
}
