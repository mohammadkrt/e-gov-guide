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
                        <h4 class="card-title ">تعــديل مقدم خدمة</h4>
                        <p class="card-category"> الاشخاص او الجهات التي تقوم بتقديم الخدمة</p>
                    </div><br>
                    <div class="card-body">
                        <form action="{{route('provider.update', $provider->id)}}" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="provider_name"> الإســـم</label>
                                    <input type="text" class="form-control" value="{{$provider->provider_name}}" id="provider_name" name="provider_name" placeholder=" مقدم الخدمة">
                                    @error('provider_name')
                                    <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <br><br>
                            <button type="submit" class="btn btn-primary mb-2">تعـديل</button>
                            <a href="{{url('/provider/details')}}" class="btn btn-default mb-2">عودة</a>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
