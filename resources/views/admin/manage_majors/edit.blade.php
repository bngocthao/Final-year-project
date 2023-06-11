@extends('layouts.app')
@section('content')

    <title>Chỉnh sửa chuyên ngành</title>

    <!-- Content Wrapper. Contains page content -->


    <style>
        .image-cropper {
            width: 200px;
            height: 200px;
            position: relative;
            overflow: hidden;
            border-radius: 50%;
        }
        .card {
            margin: auto;
            width: 100%;
            border: 3px;
            padding: 10px;
        }
    </style>

        <div class="col-sm-12">
            <!-- Basic Form Inputs card start -->
            <div class="card">
                <div class="card-header">
                    <div class="card-header-right">
                        <i class="icofont icofont-spinner-alt-5"></i>
                    </div>
                </div>
                <h4 class="sub-title">CẬP NHẬT CHUYÊN NGÀNH</h4>
                <div class=" box box-info">
                    <div class="box-body">
                        <form action="{{route('majors.update', $major)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            {{-- <input hidden name="ma_nguoi_dung" > --}}
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Mã chuyên ngành</label>
                                <div class="col-sm-10">
                                    <input required name="major_code" type="text" class="form-control" style="font-weight: bold" value="{{$major->id}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tên chuyên ngành</label>
                                <div class="col-sm-10">
                                    <textarea id="editor" required type="text" class="form-control" name="name" value="{{$major->name}}">{{$major->name}}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Thuộc đơn vị</label>
                                <div class="col-sm-10">
                                    <select name="unit_id" class="form-control">
                                        {{-- <option value="9999">Trống</option> --}}
                                        @foreach ($units as $item)
                                            @if ($item->level != '0')
                                                <option value="{{$item->id}}">{!! $item->name?? 'Trống' !!}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Học phần</label>
                                <div class="col-sm-10">
                                    <select class="form-control select2 select2-hidden-accessible"
                                            name = 'subject_id[]'
                                            multiple="" data-placeholder="Select Subjects"
                                            style="width: 100%;"
                                            data-select2-id="7"
                                            tabindex="-1"
                                            aria-hidden="true">
                                        @foreach($full_subject as $v )
                                                <option value="{{$v->id}}"
                                                    {{--Nếu mà id của môn có tồn tại trong ngành r ->select, k thì hiển th bình thường--}}
                                                    @foreach($subject_ids_list as $key => $value)
                                                        @if($v->id == $value) selected @endif
                                                    @endforeach >{!! $v->name !!}
                                                </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group pull-right">
                                <button type="submit" class="btn btn-success float-right btn-round">Cập nhật</button>
                                <button type="button" class="btn btn-info float-right btn-round" value="Go back!" onclick="location.href='/admin/majors'">Quay về</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


@endsection
