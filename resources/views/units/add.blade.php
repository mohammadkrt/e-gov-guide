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
                        <h4 class="card-title ">إضـــافة وحدة</h4>
                        <p class="card-category"> الوزارات - المحليات - الهيئات -المجالس</p>
                    </div><br>
                    <div class="card-body">
                        <form action="{{route('unit.insert')}}" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="unit_name" dir="rtl">الإســـم</label>
                                    <input type="text" name="unit_name" class="form-control" id="unit_name" placeholder="إســــم الوحدة">
                                    @error('unit_name')
                                    <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="state_id">اسم الولاية</label>
                                    <select class="form-control" id="state_id" name="state_id">
                                        <option value="" disabled selected> --إختـر الـولاية--</option>
                                        @foreach($states as $state)
                                        <option value="{{$state -> id}}">{{$state -> state_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('state_id')
                                    <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>


                            <br><br>
                            <button type="submit" class="btn btn-primary mb-2">حفـــظ</button>
                            <a href="{{url('/unit/details')}}" class="btn btn-default mb-2">عودة</a>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
