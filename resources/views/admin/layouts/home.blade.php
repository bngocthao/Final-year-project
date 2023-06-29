@extends('layouts.app')
@section('content')
<!-- JS chart -->
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.3.0/chart.min.js" integrity="sha512-mlz/Fs1VtBou2TrUkGzX4VoGvybkD9nkeXWJm3rle0DPHssYYx4j+8kIS15T78ttGfmOjH0lLaBXGcShaVkdkg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}
<!-- Main content -->
<section class="content">
<!-- Donut chart (Stat box) -->
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


    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title"></h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
{{--                <div class="box-body" style="width: 600px !important; height: 400px !important;">--}}
            <canvas id="myChart"></canvas>
        </div>

{{--        <input id="year" value="{{json_encode($years_statistic_name)}}">--}}
    </div>
</section>
{{--<script src="{{asset('admin/bower_components/chart.js/Chart.js')}}"></script>--}}

<script src="{{asset('admin/bower_components/fastclick/lib/fastclick.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const data = {
        // lấy theo năm
        labels: @json($years_statistic_name),
        datasets: [
            {
                label: "Số đơn được duyệt HK1",
                data: {{json_encode($first_acc)}},
                backgroundColor: "#0000FF",
                stack: "first",
            },
            {
                label: "Số đơn bị từ chối HK1",
                data: {{json_encode($first_de)}},
                backgroundColor: "#7393B3",
                stack: "first",
            },
            {
                label: "Số đơn được duyệt HK2",
                data: {{json_encode($sencound_acc)}},
                backgroundColor: "#444488",
                stack: "second",
            },
            {
                label: "Số đơn bị từ chối HK2",
                data: {{json_encode($sencound_de)}},
                backgroundColor: "#8888CC",
                stack: "second",
            },
            {
                label: "Số đơn được duyệt HK hè",
                data: {{json_encode($third_acc)}},
                backgroundColor: "#008000",
                stack: "third",
            },
            {
                label: "Số đơn bị từ chối HK hè",
                data: {{json_encode($third_de)}},
                backgroundColor: "#355E3B",
                stack: "third",
            },
        ],
    };

    const options = {
        type: "bar",
        data: data,
        options: {
            scales: {
                xAxes: [{
                    type: "category",
                    scaleLabel: {
                        display: true,
                        labelString: "Năm học",
                    },
                }],
                yAxes: [{
                    type: "linear",
                    scaleLabel: {
                        display: true,
                        labelString: "Số lượng",
                    },
                }],
            },
        },
    };

    const chart = new Chart(document.getElementById("myChart"), options);



</script>

@endsection




