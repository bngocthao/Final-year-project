<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đơn xin vắng</title>
    <!-- Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- CSS -->
    <link href="{{asset("client/application/main.css")}}" rel="stylesheet" media="all">
</head>
<body>
<div class="card container">
    <form class="row g-3" action="{{route('update_mark', $app, $app->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-header">
            <p>Đơn Xin Hoãn Thi</p>
        </div>

        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Họ tên sinh viên</label>
            <input type="text" class="form-control" value="{{$app->users->name}}" disabled>
        </div>
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Họ tên giảng viên</label>
            <input type="text" class="form-control" value="{{$app->teach->name}}" disabled>
        </div>
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Tên học phần</label>
            <input type="text" class="form-control" value="{{strip_tags($sub)}}" disabled>
        </div>
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Nhóm</label>
            <input type="text" class="form-control" value="{{$app->group}}" disabled>
        </div>
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Học kỳ</label>
            <input type="text" class="form-control" value="{{$app->semesters->name}}" disabled>
        </div>
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Năm học</label>
            <input type="text" class="form-control" value="{{$app->years->name}}" disabled>
        </div>
        <input hidden name="id" value="{{$app->id}}">
        <div class="col-12">
            <label for="inputAddress" class="form-label">Lý do</label>
            <input type="text" class="form-control" value="{{ strip_tags($app->reason)}}" disabled>
        </div>
        {{--        <div class="col-3">--}}
        {{--            <div class="name">Lý do (bổ sung)</div>--}}
        {{--            <div class="value">--}}
        {{--                    <input type="text" hidden="" id="file_link" value="{{asset($app->proof)}}">--}}

        {{--                    <input class="input--style-5" type="file" id="proof" name="proof" value="{{asset($app->proof)}}" disabled="disabled" />--}}
        {{--            </div>--}}
        {{--        </div>--}}
        <div class="col-md-3">
            <label for="inputPassword4" class="form-label">Quyết định của giảng viên</label>
            <input type="text" class="form-control"
                   value="@if($app->teach_status == '1') Chấp nhận @elseif($app->teach_status == '0') Không chấp nhận @else Đang chờ... @endif"
                   disabled>
        </div>
        <div class="col-md-9">
            <label for="inputPassword4" class="form-label">Lý do</label>
            <input type="text" class="form-control" value="{{strip_tags($app->teach_description)}}" disabled>
        </div>
        <div class="col-md-3">
            <label for="inputPassword4" class="form-label">Quyết định của lãnh đạo khoa</label>
            <input type="text" class="form-control"
                   value="@if($app->dean_status == '1') Chấp nhận @elseif($app->dean_status == '0') Không chấp nhận @else Đang chờ... @endif" disabled>
        </div>
        <div class="col-md-9">
            <label for="inputPassword4" class="form-label">Lý do</label>
            <input type="text" class="form-control" value="{{strip_tags($app->dean_description)}}" disabled>
        </div>
        <div class="col-md-3">
            <label for="inputPassword4" class="form-label">Quyết định của ban giám hiệu</label>
            <input type="text" class="form-control"
                   value="@if($app->headmaster_status == '1') Chấp nhận @elseif($app->headmaster_status == '0') Không chấp nhận @else Đang chờ... @endif"                   disabled>
        </div>
        <div class="col-md-9">
            <label for="inputPassword4" class="form-label">Lý do</label>
            <input type="text" class="form-control" value="{{strip_tags($app->headmaster_description)}}" disabled>
        </div>
        @can('isHeadmaster')
            <input name="headmaster_acceptance" value="1" hidden>
        @endcan
        <div class="col-12">
            <label for="inputAddress2" class="form-label">Kết quả</label>
            <input type="text" class="form-control"
                   value="@if($app->result == '1') Chấp nhận @elseif($app->result == '0') Không chấp nhận @else Đang chờ... @endif"
                   disabled>
        </div>
{{--        @if($app->mark != null)--}}
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Điểm điều chỉnh</label>
                <input type="text" class="form-control" name="mark"
                       value="{{$app->mark}}"
                    @cannot('isProfessor') disabled @endcannot>
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Lý do</label>
                <input type="text" class="form-control" name="mark_reason" value="Đã nhập điểm I ở HK: {{$app->semesters->name}}, NH: {{$app->years->name}}" @cannot('isProfessor') disabled @endcannot>
            </div>
{{--        @endif--}}
        <div class="form-group pull-right" style="text-align: right;">
            <a href="/admin/postponse_apps" type="button" class="btn btn-primary float-right btn-round">Trở về</a>
            @cannot('isHeadmaster')
                <button type="submit" class="btn btn-success float-right btn-round">Cập nhật</button>

            @endcannot
            @can('isHeadmaster')
                <button type="submit" class="btn btn-success float-right btn-round">Chấp nhận</button>
            @endcan

        </div>
    </form>
    <br>
</div>
</body>
<!-- Boostrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
