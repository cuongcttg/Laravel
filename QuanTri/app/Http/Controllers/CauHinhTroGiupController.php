<?php

namespace App\Http\Controllers;
use App\CauHinhTroGiup;
use Illuminate\Http\Request;

class CauHinhTroGiupController extends Controller
{
        public function getCauHinhTroGiup(){
    	$cauhinhtrogiup = CauHinhTroGiup::all();

    	return view('cauhinhtrogiup/Cau_Hinh_Tro_Giup',['cauhinhtrogiup'=>$cauhinhtrogiup]);
    }
}
