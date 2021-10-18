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

        <a href="{{url('condition/add')}}" class="btn btn-success">اضف جديد</a>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title "> شروط الخدمات</h4>
                        <p class="card-category">  شروط تقديم الخدمات الحكومية </p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>
                                    #
                                </th>
                                <th>
                                    الشــرط
                                </th>
                                <th>
                                    اســم الخدمة
                                </th>
                                <th>
                                    تعديل
                                </th>
                                <th>
                                    حذف
                                </th>
                                </thead>
                                <tbody>
                                @foreach($conditions as $condition)
                                    <tr>
                                        <td>
                                            {{$condition->id}}
                                        </td>
                                        <td>
                                            {{$condition->condition_name}}
                                        </td>
                                        <td>
                                            {{$condition->service->service_name}}
                                        </td>
                                        <td>
                                            <a href="{{url('condition/edit/'.$condition->id)}}" class="btn btn-primary">عرض</a>
                                        </td>
                                        <td>
                                            <a href="{{url('condition/delete/'.$condition->id)}}" class="btn btn-danger">حذف</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$conditions->links()}}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
