@extends('layouts.app')

@section('content')

        <div class="row">
            <div class="col-md-12">
                <div class="card" >
                    <div class="card-body">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">تعديل مركز تقديم خدمة</h4>
                        <p class="card-category"> مراكز تقديم الخدمات الحكومية</p>
                    </div><br>
                    <div class="card-body">
                        <form action="{{url('/site/update', $site->id)}}" method="post">
                          @csrf
                              <div class="form-group col-md-6">
                                <label for="site_name" dir="rtl">الإســـم</label>
                                <input type="text" name="site_name" value="{{$site->site_name}}" class="form-control" id="site_name" placeholder="إســــم المركز">
                                 @error('site_name')
                                    <small class="form-text text-danger">{{$message}}</small>
                                  @enderror
                              </div>
                       
                              <br><br>
                              <button type="submit" class="btn btn-primary mb-2">تعديل</button>
                             <a href="{{url('/site/details')}}" class="btn btn-default mb-2">عودة</a>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

@endsection
