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
                        <h4 class="card-title ">إضـــافة مقدم خدمة</h4>
                        <p class="card-category"> الاشخاص او الجهات التي تقوم بتقديم الخدمة</p>
                    </div><br>
                    <div class="card-body">
                        <form action="{{route('provider.insert')}}" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="provider_name"> الإســـم</label>
                                    <input type="text" class="form-control" id="provider_name" name="provider_name" placeholder=" مقدم الخدمة">
                                    @error('provider_name')
                                    <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <br><br>
                            <button type="submit" class="btn btn-primary mb-2">حفـــظ</button>
                            <a href="{{url('/provider/details')}}" class="btn btn-default mb-2">عودة</a>
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
