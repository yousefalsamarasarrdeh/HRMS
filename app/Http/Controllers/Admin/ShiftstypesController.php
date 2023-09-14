<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shifts_type;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShiftstypesController extends Controller
{
    public function index(){
        $com_code=auth()->user()->com_code;
      $data=get_cols_where_p(new Shifts_type(),array("*"),array("com_code"=>$com_code),'id','DESC',PC);
       return View('admin.Shiftstypes.index');
    }
}
