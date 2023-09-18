@extends('layouts.admin')
@section('title')
    السنوات المالية
@endsection
@section('contentheader')
    قائمة الضبط
@endsection
@section('contentheaderactivelink')
    <a href="{{route('Finance_calelanders.index')}}"> السنوات المالية</a>
@endsection
@section('contentheaderactive')
    عرض
@endsection
@section('content')

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title card_title_center"> بيانات السنوات المالية</h3>
                <a class="btn btn-sm btn-success" href="{{route('Finance_calelanders.create')}}">اضافة </a>
            </div>
            <div class="card-body">
                @if(@isset($data) and !@empty($data) )
                    <table class="table table-bordered table-hover" id="example2">
                        <thead class="custom">
                        <th> كود السنة</th>
                        <th> وصف السنة</th>
                        <th> تاريخ البداية</th>
                        <th> تاريخ النهاية</th>
                        <th> الاضافة</th>
                        <th> التعديل</th>
                        </thead>

                        @foreach($data as $info)
                            <tr>
                                <td>{{$info->FINANCE_YR}}</td>
                                <td>{{$info->FINANCE_YR_DESC}}</td>
                                <td>{{$info->start_date}}</td>
                                <td>{{$info->end_date}}</td>
                                <td>{{$info->added->name}}</td>
                                <td>
                                    @if($info->updated_by !=0)
                                    <td>{{$info->user->name}}</td>
                                    @else

                                       لا يوجد
                                    @endif
                                    </td>
                                        <td>
                                            @if($info->is_open==0)
                                                <a href="{{url('admin/Finance_calelanderedit/'.$info->id)}}" class="btn btn-success">تعديل</a>
                                                <a href="{{url('admin/Finance_calelanderdelete/'.$info->id)}}" class="btn btn-danger are_you_shur">pذفل</a>
                                                <button class="btn btn-sm btn-info show_year_monthes" data-id="{{ $info->id }}"  >عرض الشهور</button>

                                        </td>
                                @endif
                            </tr>


                        @endforeach
                    </table>
                <br>
                    <div class="col-md-12 text-center">
                        {{$data->links('pagination::bootstrap-4')}}
                    </div>
                @else

                <p class="bg-danger text-center">لا توجد بينات للعرض</p>
                @endif
            </div>
        </div>
    </div>

    <div class="modal fade " id="show_year_monthesModal" >
        <div class="modal-dialog modal-xl">
            <div class="modal-content bg-info">
                <div class="modal-header">
                    <h4 class="modal-title">عرض الشهور  للسنة المالية</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body" id="show_year_monthesModalBody">

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline-light">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $(document).on('click','.show_year_monthes',function(){
                var id=$(this).data('id');
                jQuery.ajax({
                    url:'{{ route('finance_calender.show_year_monthes') }}',
                    type:'get',
                    'dataType':'html',
                    cache:false,
                    data:{ 'id':id },
                    success:function(data){
                        $("#show_year_monthesModalBody").html(data);
                        $("#show_year_monthesModal").modal("show");
                    },
                    error:function(){

                    }

                });


            });
        });


    </script>
@endsection
