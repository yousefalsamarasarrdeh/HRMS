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
  تعديل
@endsection
@section('content')

    <div class="col-12">

        <div class="card">
      <div class="card-header">
          <h3 class="card-title card_title_center">بيانات الضبط العام للنظام</h3>
      </div>
      <div class="card-body">


          @if(@isset($data) and !@empty($data))

              <form action="{{route('admin_panel_settings.update')}}">
                  @csrf
                  <div class="row">
                  <div class="col-md-4">
                      <div class="form-group">
                          <label>اسم الشركة</label>
                          <input type="text" name="company_name" id="company_name" class="form-control" value="{{ old('company_name',$data['company_name'])}}" >
                          @error('company_name')
                          <span class="text-danger">{{$message}}</span>
                          @enderror
                      </div>
                  </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <label>هاتف الشركة</label>
                              <input type="text" name="phones" id="phones" class="form-control" value="{{$data['phones']}}" >
                              @error('phones')
                              <span class="text-danger">{{$message}}</span>
                              @enderror
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <label>العنوان</label>
                              <input type="text" name="address" id="address" class="form-control" value="{{$data['address']}}" >
                              @error('address')
                              <span class="text-danger">{{$message}}</span>
                              @enderror
                          </div>
                      </div>
                  </div>
                  <br>
                  <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                              <label>الايميل</label>
                              <input type="text" name="email" id="email" class="form-control" value="{{ old('email',$data['email'])}}" >
                              @error('email')
                              <span class="text-danger">{{$message}}</span>
                              @enderror
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <label>بعد كم دقيقة نحسب تاخير حضور</label>
                              <input type="text" name="after_miniute_calculate_delay" id="after_miniute_calculate_delay" class="form-control" value="{{old('after_miniute_calculate_delay',$data['after_miniute_calculate_delay'])}}" oninput="this.value=this.value.replace(/[^0-9.]/g,'')">
                              @error('after_miniute_calculate_delay')
                              <span class="text-danger">{{$message}}</span>
                              @enderror
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <label>بعد كم دقيقة نحسب انصراف مبكر</label>
                              <input type="text" name="after_miniute_calculate_early_departure" id="after_miniute_calculate_early_departure" class="form-control" value="{{old('after_miniute_calculate_early_departure',$data['after_miniute_calculate_early_departure'])}}" oninput="this.value=this.value.replace(/[^0-9.]/g,'')">
                              @error('after_miniute_calculate_early_departure')
                              <span class="text-danger">{{$message}}</span>
                              @enderror
                          </div>
                      </div>
                  </div>
                  <br>
                  <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                              <label>عد كم دقيقة مجموع الانصرافات المبكرة والحضور المتاخر نخصم ربع يوم</label>
                              <input type="text" name="after_miniute_quarterday" id="after_miniute_quarterday" class="form-control" value="{{old('after_miniute_quarterday',$data['after_miniute_quarterday'])}}" oninput="this.value=this.value.replace(/[^0-9.]/g,'')">
                              @error('after_miniute_quarterday')
                              <span class="text-danger">{{$message}}</span>
                              @enderror
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <label>بعد كم مرة تاخير او انصراف مبكر يخصم نصف يوم</label>
                              <input type="text" name="after_time_half_daycut" id="after_time_half_daycut" class="form-control" value="{{old('after_time_half_daycut',$data['after_time_half_daycut'])}}" oninput="this.value=this.value.replace(/[^0-9.]/g,'')">
                              @error('after_time_half_daycut')
                              <span class="text-danger">{{$message}}</span>
                              @enderror
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <label>نخصم بعد كم مرة تاخير او انصراف مبكر يوم كامل</label>
                              <input type="text" name="after_time_allday_daycut" id="after_time_allday_daycut" class="form-control" value="{{old('after_time_allday_daycut',$data['after_time_allday_daycut'])}}" oninput="this.value=this.value.replace(/[^0-9.]/g,'')">
                              @error('after_time_allday_daycut')
                              <span class="text-danger">{{$message}}</span>
                              @enderror
                          </div>
                      </div>
                  </div>
                  <br>
                  <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                              <label>رصيد اجازات الموضف الشهري</label>
                              <input type="text" name="monthly_vacation_balance" id="monthly_vacation_balance" class="form-control" value="{{old('monthly_vacation_balance',$data['monthly_vacation_balance'])}}" oninput="this.value=this.value.replace(/[^0-9.]/g,'')">
                              @error('')
                              <span class="text-danger">{{$message}}</span>
                              @enderror
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <label>بعد كم يوم ينزل للموضف رصيد اجازة</label>
                              <input type="text" name="after_days_begin_vacation" id="after_days_begin_vacation" class="form-control" value="{{old('after_days_begin_vacation',$data['after_days_begin_vacation'])}}" oninput="this.value=this.value.replace(/[^0-9.]/g,'')">
                              @error('')
                              <span class="text-danger">{{$message}}</span>
                              @enderror
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <label>الرصيد الاولي للمرحلة عند تفعيل اجازات الموضف نثل نزول عشر ايام بعد 6 شهور للموضف</label>
                              <input type="text" name="first_balance_begin_vacation" id="first_balance_begin_vacation" class="form-control" value="{{old('first_balance_begin_vacation',$data['first_balance_begin_vacation'])}}" oninput="this.value=this.value.replace(/[^0-9.]/g,'')">
                              @error('')
                              <span class="text-danger">{{$message}}</span>
                              @enderror
                          </div>
                      </div>
                  </div>
                  <br>
                  <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                              <label>عد كم دقيقة مجموع الانصرافات المبكرة والحضور المتاخر نخصم ربع يوم</label>
                              <input type="text" name="after_miniute_quarterday" id="after_miniute_quarterday" class="form-control" value="{{old('after_miniute_quarterday',$data['after_miniute_quarterday'])}}" oninput="this.value=this.value.replace(/[^0-9.]/g,'')">
                              @error('after_miniute_quarterday')
                              <span class="text-danger">{{$message}}</span>
                              @enderror
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <label>بعد كم مرة تاخير او انصراف مبكر يخصم نصف يوم</label>
                              <input type="text" name="after_time_half_daycut" id="after_time_half_daycut" class="form-control" value="{{old('after_time_half_daycut',$data['after_time_half_daycut'])}}" oninput="this.value=this.value.replace(/[^0-9.]/g,'')">
                              @error('after_time_half_daycut')
                              <span class="text-danger">{{$message}}</span>
                              @enderror
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <label>نخصم بعد كم مرة تاخير او انصراف مبكر يوم كامل</label>
                              <input type="text" name="after_time_allday_daycut" id="after_time_allday_daycut" class="form-control" value="{{old('after_time_allday_daycut',$data['after_time_allday_daycut'])}}" oninput="this.value=this.value.replace(/[^0-9.]/g,'')">
                              @error('after_time_allday_daycut')
                              <span class="text-danger">{{$message}}</span>
                              @enderror
                          </div>
                      </div>
                  </div>
                  <br>
                  <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                              <label>قيمة خصم الايام بعد اول مرة غياب غير مبرر</label>
                              <input type="text" name="sanctions_value_first_abcence" id="sanctions_value_first_abcence" class="form-control" value="{{old('sanctions_value_first_abcence',$data['sanctions_value_first_abcence'])}}" oninput="this.value=this.value.replace(/[^0-9.]/g,'')">
                              @error('')
                              <span class="text-danger">{{$message}}</span>
                              @enderror
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <label>قيمة خصم الايام بعد ثاني مرة غياب غير مبرر</label>
                              <input type="text" name="sanctions_value_second_abcence" id="sanctions_value_second_abcence" class="form-control" value="{{old('sanctions_value_second_abcence',$data['sanctions_value_second_abcence'])}}" oninput="this.value=this.value.replace(/[^0-9.]/g,'')">
                              @error('')
                              <span class="text-danger">{{$message}}</span>
                              @enderror
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <label>قيمة خصم الايام بعد ثالث مرة غياب غير مبرر</label>
                              <input type="text" name="sanctions_value_thaird_abcence" id="sanctions_value_thaird_abcence" class="form-control" value="{{old('sanctions_value_thaird_abcence',$data['sanctions_value_thaird_abcence'])}}" oninput="this.value=this.value.replace(/[^0-9.]/g,'')">
                              @error('')
                              <span class="text-danger">{{$message}}</span>
                              @enderror
                          </div>
                      </div>
                  </div>
                  <br>
                  <div class="col-md-4">
                      <div class="form-group">
                          <label>قيمة خصم الايام بعد رابع مرة غياب غير مبرر</label>
                          <input type="text" name="sanctions_value_forth_abcence" id="sanctions_value_forth_abcence" class="form-control" value="{{old('sanctions_value_forth_abcence',$data['sanctions_value_forth_abcence'])}}" oninput="this.value=this.value.replace(/[^0-9.]/g,'')">
                          @error('')
                          <span class="text-danger">{{$message}}</span>
                          @enderror
                      </div>
                  </div>


                  <div class="col-md-12 text-center">
                      <div class="form-group">
                          <button type="submit" class="btn btn-success text-center" >تحديث</button>
                      </div>
                  </div>

              </form>



          @else
              <h>error</h>
          @endif
      </div>
    </div>

</div>
@endsection
