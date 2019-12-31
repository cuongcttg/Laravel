<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('nguoi-choi','NguoiChoiController@layDanhSachNguoiChoi');

Route::get('linh-vuc','QAController@layDanhSachLinhVuc');

Route::get('cau-hoi/{id}','CauHoiController@layDanhSachCauHoi');

Route::get('goi-credit','GoiCreditController@layDanhSachGoiCredit');

Route::get('chi-tiet-luot-choi','ChiTietLuotChoiController@layDanhChiTietLuotChoi');

Route::get('lich-su-mua-credit','lich_su_mua_credit@layDanhSachLichSuMuaCredit');

Route::get('nguoichoi','NguoiChoiController@layDanhSach');





