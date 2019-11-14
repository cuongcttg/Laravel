<?php

namespace App\Http\Controllers;
use App\CauHinhApp;
use Illuminate\Http\Request;


class CauHinhAppController extends Controller
{
        public function getCauHinhApp(){
    	$cauhinhapp = CauHinhApp::all();

    	return view('cauhinhapp/Cau_Hinh_App',['cauhinhapp'=>$cauhinhapp]);
    }    
}
