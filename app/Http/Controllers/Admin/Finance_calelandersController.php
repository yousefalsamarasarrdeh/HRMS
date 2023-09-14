<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Finance_calenders_Request;
use App\Models\Finance_calelanders;
use App\Models\Finance_cln_periods;
use App\Models\Monthe;
use Faker\Provider\ka_GE\DateTime;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Monolog\Formatter\format;
use function Nette\Utils\data;
use function Symfony\Component\Mime\Header\all;

class Finance_calelandersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Finance_calelanders::select('*')->orderby('FINANCE_YR','DESC')->paginate(PC);
        return view('admin.Finance_Calelander.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Finance_Calelander.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Finance_calenders_Request $request)
    {

      // try{
        //    DB::beginTransaction();
        $data =new Finance_calelanders();
            $data['FINANCE_YR']=$request->FINANCE_YR;
            $data['FINANCE_YR_DESC']=$request->FINANCE_YR_DESC;
            $data['start_date']=$request->start_date;
            $data['end_date']=$request->end_date;
            $data['com_code']=auth()->user()->com_code;
            $data['added_by']=auth()->user()->id;
       //     $flag=Finance_calelanders::insert($data);
        $data->save();
        $dataParent=Finance_calelanders::find($data->id);
        $Sdate=new \DateTime($request->start_date);
        $Edate=new \DateTime($request->end_date);
        $dareInterval=new \DateInterval('P1M');
        $datePerioud=new \DatePeriod($Sdate,$dareInterval,$Edate);

        foreach ($datePerioud as $d){
            $dataMonth['finance_calelanders_id']=$data->id;

            $Montname_en=$d->format('F');
            $dataParentMonth=Monthe::select('id')->where(['name_en'=>$Montname_en])->first();
            $dataMonth['MONTH_ID']=$dataParentMonth['id'];
            $dataMonth['FINANCE_YR']=$data->FINANCE_YR;
            $dataMonth['START_DATE_M']=date('Y-m-01',strtotime($d->format('y-m-d')));
            $dataMonth['END_DATE_M']=date('Y-m-t',strtotime($d->format('y-m-d')));
            $dataMonth['year_and_month']=date('Y-m',strtotime($d->format('y-m-d')));
            $datediff=strtotime( $dataMonth['END_DATE_M'])-strtotime( $dataMonth['START_DATE_M']);
            $dataMonth['number_of_days']=round($datediff/(60*60*24))+1;
            $dataMonth['com_Code']=auth()->user()->com_code;

            $dataMonth['updated_by']=auth()->user()->id;
            $dataMonth['added_by']=auth()->user()->id;
            $dataMonth['start_date_for_pasma']=date('Y-m-01',strtotime($d->format('y-m-d')));
            $dataMonth['end_date_for_pasma']=date('Y-m-t',strtotime($d->format('y-m-d')));
           Finance_cln_periods::insert($dataMonth);







        }







        //    DB::commit();
            return redirect()->route('Finance_calelanders.index')->with(['success'=>'طتمت الاضافة بنجاج']);
       //          }catch (Exception $ex){
       //     DB::rollBack();
        //    return $ex->getMessage()->withInput();
      //  }
    }

    /**
     * Display the specified resource.
     */
    public function show(Finance_calelanders $finance_calelanders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Finance_calelanders::select("*")->where(['id' => $id])->first();
        if (empty($data)) {
            return redirect()->back()->with(['error' => ' عفوا حدث خطأ ']);
        }
        if ($data['is_open'] != 0) {
            return redirect()->back()->with(['error' => ' عفوا لايمكن تعديل السنة المالية في هذه الحالة']);
        }
        return view('admin.Finance_Calelander.update', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        try {
            $data = Finance_calelanders::select("*")->where(['id' => $id])->first();
            if (empty($data)) {
                return redirect()->back()->with(['error' => ' عفوا حدث خطأ ']);
            }
            if ($data['is_open'] != 0) {
                return redirect()->back()->with(['error' => ' عفوا لايمكن تعديل السنة المالية في هذه الحالة'])->withInput();
            }


            DB::beginTransaction();
            $dataToUpdate['FINANCE_YR'] = $request->FINANCE_YR;
            $dataToUpdate['FINANCE_YR_DESC'] = $request->FINANCE_YR_DESC;
            $dataToUpdate['start_date'] = $request->start_date;
            $dataToUpdate['end_date'] = $request->end_date;
            $dataToUpdate['updated_by'] = auth()->user()->id;
            $falg = Finance_calelanders::where(['id' => $id])->update($dataToUpdate);
            if ($falg) {
                if ($data['start_date'] != $request->start_date or $data['end_date'] != $request->end_date) {
                    $flagDelete = Finance_cln_periods::where(['finance_calelanders_id' => $id])->delete();
                    if ($flagDelete) {
                        $startDate = new \DateTime($request->start_date);
                        $endDate = new \DateTime($request->end_date);
                        $dareInterval = new \DateInterval('P1M');
                        $datePerioud = new \DatePeriod($startDate, $dareInterval, $endDate);
                        foreach ($datePerioud as $date) {
                            $dataMonth['finance_calelanders_id'] = $id;
                            $Montname_en = $date->format('F');
                            $dataParentMonth = Monthe::select("id")->where(['name_en' => $Montname_en])->first();
                            $dataMonth['MONTH_ID'] = $dataParentMonth['id'];
                            $dataMonth['FINANCE_YR'] = $dataToUpdate['FINANCE_YR'];
                            $dataMonth['START_DATE_M'] = date('Y-m-01', strtotime($date->format('Y-m-d')));
                            $dataMonth['END_DATE_M'] = date('Y-m-t', strtotime($date->format('Y-m-d')));
                            $dataMonth['year_and_month'] = date('Y-m', strtotime($date->format('Y-m-d')));
                            $datediff = strtotime($dataMonth['END_DATE_M']) - strtotime($dataMonth['START_DATE_M']);
                            $dataMonth['number_of_days'] = round($datediff / (60 * 60 * 24)) + 1;
                            $dataMonth['com_code'] = auth()->user()->com_code;
                            $dataMonth['updated_at'] = date("Y-m-d H:i:s");
                            $dataMonth['created_at'] = date("Y-m-d H:i:s");
                            $dataMonth['added_by'] = auth()->user()->id;
                            $dataMonth['updated_by'] = auth()->user()->id;
                            $dataMonth['start_date_for_pasma'] = date('Y-m-01', strtotime($date->format('Y-m-d')));
                            $dataMonth['end_date_for_pasma'] = date('Y-m-t', strtotime($date->format('Y-m-d')));
                            Finance_cln_periods::insert($dataMonth);
                        }
                    }
                }
            }
            DB::commit();
            return redirect()->route('Finance_calelanders.index')->with(['success' => 'تم تحديث البيانات بنجاح']);
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->with(['status' => 'عفو حدث خطأ ما ' . $ex->getMessage()]);


        }
    }
    function show_year_monthes(Request $request){
        echo "ss";

            $finance_cln_periods=Finance_cln_periods::select("*")->where(['finance_calelanders_id'=>$request->id])->get();
            return view("admin.Finance_Calelander.show_year_monthes",['finance_cln_periods'=>$finance_cln_periods]);

        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        try{
            $data=Finance_calelanders::find($id);
            if(empty($data)){
                return redirect()->back()->with(['error'=>'خطء']);
            }
            if($data['is_open']==1)
            {
                return redirect()->back()->with(['error'=>'خطء']);
            }
           $flag= Finance_calelanders::where(['id'=>$id])->delete();

            if($flag){
                Finance_cln_periods::where(['finance_calelanders_id'=>$id])->delete();
            }
            return  redirect()->route('Finance_calelanders.index')->with(['success'=>'تم الحذف بنجاح']);
        }catch (Exception $ex)
        {

        }
    }

}
