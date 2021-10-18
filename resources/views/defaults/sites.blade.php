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

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title "> مراكز الخدمات  </h4>
                        <p class="card-category">مراكز تقديم الخدمات الحكومية </p>
                    </div>
                    <div class="card-body">
                        <form action="{{route('default.insert')}}" method="post" id="multiple_select_form">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="service_id">اسم الخدمة</label>
                                    <select class="form-control" id="service" name="service_id">
                                        <option value="" disabled selected> --إختـر الخـدمـة--</option>
                                        <option value="{{$service->id}}">{{$service->service_name}}</option>
                                    </select>
                                    @error('service_id')
                                    <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="site_ids">مراكز تقديم الخدمة</label>
                                    <select class="col-md-12" id="site_ids" multiple name="site_ids[]">
                                        <option value="" disabled selected> --يمكنك اختيار اكثر من مركز لتقديم الخدمة - عن طريق الضغط علي مفتاح Ctrl ثم النقر بالماوس علي الخيار--</option>
                                        @foreach($allsites as $allsite)
                                            <option value="{{$allsite -> id}}">{{$allsite -> site_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('site_ids')
                                    <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            <br>
                            <button type="submit" class="btn btn-primary mb-2">إضــافة</button>
                            <a href="{{url('/default/details')}}" class="btn btn-default mb-2">عودة</a>
                        </form>
                        <br><br>
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
                                    إســم الخدمة
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
                                            {{$service->service_name}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
