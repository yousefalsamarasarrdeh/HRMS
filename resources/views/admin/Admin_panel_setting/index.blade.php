@extends('layouts.admin')
@section('title')
    الضبط العام
@endsection
@section('contentheader')
    قائمة الضبط
@endsection
@section('contentheaderactivelink')
    <a href="{{route('admin_panel_settings.index')}}"> الضبط العام</a>
@endsection
@section('contentheaderactive')
    عرض
@endsection
@section('content')
    <div class="col-12">
  <div class="card">
      <div class="card-header">
          <h3 class="card-title card_title_center">بيانات الضبط العام للنظام</h3>
      </div>
      <div class="card-body">
          <table class="table table-bordered table-hover">
          @if(@isset($data) and !@empty($data))
             <tr>
                 <td class="width30">اسم الشركة</td>
                 <td>
                   {{$data['company_name']}}
                 </td>
             </tr>
              <tr>
                  <td class="wider">حالة التفعيل</td>
                  <td>@if($data['saysem_status']==1)مفعل @else معطل @endif </td>
              </tr>
                  <tr>
                      <td class="width30">هاتف</td>
                      <td>
                          {{$data['phones']}}
                      </td>
                  </tr>
                  <tr>
                      <td class="width30">عنوان</td>
                      <td>
                          {{$data['address']}}
                      </td>
                  </tr>
                  <tr>
                      <td class="width30">البريد الالكتروني</td>
                      <td>
                          {{$data['email']}}
                      </td>
                  </tr>
                  <tr>
                      <td class="width30">بعد كم دقيقة نحسب تاخير حضور</td>
                      <td>
                          {{$data['after_miniute_calculate_delay']}}
                      </td>
                  </tr>
                  <tr>
                      <td class="width30">بعد كم دقيقة نحسب انصراف مبكر</td>
                      <td>
                          {{$data['after_miniute_calculate_early_departure']}}
                      </td>
                  </tr>
                  <tr>
                      <td class="width30">بعد كم دقيقة مجموع الانصرافات المبكرة والحضور المتاخر نخصم ربع يوم</td>
                      <td>
                          {{$data['after_miniute_quarterday']}}
                      </td>
                  </tr>

                  <tr>
                      <td class="width30">بعد كم مرة تاخير او انصراف مبكر يخصم نصف يوم</td>
                      <td>
                          {{$data['after_time_half_daycut']}}
                      </td>
                  </tr>
                  <tr>
                      <td class="width30">نخصم بعد كم مرة تاخير او انصراف مبكر يوم كامل</td>
                      <td>
                          {{$data['after_time_allday_daycut']}}
                      </td>
                  </tr>
                  <tr>
                      <td class="width30">رصيد اجازات الموضف الشهري</td>
                      <td>
                          {{$data['monthly_vacation_balance']}}
                      </td>
                  </tr>
                  <tr>
                      <td class="width30">بعد كم يوم ينزل للموضف رصيد اجازة</td>
                      <td>
                          {{$data['after_days_begin_vacation']}}
                      </td>
                  </tr>
                  <tr>
                      <td class="width30">الرصيد الاولي للمرحلة عند تفعيل اجازات الموضف نثل نزول عشر ايام بعد 6 شهور للموضف</td>
                      <td>
                          {{$data['first_balance_begin_vacation']}}
                      </td>
                  </tr>
                  <tr>
                      <td class="width30">قيمة خصم الايام بعد اول مرة غياب غير مبرر</td>
                      <td>
                          {{$data['sanctions_value_first_abcence']}}
                      </td>
                  </tr>
                  <tr>
                      <td class="width30">قيمة خصم الايام بعد ثاني مرة غياب غير مبرر</td>
                      <td>
                          {{$data['sanctions_value_second_abcence']}}
                      </td>
                  </tr>
                  <tr>
                      <td class="width30">قيمة خصم الايام بعد ثالث مرة غياب غير مبرر</td>
                      <td>
                          {{$data['sanctions_value_thaird_abcence']}}
                      </td>
                  </tr>
                  <tr>
                      <td class="width30">قيمة خصم الايام بعد رابع مرة غياب غير مبرر</td>
                      <td>
                          {{$data['sanctions_value_forth_abcence']}}
                      </td>
                  </tr>
              <tr><td colspan="2" class="text-center"><a href="{{route('admin_panel_settings.edit')}}" class="btn btn-danger">تعديل</a> </td> </tr>


              </table>
          @else
              <h>error</h>
          @endif
      </div>
  </div>

</div>
@endsection
