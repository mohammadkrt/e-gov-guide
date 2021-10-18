<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">content_copy</i>
                </div>
                <p class="card-category">  الخدمات</p>
                <h3 class="card-title">{{$services}}
                    <small></small>
                </h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">update</i>
                    <a href="{{route('dashboard.index')}}">تحديـث...</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">store</i>
                </div>
                <p class="card-category"> المواقع</p>
                <h3 class="card-title">{{$sites}}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">update</i>
                    <a href="{{route('dashboard.index')}}">تحديـث...</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">info_outline</i>
                </div>
                <p class="card-category"> الشروط</p>
                <h3 class="card-title">{{$conditions}}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">update</i>
                    <a href="{{route('dashboard.index')}}">تحديـث...</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">person</i>
                </div>
                <p class="card-category">المقدمين</p>
                <h3 class="card-title">{{$providers}}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">update</i>
                    <a href="{{route('dashboard.index')}}">تحديـث...</a>
                </div>
            </div>
        </div>
    </div>
</div>
