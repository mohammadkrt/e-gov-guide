@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            @if(Session::has('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="material-icons">close</i>
                    </button>
                    <span>
                      <!--<b> نجاح - </b>--> {{Session::get('success')}}</span>
                </div>
            @endif
            <div class="card" >
                <div class="card-body">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">الإدارة </h4>
                        <p class="card-category"> اضافة ادارات الوحدات الحكومية</p>
                    </div><br>
                    <div class="card-body">
                        <form action="{{route('department.insert')}}" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="department_name" dir="rtl">الإســـم</label>
                                    <input type="text" name="department_name" class="form-control" id="department_name" placeholder="إسم الادارة ">
                                    @error('department_name')
                                    <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="unit_id">اسم الولاية</label>
                                    <select class="form-control" id="unit_id" name="unit_id">
                                        <option value="" disabled selected> --إختـر الوحدة--</option>
                                        @foreach($units as $unit)
                                        <option value="{{$unit -> id}}">{{$unit -> unit_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('unit_id')
                                    <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>


                            <br><br>
                            <button type="submit" class="btn btn-primary mb-2">حفـــظ</button>
                            <a href="{{url('/department/details')}}" class="btn btn-default mb-2">عودة</a>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
