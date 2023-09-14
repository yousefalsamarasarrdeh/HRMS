<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin_panel_settingRequest;
use App\Models\Admin_panel_setting;
use Illuminate\Http\Request;

class Admin_panel_settingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $com_code=auth()->user()->com_code;
        $data=Admin_panel_setting::select("*")->where('com_code', $com_code)->first();
        return View('admin.Admin_panel_setting.index',['data'=>$data]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin_panel_setting $admin_panel_setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $com_code=auth()->user()->com_code;
        $data=Admin_panel_setting::select("*")->where('com_code', $com_code)->first();
        return View('admin.Admin_panel_setting.edit',['data'=>$data]);

        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Admin_panel_settingRequest $request)
    {
        try {
            $com_code=auth()->user()->com_code;

            $data['company_name']=$request->company_name;
            $data['phones']=$request->phones;
            $data['after_miniute_calculate_delay']=$request->after_miniute_calculate_delay;
            $data['address']=$request->address;
            $data['email']=$request->email;
            $data['after_miniute_calculate_early_departure']=$request->after_miniute_calculate_early_departure;
            $data['after_miniute_quarterday']=$request->after_miniute_quarterday;
            $data['after_time_half_daycut']=$request->after_time_half_daycut;
            $data['after_time_allday_daycut']=$request->after_time_allday_daycut;

            $data['monthly_vacation_balance']=$request->monthly_vacation_balance;

            $data['after_days_begin_vacation']=$request->after_days_begin_vacation;

            $data['first_balance_begin_vacation']=$request->first_balance_begin_vacation;

            $data['sanctions_value_first_abcence']=$request->sanctions_value_first_abcence;
            $data['sanctions_value_second_abcence']=$request->sanctions_value_second_abcence;
            $data['sanctions_value_thaird_abcence']=$request->sanctions_value_thaird_abcence;
            $data['sanctions_value_forth_abcence']=$request->sanctions_value_forth_abcence;
            $data['updated_by']=auth()->user()->id;

            Admin_panel_setting::where(['com_code'=>$com_code])->update($data);
            return redirect()->route('admin_panel_settings.index')->with(['success'=>'تم تحديث بنجاح']);

        }catch(\Exception $ex){
      return redirect()->back()->with(['erroe'=>'حدث خطاء'])->withInput();
    }

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin_panel_setting $admin_panel_setting)
    {
        //
    }
}
