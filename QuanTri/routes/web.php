	<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'QAcontroller@home')->name('home');
Route::middleware('auth')->group(function(){
	Route::prefix('linh-vuc')->group(function(){
	Route::name('linh-vuc.')->group(function(){
		Route::get('/', 'QAcontroller@getLinhVuc')->name('danh-sach');

		Route::get('/them-moi', 'QAcontroller@getThemMoilinhvuc')->name('them-moi');

		Route::post('/them-moi', 'QAcontroller@postThemMoilinhvuc')->name('them-moi');

		Route::get('/sua/{id}', 'QAcontroller@getSualinhvuc')->name('sua');

		Route::post('/sua/{id}', 'QAcontroller@postSualinhvuc')->name('sua');

		Route::get('/xoa/{id}', 'QAcontroller@Xoalinhvuc')->name('xoa');

		Route::get('/thung-rac', 'QAcontroller@getTrash')->name('trash');

		Route::get('/restore/{id}','QAcontroller@getRestore')->name('restore');

	});
}) ;

Route::prefix('cau-hoi')->group(function(){
	Route::name('cau-hoi.')->group(function(){
		Route::get('/', 'CauHoiController@getCauHoi')->name('danh-sach');

		Route::get('/them-moi', 'CauHoiController@getThemMoicauhoi')->name('them-moi-ch');

		Route::post('/them-moi', 'CauHoiController@postThemcauhoi')->name('them-moi-ch');

		Route::get('/sua/{id}', 'CauHoiController@getSuacauhoi')->name('sua-ch');

		Route::post('/sua/{id}', 'CauHoiController@postSuacauhoi')->name('sua-ch');

		Route::get('/xoa/{id}', 'CauHoiController@xoaCauhoi')->name('xoa-ch');

		Route::get('/thung-rac', 'CauHoiController@getTrash')->name('trash');

		Route::get('/restore/{id}','CauHoiController@getRestore')->name('restore');
	});
});

Route::prefix('quan-tri-vien')->group(function(){
	Route::name('quan-tri-vien.')->group(function(){
		Route::get('/', 'QuanTriVienController@getQuanTriVien')->name('danh-sach');

		Route::get('/them-moi', 'QuanTriVienController@getThemMoiQuanTriVien')->name('them-moi-qtv');

		Route::post('/them-moi', 'QuanTriVienController@postThemQuanTriVien')->name('them-moi-qtv');

		Route::get('/sua/{id}', 'QuanTriVienController@getSuaQuanTriVien')->name('sua-qtv');

		Route::post('/sua/{id}', 'QuanTriVienController@postSuaQuanTriVien')->name('sua-qtv');

		Route::get('/xoa/{id}', 'QuanTriVienController@xoaQuanTriVien')->name('xoa-qtv');
	});
});

Route::prefix('nguoi-choi')->group(function(){
	Route::name('nguoi-choi.')->group(function(){
		Route::get('/', 'NguoiChoiController@getNguoiChoi')->name('danh-sach');

		Route::get('/them-moi', 'NguoiChoiController@getThemMoiNguoiChoi')->name('them-moi-nc');

		Route::post('/them-moi', 'NguoiChoiController@postThemNguoiChoi')->name('them-moi-nc');

		Route::get('/sua/{id}', 'NguoiChoiController@getSuaNguoiChoi')->name('sua-nc');

		Route::post('/sua/{id}', 'NguoiChoiController@postSuaNguoiChoi')->name('sua-nc');

		Route::get('/xoa/{id}', 'NguoiChoiController@xoaNguoiChoi')->name('xoa-nc');

		Route::get('/thung-rac','NguoiChoiController@getTrash')->name('trash-nc');

		Route::get('/restore/{id} ','NguoiChoiController@getRestore')->name('restore-nc');
	});
});

Route::prefix('goi-credit')->group(function(){
	Route::name('goi-credit.')->group(function(){
		Route::get('/', 'GoiCreditController@getGoiCredit')->name('danh-sach');

		Route::get('/them-moi', 'GoiCreditController@getThemMoiGoiCredit')->name('them-moi-gc');

		Route::post('/them-moi', 'GoiCreditController@postThemGoiCredit')->name('them-moi-gc');

		Route::get('/sua/{id}', 'GoiCreditController@getSuaGoiCredit')->name('sua-gc');

		Route::post('/sua/{id}', 'GoiCreditController@postSuaGoiCredit')->name('sua-gc');

		Route::get('/xoa/{id}', 'GoiCreditController@xoaGoiCredit')->name('xoa-gc');

		Route::get('/thung-rac','GoiCreditController@getTrash')->name('trash-gc');

		Route::get('/restore/{id} ','GoiCreditController@getRestore')->name('restore-gc');
	});
});
});


Route::get('dang-nhap','QuanTriVienController@getDangNhap')->middleware('guest');
Route::post('dang-nhap','QuanTriVienController@postDangNhap')->name('dang-nhap');

Route::get('dang-xuat', 'QuanTriVienController@getDangXuat')->name('dang-xuat');

Route::get('lich-su-mua','LichSuMuaCreditController@getlichsumuacredit')->name('credit.danh-sach');
Route::get('chi-tiet-luot-choi','ChiTietLuotChoiController@getChiTietLuotChoi')->name('chi-tiet.danh-sach');

Route::get('cau-hinh-diem-cau-hoi','CauHinhDiemCauHoiController@getCauHinhDiemCauHoi')->name('cauhinhdiemcauhoi.danhsach');

Route::get('cau-hinh-app','CauHinhAppController@getCauHinhApp')->name('cauhinhapp.danhsach');

Route::get('cau-hinh-tro-giup','CauHinhTroGiupController@getCauHinhTroGiup')->name('cauhinhtrogiup.danhsach');