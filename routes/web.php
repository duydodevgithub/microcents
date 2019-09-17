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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'keywordtool'], function(){
    Route::get('', function(){
        return view('keywordtool');
    })->name('keywordtool');

    Route::post('', function(Illuminate\Http\Request $request){
        return redirect()->route('keywordtool')->with('info', $request->input('keyword'));
    });
});
