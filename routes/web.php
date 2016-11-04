<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();
Route::get('/',function(){
	return view('welcome');
});
Route::get('/home', 'HomeController@index' );
Route::get('/laporan', 'HomeController@getPDF');
Route::get('/profile', 'HomeController@profile');
Route::post('/profile', 'HomeController@updateProfile');

Route::get('/alternative', 'AlternativeController@index');
Route::post('/alternativeAdd', 'AlternativeController@insert');
Route::get('/updateAlternative/{id}', 'AlternativeController@update');
Route::post('/alternativeUpdate', 'AlternativeController@updateSimpan');
Route::get('/alternativeDelete/{id}', 'AlternativeController@delete');

Route::get('/resetBobot/{id}','KriteriaController@resetBobot');

Route::get('/nilai','NilaiController@index');
Route::get('/inputNilai','NilaiController@inputNilai');

/*Route::get('/hasilPerhitungan','PerhitunganNilaiController@hasilPerhitungan');*/
Route::get('/matrix', 'PerhitunganNilaiController@matrix');
Route::get('/perhitungan','PerhitunganNilaiController@normalisasiR');
Route::get('/analisa','PerhitunganNilaiController@analisa');

Route::get('/kriteria', 'KriteriaController@index');
Route::post('/kriteria', 'KriteriaController@insert');
Route::get('/updateKriteria/{id}', 'KriteriaController@update');
Route::get('/kriteriaDelete/{id}', 'KriteriaController@delete');
Route::post('/kriteriaUpdate', 'KriteriaController@update2');

