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

        <a href="{{url('site/add')}}" class="btn btn-success">اضف جديد</a>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title "> مراكز الخدمات  </h4>
                        <p class="card-category">مراكز تقديم الخدمات الحكومية </p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>
                                    #
                                </th>
                                <th>
                                    إسم المركز
                                </th>
                                <th>
                                    تعديل
                                </th>
                                <th>
                                    حذف
                                </th>
                                </thead>
                                <tbody>
                                @foreach($sites as $site)
                                <tr>
                                    <td>
                                        {{$site->id}}
                                    </td>
                                    <td>
                                        {{$site->site_name}}
                                    </td>
                                    <td>
                                        <a href="{{url('site/edit/'.$site->id)}}" class="btn btn-primary">عرض</a>
                                    </td>
                                    <td>
                                        <a href="{{url('site/delete/'.$site->id)}}" class="btn btn-danger">حذف</a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$sites->links()}}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
