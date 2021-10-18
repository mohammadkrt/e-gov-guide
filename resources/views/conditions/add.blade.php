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
                        <h4 class="card-title ">إضـــافة شروط الخدمات</h4>
                        <p class="card-category">  شروط تقديم الخدمات الحكومية </p>
                    </div><br>
                    <div class="card-body">
                        <form action="{{route('condition.insert')}}" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="service_id">اسم الخدمة</label>
                                    <select class="form-control" id="service_id" name="service_id">
                                        <option value="" disabled selected> --إختـر الخدمة--</option>
                                        @foreach($services as $service)
                                            <option value="{{$service -> id}}">{{$service -> service_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('service_id')
                                    <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="condition_name" dir="rtl">الشــرط</label>
                                    <input type="text" name="condition_name" class="form-control" id="condition_name" placeholder="ادخل الشــرط ">
                                    @error('condition_name')
                                    <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>


                            <br><br>
                            <button type="submit" class="btn btn-primary mb-2">حفـــظ</button>
                            <a href="{{url('/condition/details')}}" class="btn btn-default mb-2">عودة</a>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
