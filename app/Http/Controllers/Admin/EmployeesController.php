<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blood_groups;
use App\Models\Branche;
use App\Models\Centers;
use App\Models\Countries;
use App\Models\Department;
use App\Models\Driving_license_types;
use App\Models\employee;
use App\Models\Governorates;
use App\Models\jobs_categorie;
use App\Models\Language;
use App\Models\Military_status;
use App\Models\Qualification;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index(){

        $com_code = auth()->user()->com_code;
        $data = get_cols_where_p(new Employee() , array("*"), array("com_code" => $com_code), "id", "DESC", PC);
        return view("admin.Employees.index", ['data' => $data]);
    }
    public function create(){
        $com_code = auth()->user()->com_code;
        $other['branches'] = get_cols_where(new Branche(), array("id", "name"), array("com_code" => $com_code, "active" => 1));
        $other['departements'] = get_cols_where(new Department(), array("id", "name"), array("com_code" => $com_code, "active" => 1));
        $other['jobs'] = get_cols_where(new jobs_categorie(), array("id", "name"), array("com_code" => $com_code, "active" => 1));
        $other['qualifications'] = get_cols_where(new Qualification(), array("id", "name"), array("com_code" => $com_code, "active" => 1));


        $other['countires'] = get_cols_where(new Countries(), array("id", "name"), array("com_code" => $com_code, "active" => 1));
        $other['blood_groups'] = get_cols_where(new Blood_groups(), array("id", "name"), array("com_code" => $com_code, "active" => 1));
        $other['military_status'] = get_cols_where(new Military_status(), array("id", "name"), array("active" => 1),'id','ASC');
        $other['driving_license_types'] = get_cols_where(new Driving_license_types(), array("id", "name"), array("active" => 1,"com_code" => $com_code),'id','ASC');
        $other['languages'] = get_cols_where(new Language(), array("id", "name"), array("active" => 1,"com_code" => $com_code),'id','ASC');

        return view("admin.Employees.create", ['other' => $other]);
    }
    public function test(){
        $com_code = auth()->user()->com_code;
        $other['branches']=get_cols_where(new Branche(),array("id","name"),array("com_code"=>$com_code,"active"=>1));
        $other['departements']=get_cols_where(new Department(),array("id","name"),array("com_code"=>$com_code,"active"=>1));


        return view("admin.Employees.test",['other'=>$other]);
    }
    public function teststore(Request $request){

        dd($request->jobs);

    }
    public function get_governorates(Request $request)
    {
        if ($request->ajax()) {
            $country_id = $request->country_id;
            $other['governorates'] = get_cols_where(new Governorates(), array("id", "name"), array("com_code" => auth()->user()->com_code, 'countires_id' => $country_id));
            return view('admin.Employees.get_governorates',['other'=>$other]);
        }
    }

    public function get_centers(Request $request)
    {
        if ($request->ajax()) {
            $governorates_id = $request->governorates_id;
            $other['centers'] = get_cols_where(new Centers(), array("id", "name"), array("com_code" => auth()->user()->com_code, 'governorates_id' => $governorates_id));
            return view('admin.Employees.get_centers',['other'=>$other]);
        }
    }
}

