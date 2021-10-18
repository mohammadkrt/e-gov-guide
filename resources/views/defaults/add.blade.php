@extends('layouts.app')

@section('content')
    <style type="text/css">
        .dropdown-toggle{
            height: 40px;
            width: 1000px !important;
        }
    </style>
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
                        <h4 class="card-title "> الخدمــات</h4>
                        <p class="card-category"> الخدمات - اماكن تقديم الخدمات - مقدمي الخدمات - الرسوم - وكيفية الوصول للخدمة</p>
                    </div><br>
                    <div class="card-body">
                        <form action="{{route('default.insert')}}" method="post" id="multiple_select_form">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="state_id">اسم الولاية</label>
                                    <select class="form-control" id="state" name="state_id">
                                        <option value="" disabled selected> --إختـر الـولاية--</option>
                                        @foreach($states as $state)
                                            <option value="{{$state -> id}}">{{$state -> state_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('state')
                                    <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="unit_id">اسم الوحدة</label>
                                    <select class="form-control" id="unit" name="unit_id">
                                        <option value="" disabled selected> --إختـر الوحدة--</option>
                                        @foreach($units as $unit)
                                            <option value="{{$unit -> id}}">{{$unit -> unit_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('unit')
                                    <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="department_id">اسم الادارة</label>
                                    <select class="form-control" id="department" name="department_id">
                                        <option value="" disabled selected> --إختـر الادارة--</option>

                                    </select>
                                    @error('department')
                                    <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="service_id">اسم الخدمة</label>
                                    <select class="form-control" id="service" name="service_id">
                                        <option value="" disabled selected> --إختـر الـخدمة--</option>

                                    </select>
                                    @error('service')
                                    <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            <br><br>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="provider_ids">مقدمي الخدمة</label>
                                    <select class="col-md-12" id="provider_ids" multiple name="provider_ids[]">
                                        <option value="" disabled selected> --يمكنك اختيار اكثر من مقدم للخدمة - عن طريق الضغط علي مفتاح Ctrl ثم النقر بالماوس علي الخيار--</option>
                                        @foreach($providers as $provider)
                                            <option value="{{$provider -> id}}">{{$provider -> provider_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('provider_ids')
                                    <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="site_ids">مراكز تقديم الخدمة</label>
                                    <select class="col-md-12" id="site_ids" multiple name="site_ids[]">
                                        <option value="" disabled selected> --يمكنك اختيار اكثر من مركز لتقديم الخدمة - عن طريق الضغط علي مفتاح Ctrl ثم النقر بالماوس علي الخيار--</option>
                                        @foreach($sites as $site)
                                            <option value="{{$site -> id}}">{{$site -> site_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('site_ids')
                                    <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            <br><br>
                            <button type="submit" class="btn btn-primary mb-2">حفـــظ</button>
                            <a href="{{url('/default/details')}}" class="btn btn-default mb-2">عودة</a>
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
        $('#state').change(function(){
            var stateID = $(this).val();
            if(stateID){
                $.ajax({
                    type:"GET",
                    url:"{{url('/default/get-unit-list/')}}?state_id="+stateID,
                    success:function(res){
                        if(res){
                            $("#unit").empty();
                            $("#department").empty();
                            $("#department").append('<option value="" disabled selected> --إختـر الادارة--</option>');
                            $("#service").empty();
                            $("#service").append('<option value="" disabled selected> --إختـر الخدمة--</option>');

                            $("#unit").append('<option value="" disabled selected> --إختـر الوحدة--</option>');
                            $.each(res,function(key,value){
                                $("#unit").append('<option value="'+key+'">'+value+'</option>');
                            });

                        }else{
                            $("#unit").empty();
                        }
                    }
                });
            }else{
                $("#unit").empty();
                $("#department").empty();
                $("#service").empty();
            }
        });
        $('#unit').on('change',function(){
            var unitID = $(this).val();
            if(unitID){
                $.ajax({
                    type:"GET",
                    url:"{{url('/default/get-department-list/')}}?unit_id="+unitID,
                    success:function(res){
                        if(res){
                            $("#department").empty();
                            $("#service").empty();
                            $("#service").append('<option value="" disabled selected> --إختـر الخدمة--</option>');

                            $("#department").append('<option value="" disabled selected> --إختـر الادارة--</option>');
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
                $("#service").empty();
            }

        });
        $('#department').on('change',function(){
            var departmentID = $(this).val();
            if(departmentID){
                $.ajax({
                    type:"GET",
                    url:"{{url('/default/get-service-list/')}}?department_id="+departmentID,
                    success:function(res){
                        if(res){
                            $("#service").empty();
                            $("#service").append('<option value="" disabled selected> --إختـر الخدمة--</option>');
                            $.each(res,function(key,value){
                                $("#service").append('<option value="'+key+'">'+value+'</option>');
                            });

                        }else{
                            $("#service").empty();
                        }
                    }
                });
            }else{
                $("#service").empty();
            }

        });
    </script>

@endsection
