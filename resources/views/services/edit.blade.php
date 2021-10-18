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
                        <h4 class="card-title ">تعــديل خدمة</h4>
                        <p class="card-category"> الخدمات التي تقدمها وحدات الولاية المختلفة</p>
                    </div><br>
                    <div class="card-body">
                        <form action="{{route('service.update', $service->id)}}" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="unit_id">اســم الوحدة</label>
                                    <select class="form-control" id="unit" name="unit_id">
                                        <option value="" disabled selected> --إختـر الوحدة--</option>
                                        @foreach($units as $unit)
                                            <option value="{{ $unit->id }}" {{$service->unit_id == $unit->id  ? 'selected' : ''}}>{{ $unit->unit_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('unit_id')
                                    <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="department_id">اســم الإدارة</label>
                                    <select class="form-control" id="department" name="department_id">
                                        <option value="" disabled selected> --إختـر الإدارة--</option>
                                        @foreach($departments as $department)
                                            <option value="{{ $department->id }}" {{$service->department_id == $department->id  ? 'selected' : ''}}>{{ $department->department_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('department_id')
                                    <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="service_name"> الإســـم</label>
                                <input type="text" class="form-control" value="{{$service->service_name}}" id="service_name" name="service_name" placeholder="إســــم الخدمة">
                                @error('service_name')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">الوصــف</label>
                                <input type="text" class="form-control" value="{{$service->description}}" id="description" name="description" placeholder="وصـف الخدمة">
                                @error('description')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>


                            <br><br>
                            <button type="submit" class="btn btn-primary mb-2">تعـديل</button>
                            <a href="{{url('/service/details')}}" class="btn btn-default mb-2">عودة</a>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- References -->
    <!-- https://www.codermen.com/blog/55/ajax-dynamic-dependent-country-state-city-dropdown-using-jquery-ajax-in-laravel-5-6 -->
    <!-- https://www.tutsmake.com/laravel-dynamic-dependent-dropdown-using-ajax/ -->
    <script src=//www.codermen.com/js/jquery.js></script>
    <script type=text/javascript>
        $('#unit').change(function(){
            var unitID = $(this).val();
            if(unitID){
                $.ajax({
                    type:"GET",
                    url:"{{url('/service/get-department-list/')}}?unit_id="+unitID,
                    success:function(res){
                        if(res){
                            $("#department").empty();
                            $("#department").append('<option value="" disabled selected> --إختـر الإدارة--</option>');
                            $.each(res,function(key,value){
                                $("#department").append('<option value="'+key+'">'+value+'</option>');
                            });

                        }else{
                            $("#department").empty();
                        }
                    }
                });
            }else{
                $("#department").empty();
            }
        });
    </script>
@endsection
