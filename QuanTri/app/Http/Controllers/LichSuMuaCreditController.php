<?php

namespace App\Http\Controllers;
use DB;


use Illuminate\Http\Request;

class LichSuMuaCreditController extends Controller
{
    public function getlichsumuacredit(){
    		

$nguoichoi = DB::table('nguoi_choi')
    ->join('lich_su_mua_credit', 'lich_su_mua_credit.id', '=', 'nguoi_choi.id')
    ->join('goi_credit', 'goi_credit.id', '=', 'lich_su_mua_credit.id')
    ->get();

   return view('lichsumuagoicredit.DS_Lich_Su_Mua_Goi_Credit',['nguoichoi'=>$nguoichoi]);


}
    	 public function layDanhSachLichSuMuaCredit(Request $request) {
        $listCauHoi = CauHoi::all();

        return response()->json([
            'data'  => $listCauHoi
        ]);
    }
}
