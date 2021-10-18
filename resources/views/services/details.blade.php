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

        <a href="{{url('service/add')}}" class="btn btn-success">اضف جديد</a>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">الـخدمات</h4>
                        <p class="card-category">الخدمات التي تقدمها وحدات الولاية المختلفة</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>
                                    #
                                </th>
                                <th>
                                    إسم الخدمة
                                </th>
                                <th>
                                    وصف الخمة
                                </th>
                                <th>
                                    اسم الوحدة
                                </th>
                                <th>
                                    اسم الادارة
                                </th>
                                <th>
                                    تعديل
                                </th>
                                <th>
                                    حذف
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
                                            {{$service->department->department_name}}
                                        </td>
                                        <td>
                                            <a href="{{url('service/edit/'.$service->id)}}" class="btn btn-primary">عرض</a>
                                        </td>
                                        <td>
                                            <a href="{{url('service/delete/'.$service->id)}}" class="btn btn-danger">حذف</a>
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
