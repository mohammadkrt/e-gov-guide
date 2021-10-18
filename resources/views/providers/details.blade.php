@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        @if(Session::has('success'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="material-icons">close</i>
                </button>
                <span>
                      <!--<b> نجاح - </b>--> {{Session::get('success')}}</span>
            </div>
        @endif

        @if(Session::has('error'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="material-icons">close</i>
                </button>
                <span>
                      <!--<b> فشل - </b>--> {{Session::get('error')}}</span>
            </div>
        @endif

        <a href="{{url('provider/add')}}" class="btn btn-success">اضف جديد</a>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">مقــدم الخــدمة</h4>
                        <p class="card-category">الاشخاص او الجهات التي تقوم بتقديم الخدمة</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>
                                    #
                                </th>
                                <th>
                                    مقدم الخدمة
                                </th>
                                <th>
                                    تعديل
                                </th>
                                <th>
                                    حذف
                                </th>
                                </thead>
                                <tbody>
                                @foreach($providers as $provider)
                                    <tr>
                                        <td>
                                            {{$provider->id}}
                                        </td>
                                        <td>
                                            {{$provider->provider_name}}
                                        </td>
                                        <td>
                                            <a href="{{url('provider/edit/'.$provider->id)}}" class="btn btn-primary">عرض</a>
                                        </td>
                                        <td>
                                            <a href="{{url('provider/delete/'.$provider->id)}}" class="btn btn-danger">حذف</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$providers->links()}}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
