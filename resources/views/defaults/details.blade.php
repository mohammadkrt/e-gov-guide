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

            @if(Session::has('fail'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="material-icons">close</i>
                    </button>
                    <span>
                      <!--<b> نجاح - </b>--> {{Session::get('fail')}}</span>
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

        <a href="{{url('default/add')}}" class="btn btn-success">اضافة مقدم خدمة / موقع تقديم خدمة</a>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title "> ربط الخدمات بالمراكز والمقدمين</h4>
                        <p class="card-category">ربط الخدمات - اماكن تقديم الخدمات - مقدمي الخدمات  - وكيفية الوصول للخدمة</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>
                                    #
                                </th>
                                <th>
                                     الخدمة
                                </th>
                                <th>
                                    وصف الخدمة
                                </th>
                                <th>
                                    اسم الوحدة
                                </th>
                                <th>
                                    ربط الخدمات بالمراكز والمقدمين
                                </th>
                                </thead>
                                <tbody>
                                @foreach($services as $service)
                                    <tr>
                                        <td>
                                            {{$service->id}}
                                        </td>
                                        <td>
                                            {{$service->service_name}}
                                        </td>
                                        <td>
                                            {{$service->description}}
                                        </td>
                                        <td>
                                            {{$service->unit->unit_name}}
                                        </td>
                                        <td>
                                            <a href="{{url('default/service/providers/'.$service->id)}}" class="btn btn-outline-success">مقدم الخدمة</a>
                                            <a href="{{url('default/service/sites/'.$service->id)}}" class="btn btn-outline-success">مركز التقديم</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$services->links()}}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
