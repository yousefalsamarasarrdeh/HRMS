@extends('layouts.admin')
@section('title')
    الادارات
@endsection
@section('contentheader')
    قائمة الضبط
@endsection
@section('contentheaderactivelink')
    <a href="{{ route('departements.index') }}">   الادارات</a>
@endsection
@section('contentheaderactive')
    عرض
@endsection
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title card_title_center">  بيانات  إدارات الموظفين
                    <a href="{{ route('departements.Create') }}" class="btn btn-sm btn-warning">اضافة جديد</a>
                </h3>
            </div>
            <div class="card-body" id="ajax_responce_serachDiv">
                @if(@isset($data) and !@empty($data) and count($data)>0 )
                    <table id="example2" class="table table-bordered table-hover">
                        <thead class="custom_thead">
                        <th>    اسم الادارة</th>
                        <th>هاتف الادارة</th>
                        <th>    ملاحظات</th>
                        <th>   حالة التفعيل</th>
                        <th>  الاضافة بواسطة</th>
                        <th>  التحديث بواسطة</th>
                        <th></th>
                        </thead>
                        <tbody>
                        @foreach ( $data as $info )
                            <tr>
                                <td>{{ $info->name }}</td>
                                <td> {{ $info->phones }} </td>
                                <td> {{ $info->notes }} </td>
                                <td @if ($info->active==1) class="bg-success" @else class="bg-danger"  @endif > @if ($info->active==1) مفعل @else معطل @endif</td>
                                <td>
                                    @php
                                        $dt=new DateTime($info->created_at);
                                        $date=$dt->format("Y-m-d");
                                        $time=$dt->format("h:i");
                                        $newDateTime=date("A",strtotime($time));
                                        $newDateTimeType= (($newDateTime=='AM')?'صباحا ':'مساء');
                                    @endphp
                                    {{ $date }} <br>
                                    {{ $time }}
                                    {{ $newDateTimeType }}  <br>
                                    {{ $info->added->name }}
                                </td>
                                <td>
                                    @if($info->updated_by>0)
                                        @php
                                            $dt=new DateTime($info->updated_at);
                                            $date=$dt->format("Y-m-d");
                                            $time=$dt->format("h:i");
                                            $newDateTime=date("A",strtotime($time));
                                            $newDateTimeType= (($newDateTime=='AM')?'صباحا ':'مساء');
                                        @endphp
                                        {{ $date }}  <br>
                                        {{ $time }}
                                        {{ $newDateTimeType }}  <br>
                                        {{ $info->updatedby->name }}
                                    @else
                                        لايوجد
                                    @endif
                                </td>
                                <td>
                                    <a  href="{{ route('departements.edit',$info->id) }}" class="btn btn-success btn-sm">تعديل</a>
                                    <form method="post"
                                          action="{{ route('departements.delete',$info->id) }}">@csrf   <button   class="btn   btn-danger btn-sm" type="submit">حذف</button></form>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <br>
                    <div class="col-md-12 text-center">
                        {{ $data->links('pagination::bootstrap-5') }}
                    </div>
                @else
                    <p class="bg-danger text-center"> عفوا لاتوجد بيانات لعرضها</p>
                @endif
            </div>
        </div>
    </div>
@endsection
