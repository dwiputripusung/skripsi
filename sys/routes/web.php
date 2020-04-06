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

use RealRashid\SweetAlert\Facades\Alert;


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/identias', 'IdentitasController@index')->name('identitas.index');
Route::post('/identias', 'IdentitasController@store')->name('identitas.store');

Route::resource('/fakultas', 'FakultasController');
Route::resource('/jurusan', 'JurusanController');
Route::resource('/dosen', 'DosenController');
Route::resource('/asesor', 'AsesorController');
Route::resource('/pendidikan', 'PendidikanController');
Route::resource('/penelitian', 'PenelitianController');
Route::resource('/pengabdian', 'PengabdianController');
Route::resource('/penunjang', 'PenunjangController');
Route::resource('/kewajiban_khusus', 'KewajibanKhususController');
Route::resource('/periksa', 'PeriksaController');
Route::get('/getnidn/{id}', 'IdentitasController@getnidn')->name('getnidn');
//Periksa Detail
Route::get('/periksas/{id}', 'PeriksaController@pengabdian')->name('periksa.pengabdian');
Route::get('/periksaa/{id}', 'PeriksaController@penunjang')->name('periksa.penunjang');

Route::get('/kewajiban_khususs', 'KewajibanKhususController@index_kewajiban_khusus')->name('kewajibankhusus.index');

Route::get('/Dosen', 'DosenController@index');
Route::get('/Dosen/cetak_laporan_rencana_beban_kerja_pdf', 'DosenController@cetak_laporan_rencana_beban_kerja_pdf')->name('laporan_rencana_beban_kerja.cetak');
Route::get('/Dosen/cetak_laporan_kinerja_pdf', 'DosenController@cetak_laporan_kinerja_pdf')->name('laporan_kinerja.cetak');
Route::get('/Dosen/cetak_kesimpulan_kinerja_dosen_pdf', 'DosenController@cetak_kesimpulan_kinerja_dosen_pdf')->name('kesimpulan_kinerja_dosen.cetak');
Route::get('/Dosen/cetak_kesimpulan_kewajiban_khusus_pdf', 'DosenController@cetak_kesimpulan_kewajiban_khusus_pdf')->name('kesimpulan_kewajiban_khusus.cetak');

//Datatable
Route::get('/datatable_fakultas', 'FakultasController@datatable')->name('datatable.fakultas');
Route::get('/datatable_jurusan', 'JurusanController@datatable')->name('datatable.jurusan');
Route::get('/datatable_dosen', 'DosenController@datatable')->name('datatable.dosen');
Route::get('/datatable_asesor', 'AsesorController@datatable')->name('datatable.asesor');
Route::get('/datatable_pendidikan', 'PendidikanController@datatable')->name('datatable.pendidikan');
Route::get('/datatable_penelitian', 'PenelitianController@datatable')->name('datatable.penelitian');
Route::get('/datatable_pengabdian', 'PengabdianController@datatable')->name('datatable.pengabdian');
Route::get('/datatable_penunjang', 'PenunjangController@datatable')->name('datatable.penunjang');


Route::get('/datatable_kewajiban_khusus', 'KewajibanKhususController@datatable')->name('datatable.kewajiban_khusus');

//Datatable Kewajiban Khusus Asesor
Route::get('/datatable_kewajibankhusus_asesor', 'KewajibanKhususController@datatable_kewajiban_khusus_asesor')->name('datatable.kewajibankhusus_asesor');

Route::get('/datatable_pendidikan_asesor', 'PendidikanController@datatable_asesor')->name('datatable.pendidikan_asesor');
Route::get('/datatable_penelitian_asesor', 'PenelitianController@datatable_asesor')->name('datatable.penelitian_asesor');
Route::get('/datatable_pengabdian_asesor', 'PengabdianController@datatable_asesor')->name('datatable.pengabdian_asesor');
Route::get('/datatable_penunjang_asesor', 'PenunjangController@datatable_asesor')->name('datatable.penunjang_asesor');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/pilih_jurusan/{id}', 'DosenController@getJur');

//Dosen login

Route::get('/dosen_login', function(){
    return view('admin');
})->name('dosen.page');

Route::get('/dosen-login', 'Auth\DosenLoginController@show')->name('dosen.login');

Route::post('dosen-login', ['as' => 'dosen-login', 'uses' => 'Auth\DosenLoginController@login']);

//ganti Password
Route::POST('/password_ganti', 'DosenController@password')->name('password.ganti');

// Asesor Rubah Status
Route::get('/pendidikan/status/{id}/{status}', 'PendidikanController@status')->name('pendidikan.status');
Route::get('/penelitian/status/{id}/{status}', 'PenelitianController@status')->name('penelitian.status');
Route::get('/pengabdian/status/{id}/{status}', 'PengabdianController@status')->name('pengabdian.status');
Route::get('/penunjang/status/{id}/{status}', 'PenunjangController@status')->name('penunjang.status');
Route::get('/kewajibankhusus/{id}/{status}', 'KewajibanKhususController@status')->name('kewajibankhusus.status');
// Asesor Index
Route::get('/penelitian_asesor', 'PenelitianController@index_asesor')->name('penelitian.asesor');

//Datatable
Route::get('/datatable_pendidikan_belum', 'PeriksaController@datatable_belum_pendidikan')->name('datatable.pendidikan_belum');
Route::get('/datatable_penelitian_belum', 'PeriksaController@datatable_belum_penelitian')->name('datatable.penelitian_belum');
Route::get('/datatable_pengabdian_belum', 'PeriksaController@datatable_belum_pengabdian')->name('datatable.pengabdian_belum');
Route::get('/datatable_penunjang_belum', 'PeriksaController@datatable_belum_penunjang')->name('datatable.penunjang_belum');

//Datatable
Route::get('/datatable_pendidikan_sudah', 'PeriksaController@datatable_sudah_pendidikan')->name('datatable.pendidikan_sudah');
Route::get('/datatable_penelitian_sudah', 'PeriksaController@datatable_sudah_penelitian')->name('datatable.penelitian_sudah');
Route::get('/datatable_pengabdian_sudah', 'PeriksaController@datatable_sudah_pengabdian')->name('datatable.pengabdian_sudah');
Route::get('/datatable_penunjang_sudah', 'PeriksaController@datatable_sudah_penunjang')->name('datatable.penunjang_sudah');