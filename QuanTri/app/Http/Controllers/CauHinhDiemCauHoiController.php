<?php

namespace App\Http\Controllers;
use App\CauHinhDiemCauHoi;
use Illuminate\Http\Request;

class CauHinhDiemCauHoiController extends Controller
{
        public function getCauHinhDiemCauHoi(){
    	$cauhinhdiemcauhoi = CauHinhDiemCauHoi::all();

    	return view('cauhinhdiemcauhoi/DS_Cau_Hinh_Diem_Cau_Hoi',['cauhinhdiemcauhoi'=>$cauhinhdiemcauhoi]);
    }
}
