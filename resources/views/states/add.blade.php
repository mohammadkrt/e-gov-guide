@extends('layouts.app')

@section('content')

        <div class="row">
            <div class="col-md-12">
                <div class="card" >
                    <div class="card-body">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">إضـــافة ولايه</h4>
                       <!-- <p class="card-category"> Here is a subtitle for this table</p>-->
                    </div><br>
                    <div class="card-body">
                        <form action="{{url('/state/insert')}}" method="post">
                          @csrf
                              <div class="form-group col-md-6">
                                <label for="exampleFormControlInput1" dir="rtl">الإســـم</label>
                                <input type="text" name="state_name" class="form-control" id="exampleFormControlInput1" placeholder="إســــم الولايه">
                                 @error('state_name')
                                    <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                              </div>
                              
                              <br><br>
                              <button type="submit" class="btn btn-primary mb-2">حفـــظ</button>
                              <a href="{{url('/state/details')}}" class="btn btn-default mb-2">عودة</a>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

@endsection
