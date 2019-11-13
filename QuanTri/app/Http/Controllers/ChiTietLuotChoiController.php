<?php

namespace App\Http\Controllers;

use ChiTietLuotChoi;
use Illuminate\Http\Request;
use DB;

class ChiTietLuotChoiController extends Controller
{
    public function getChiTietLuotChoi(){
    	$cauhoi = DB::table('cau_hoi')
    ->join('chi_tietluot_choi', 'chi_tietluot_choi.id', '=', 'cau_hoi.id')
    ->join('luot_choi', 'luot_choi.id', '=', 'chi_tietluot_choi.id')
    ->get();

    	 return view('chitietluotchoi.DS_Chi_Tiet_luot_choi',['cauhoi'=>$cauhoi]);

    }

    	   public function layDanhChiTietLuotChoi(Request $request) {
        $listGoiCredit = GoiCredit::all();

        return response()->json([
            'data'  => $listGoiCredit
        ]);
    }
}

