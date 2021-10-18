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
                        <h4 class="card-title ">إضـــافة مركز تقديم خدمة</h4>
                        <p class="card-category">مراكز تقديم الخدمات الحكومية</p>
                    </div><br>
                    <div class="card-body">
                        <form action="{{route('site.insert')}}" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="site_name" dir="rtl">الإســـم</label>
                                    <input type="text" name="site_name" class="form-control" id="site_name" placeholder="إســــم المركز">
                                    @error('site_name')
                                    <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>

                            </div>


                            <br><br>
                            <button type="submit" class="btn btn-primary mb-2">حفـــظ</button>
                            <a href="{{url('/site/details')}}" class="btn btn-default mb-2">عودة</a>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
