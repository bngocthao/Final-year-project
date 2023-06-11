@extends('layouts.app')
@section('content')

<!-- Main content -->
<section class="content">
<!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
            <h3>{{$total_app}}</h3>

            <p>Tổng đơn</p>
            </div>
            <div class="icon">
            <i class="fa fa-fw fa-plus"></i>
            </div>
            <a href="{{route('postponse_apps.index')}}" class="small-box-footer">Chi tiết <i class="fa fa-arrow-circle-right"></i></a>
        </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>{{$waiting_app}}</h3>
{{--                <sup style="font-size: 20px">%</sup></h3>--}}

            <p>Đang chờ xử lý</p>
            </div>
            <div class="icon">
            <i class="fa fa-fw fa-circle-o-notch"></i>
            </div>
            <a href="{{route('postponse_apps.index')}}" class="small-box-footer">Chi tiết <i class="fa fa-arrow-circle-right"></i></a>
        </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
            <h3>{{$accepted_app}}</h3>

            <p>Đã chấp nhận</p>
            </div>
            <div class="icon">
            <i class="fa fa-fw fa-check-square-o"></i>
            </div>
            <a href="{{route('postponse_apps.index')}}" class="small-box-footer">Chi tiết <i class="fa fa-arrow-circle-right"></i></a>
        </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
            <h3>{{$denine_app}}</h3>

            <p>Đã từ chối</p>
            </div>
            <div class="icon">
            <i class="fa fa-fw fa-close"></i>
            </div>
            <a href="{{route('postponse_apps.index')}}" class="small-box-footer">Chi tiết <i class="fa fa-arrow-circle-right"></i></a>
        </div>
        </div>
        <!-- ./col -->
    </div>

</section>
{{--<div class="container">--}}
{{--    <div class="row">--}}
{{--        <div class="col-md-3">--}}
{{--            <div class="form-group">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">--}}
{{--                        <div class="card-title">--}}
{{--                            asdasdsad--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        aAAAA--}}
{{--                    </div>--}}
{{--                    <div class="card-footer">--}}
{{--                        Fotter Card--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="col-md-3">--}}
{{--            <div class="form-group">--}}
{{--                Cột 2--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="col-md-3">--}}
{{--            <div class="form-group">--}}
{{--                Cột 3--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="col-md-3">--}}
{{--            <div class="form-group">--}}
{{--                Cột 4--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}

{{--</div>--}}
<!-- /.content -->

@endsection




