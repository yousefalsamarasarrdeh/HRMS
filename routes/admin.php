<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
define("PC",11);
Route::group(['prefix'=>'admin','middleware'=>'auth:admin'],function () {
    Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/logout',[\App\Http\Controllers\Admin\LoginController::class,'logout'])->name('admin.logout');

    Route::get('/generalSetting',[\App\Http\Controllers\Admin\Admin_panel_settingController::class,'index'])->name('admin_panel_settings.index');
    Route::get('/generalSettingEdit',[\App\Http\Controllers\Admin\Admin_panel_settingController::class,'edit'])->name('admin_panel_settings.edit');
    Route::get('/generalSettingUpdate',[\App\Http\Controllers\Admin\Admin_panel_settingController::class,'update'])->name('admin_panel_settings.update');

    // مالية
  Route::get('Finance_calelander',[\App\Http\Controllers\Admin\Finance_calelandersController::class,'index'])->name('Finance_calelanders.index');
  Route::get('Finance_calelanderCreate',[\App\Http\Controllers\Admin\Finance_calelandersController::class,'create'])->name('Finance_calelanders.create');
  Route::post('Finance_calelanderstore',[\App\Http\Controllers\Admin\Finance_calelandersController::class,'store'])->name('Finance_calelanders.store');
  Route::get('Finance_calelanderdelete/{id}',[\App\Http\Controllers\Admin\Finance_calelandersController::class,'destroy'])->name('Finance_calelanders.destroy');
  Route::get('Finance_calelanderedit/{id}',[\App\Http\Controllers\Admin\Finance_calelandersController::class,'edit'])->name('Finance_calelanders.edit');

   Route::post('Finance_calelanderupdate/{id}',[\App\Http\Controllers\Admin\Finance_calelandersController::class,'update'])->name('finance_calender.update');

  Route::get('/finance_calender/show_year_monthes',[\App\Http\Controllers\Admin\Finance_calelandersController::class,'show_year_monthes'])->name('finance_calender.show_year_monthes');
  // الفروع
  Route::get('/brancheees',[\App\Http\Controllers\Admin\BranchesController::class,'index'])->name('branches.index') ;
  Route::get('/brancheeesCreate',[\App\Http\Controllers\Admin\BranchesController::class,'create'])->name('branches.create') ;
  Route::Post('/brancheeesStore',[\App\Http\Controllers\Admin\BranchesController::class,'store'])->name('branches.store') ;

  // انواع شفتات الموضفين
   Route::get('/Shiftstypes',[\App\Http\Controllers\Admin\ShiftstypesController::class,'index'])->name('Shiftstypes.index') ;

});
Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>'guest:admin'],function (){
   Route::get('login',[\App\Http\Controllers\Admin\LoginController::class,'Show_Login_View'])->name('showLogin') ;
   Route::post('login',[\App\Http\Controllers\Admin\LoginController::class,'login'])->name('admin.login');
});
Route::fallback(function (){
    return redirect()->route('showLogin');
});
