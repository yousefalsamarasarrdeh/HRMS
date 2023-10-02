<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\OccasionsController;
use App\Http\Controllers\Admin\ResignationsController;
use App\Http\Controllers\Admin\EmployeesController;

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
define("PC",10);
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
    Route::get('/ShiftstypesCreate',[\App\Http\Controllers\Admin\ShiftstypesController::class,'create'])->name('Shiftstypes.create') ;
    Route::post('/ShiftstypesStore',[\App\Http\Controllers\Admin\ShiftstypesController::class,'store'])->name('Shiftstypes.store') ;
    Route::get("/ShiftsTypesEdit/{id}",[\App\Http\Controllers\Admin\ShiftstypesController::class,'edit'])->name('ShiftsTypes.edit');
    Route::post("/ShiftsTypesUpdate/{id}",[\App\Http\Controllers\Admin\ShiftstypesController::class,'update'])->name('ShiftsTypes.update');
    Route::get("/ShiftsTypesDestroy/{id}",[\App\Http\Controllers\Admin\ShiftstypesController::class,'destroy'])->name('ShiftsTypes.destroy');
    Route::get("/ShiftsTypesajax_search/",[\App\Http\Controllers\Admin\ShiftstypesController::class,'ajax_search'])->name('ShiftsTypes.ajax_search');



    // الادارات
    Route::get('/departements',[\App\Http\Controllers\Admin\DepartementController::class,'index'])->name('departements.index');
    Route::get('/departementscreate',[\App\Http\Controllers\Admin\DepartementController::class,'create'])->name('departements.Create');
    Route::post('/departementsstore',[\App\Http\Controllers\Admin\DepartementController::class,'store'])->name('departements.store');
    Route::get('/departementsEdit/{id}',[\App\Http\Controllers\Admin\DepartementController::class,'edit'])->name('departements.edit');
    Route::post('/departementsupdate/{id}',[\App\Http\Controllers\Admin\DepartementController::class,'update'])->name('departements.update');
    Route::post('/departementsdelete/{id}',[\App\Http\Controllers\Admin\DepartementController::class,'delete'])->name('departements.delete');

    //فئات الوضاىف
    Route::get('/jobs_categories',[\App\Http\Controllers\Admin\Jobs_CategorieController::class,'index'])->name('jobs_categories.index');
    Route::get('/jobs_categoriescreate',[\App\Http\Controllers\Admin\Jobs_CategorieController::class,'create'])->name('jobs_categories.Create');
    Route::post('/jobs_categoriesstore',[\App\Http\Controllers\Admin\Jobs_CategorieController::class,'store'])->name('jobs_categories1.store');
    Route::get('/jobs_categoriesEdit/{id}',[\App\Http\Controllers\Admin\Jobs_CategorieController::class,'edit'])->name('jobs_categories.edit');
    Route::post('/jobs_categoriesupdate/{id}',[\App\Http\Controllers\Admin\Jobs_CategorieController::class,'update'])->name('jobs_categories.update');
    Route::get('/jobs_categoriesdelete/{id}',[\App\Http\Controllers\Admin\Jobs_CategorieController::class,'destroy'])->name('jobs_categories.delete');

    //مواهيلات الموظفين
    Route::get('/Qualifications',[\App\Http\Controllers\Admin\QualificationsController::class,'index'])->name('Qualifications.index');
    Route::get('/Qualificationscreate',[\App\Http\Controllers\Admin\QualificationsController::class,'create'])->name('Qualifications.create');
    Route::post('/Qualificationsstore',[\App\Http\Controllers\Admin\QualificationsController::class,'store'])->name('Qualifications.store');
    Route::get('/QualificationsEdit/{id}',[\App\Http\Controllers\Admin\QualificationsController::class,'edit'])->name('Qualifications.edit');
    Route::post('/Qualificationsupdate/{id}',[\App\Http\Controllers\Admin\QualificationsController::class,'update'])->name('Qualifications.update');
    Route::get('/Qualificationsdelete/{id}',[\App\Http\Controllers\Admin\QualificationsController::class,'destroy'])->name('Qualifications.delete');


    /*  بداية  المناسبات الرسمية*/
    Route::get('/occasions', [\App\Http\Controllers\Admin\OccasionsController::class, 'index'])->name('occasions.index');
    Route::get('/occasionsCreate', [OccasionsController::class, 'create'])->name('occasions.create');
    Route::post('/occasionsStore', [OccasionsController::class, 'store'])->name('occasions.store');
    Route::get('/occasionsEdit/{id}', [OccasionsController::class, 'edit'])->name('occasions.edit');
    Route::post('/occasionsUpdate/{id}', [OccasionsController::class, 'update'])->name('occasions.update');
    Route::get('/occasionsDestroy/{id}', [OccasionsController::class, 'destroy'])->name('occasions.destroy');

    /*  بداية  انواع ترك العمل */
    Route::get('/Resignations', [ResignationsController::class, 'index'])->name('Resignations.index');
    Route::get('/ResignationsCreate', [ResignationsController::class, 'create'])->name('Resignations.create');
    Route::post('/ResignationsStore', [ResignationsController::class, 'store'])->name('Resignations.store');
    Route::get('/ResignationsEdit/{id}', [ResignationsController::class, 'edit'])->name('Resignations.edit');
    Route::post('/ResignationsUpdate/{id}', [ResignationsController::class, 'update'])->name('Resignations.update');
    Route::get('/ResignationsDestroy/{id}', [ResignationsController::class, 'destroy'])->name('Resignations.destroy');


    /*  بداية  الموظفين   */
    Route::get('/Employees/index', [EmployeesController::class, 'index'])->name('Employees.index');
    Route::get('/Employees/create', [EmployeesController::class, 'create'])->name('Employees.create');
    Route::post('/Employees/store', [EmployeesController::class, 'store'])->name('Employees.store');
    Route::get('/Employees/edit/{id}', [EmployeesController::class, 'edit'])->name('Employees.edit');
    Route::post('/Employees/update/{id}', [EmployeesController::class, 'update'])->name('Employees.update');
    Route::get('/Employees/destroy/{id}', [EmployeesController::class, 'destroy'])->name('Employees.destroy');
    Route::get('/test', [EmployeesController::class, 'test'])->name('Employees.test');
    Route::post('/teststore', [EmployeesController::class, 'teststore'])->name('e.test');
    Route::post("/Employees/get_governorates", [EmployeesController::class, 'get_governorates'])->name('Employees.get_governorates');
    Route::post("/Employees/get_centers", [EmployeesController::class, 'get_centers'])->name('Employees.get_centers');



});
Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>'guest:admin'],function (){
    Route::get('login',[\App\Http\Controllers\Admin\LoginController::class,'Show_Login_View'])->name('showLogin') ;
    Route::post('login',[\App\Http\Controllers\Admin\LoginController::class,'login'])->name('admin.login');
});
Route::fallback(function (){
    return redirect()->route('showLogin');
});


