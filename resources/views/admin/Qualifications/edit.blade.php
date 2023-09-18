@extends('layouts.admin')
@section('title')
    مؤهلات الموظفين
@endsection
@section('contentheader')
    قائمة الضبط
@endsection
@section('contentheaderactivelink')
    <a href="{{ route('Qualifications.index') }}">   الوظائف</a>
@endsection
@section('contentheaderactive')
    تعديل
@endsection

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title card_title_center">  تعديل بيانات مؤهل
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ route('Qualifications.update',$data['id']) }}" method="post">
                    @csrf
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>     اسم المؤهل</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name',$data['name']) }}"  >
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="form-group">
                            <label> حالة التفعيل</label>
                            <select name="active" id="active" class="form-control">
                                <option @if(old('active',$data['active'])==1) selected @endif  value="1">مفعل</option>
                                <option  @if(old('active',$data['active'])==0) selected @endif  value="0">معطل</option>
                            </select>
                            @error('active')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group text-center">
                            <button class="btn btn-sm btn-success" type="submit" name="submit">تعديل المؤهل </button>
                            <a href="{{ route('Qualifications.index') }}" class="btn btn-danger btn-sm">الغاء</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
