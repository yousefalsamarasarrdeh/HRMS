<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrachesRequest;
use App\Models\Branche;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BranchesController extends Controller
{
    //
    public function index()
    {
        $com_code = auth()->user()->com_code;
        $data = get_cols_where_p(new Branche(), array("*"), array("com_code" => $com_code), "id", "DESC", PC);
        return view('admin.Branch.index', ['data' => $data]);
    }
    public function create()
    {

        return view('admin.Branch.create');
    }

    public function store(BrachesRequest $requst)
    {
        try {
            $com_code = auth()->user()->com_code;
            $checkExsists = get_cols_where_row(new Branche(), array("id"), array("com_code" => $com_code, 'name' => $requst->name));
            if (!empty($checkExsists)) {
                return redirect()->back()->with(['error' => 'عفوا اسم الفرع مسجل من قبل !'])->withInput();
            }
            DB::beginTransaction();
            $dataToInsert['name'] = $requst->name;
            $dataToInsert['address'] = $requst->address;
            $dataToInsert['phones'] = $requst->phones;
            $dataToInsert['email'] = $requst->email;
            $dataToInsert['added_by'] = auth()->user()->id;
            $dataToInsert['com_code'] = $com_code;
            insert(new Branche(), $dataToInsert);
            DB::commit();
            return redirect()->route('branches.index')->with(['success' => 'تم ادخال البيانات بنجاح']);
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->with(['status' => 'عفوا حدث خطأ ما ' . $ex->getMessage()])->withInput();
        }
    }

    }
