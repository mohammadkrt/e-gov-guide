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
                        <h4 class="card-title ">تعـديل رسوم</h4>
                        <p class="card-category">رسوم الخدمات الحكومية</p>
                    </div><br>
                    <div class="card-body">
                        <form action="{{route('fees.update', $fees->id)}}" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="fees_name" dir="rtl">الإســـم</label>
                                    <input type="text" name="fees_name" value="{{$fees->fees_name}}" class="form-control" id="fees_name" placeholder="إســــم الرسم">
                                    @error('fees_name')
                                    <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="fees_value" dir="rtl"> القيـمة</label>
                                    <input type="text" name="fees_value" value="{{$fees->fees_value}}" class="form-control" id="fees_value" placeholder="قـيمة الـرسم">
                                    @error('fees_value')
                                    <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="service_id">اسم الخدمة</label>
                                    <select class="form-control" id="service_id" name="service_id">
                                        <option value="" disabled selected> --إختـر الخــدمة--</option>
                                        @foreach($services as $service)
                                            <option value="{{ $service->id }}" {{$fees->service_id == $service->id  ? 'selected' : ''}}>{{ $service->service_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('service_id')
                                    <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>


                            <br><br>
                            <button type="submit" class="btn btn-primary mb-2">تعـديل</button>
                            <a href="{{url('/fees/details')}}" class="btn btn-default mb-2">عودة</a>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
