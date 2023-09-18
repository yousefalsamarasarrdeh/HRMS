<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepartementRequest;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartementController extends Controller
{

    public function index(){

        $com_code=auth()->user()->com_code;
        $data=get_cols_where_p(new Department(),array('*'),array('com_code'=>$com_code),'id','DESC',PC);
        return View('admin.Departement.index', ['data' => $data]);

    }

    public function create(){
        return View('admin.Departement.create');
    }
    public function store(DepartementRequest $request){
        try {
            $com_code = auth()->user()->com_code;
            $CheckExsists = get_cols_where_row(new Department(), array('id'), array("com_code" => $com_code, 'name' => $request->name));
            if (!empty($CheckExsists)) {
                return redirect()->back()->with(['status' => 'عفوا اسم الادارة مسجل من قبل !'])->withInput();
            }
            DB::beginTransaction();
            $dataToinsert['name'] = $request->name;
            $dataToinsert['phones'] = $request->phones;
            $dataToinsert['notes'] = $request->notes;
            $dataToinsert['active'] = $request->active;
            $dataToinsert['added_by'] = auth()->user()->id;
            $dataToinsert['com_code'] = $com_code;
            insert(new Department(), $dataToinsert);
            DB::commit();
            return  redirect()->route('departements.index')->with(['status' => 'تم ادخال البيانات بنجاح']);
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->with(['status' => 'عفوا حدث خطأ ما ' . $ex->getMessage()])->withInput();
        }

    }
    public function edit($id)
    {
        $com_code = auth()->user()->com_code;
        $data = get_cols_where_row(new Department(), array("*"), array('com_code' => $com_code, 'id' => $id));
        if (empty($data)) {
            return redirect()->route('departements.index')->with(['error' => 'عفوا غير قادر الي الوصول البي البيانات المطلوبة !']);
        }
        return view('admin.Departement.edit', ['data' => $data]);
    }
    public function update($id, DepartementRequest $request)
    {
        try {
            $com_code = auth()->user()->com_code;
            $data = get_cols_where_row(new Department(), array("*"), array('com_code' => $com_code, 'id' => $id));
            if (empty($data)) {
                return redirect()->route('departements.index')->with(['error' => 'عفوا غير قادر الي الوصول البي البيانات المطلوبة !']);
            }
            $CheckExsists = Department::select("id")->where('com_code', '=', $com_code)->where('name', '=', $request->name)->where('id', '!=', $id)->first();
            if (!empty($CheckExsists)) {
                return redirect()->back()->with(['status' => 'عفوا اسم الادارة مسجل من قبل !'])->withInput();
            }
            DB::beginTransaction();
            $dataToUpdate['name'] = $request->name;
            $dataToUpdate['phones'] = $request->phones;
            $dataToUpdate['notes'] = $request->notes;
            $dataToUpdate['active'] = $request->active;
            $dataToUpdate['updated_by'] = auth()->user()->id;
            update(new Department(), $dataToUpdate, array('com_code' => $com_code, 'id' => $id));
            DB::commit();
            return redirect()->route('departements.index')->with(['success' => 'تم تحديث البيانات بنجاح']);
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->with(['status' => 'عفوا حدث خطأ ما ' . $ex->getMessage()])->withInput();
        }
    }
    public function delete($id)
    {
        try {
            $com_code = auth()->user()->com_code;
            $data = get_cols_where_row(new Department(), array("*"), array('com_code' => $com_code, 'id' => $id));
            if (empty($data)) {
                return redirect()->route('departements.index')->with(['error' => 'عفوا غير قادر الي الوصول البي البيانات المطلوبة !']);
            }
            DB::beginTransaction();
            destroy(new Department(), array('com_code' => $com_code, 'id' => $id));
            DB::commit();
            return redirect()->route('departements.index')->with(['success' => 'تم حذف البيانات بنجاح']);
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->with(['error' => 'عفوا حدث خطأ ما ' . $ex->getMessage()])->withInput();
        }
    }
}
