@extends('layouts.app')
@section('content')

<title>Major Create</title>

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
        <h4 class="sub-title">NEW MAJOR</h4>
        <div class=" box box-info">
            <div class="box-body">
                <form action="{{route('majors.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    {{-- <input hidden name="ma_nguoi_dung" > --}}
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Major code(<span style="color: red;">*</span>)</label>
                        <div class="col-sm-10">
                            <input required name="major_code" type="text" class="form-control" style="font-weight: bold" value="5{{$major_code}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Name(<span style="color: red;">*</span>)</label>
                        <div class="col-sm-10">
                            <input required type="text"  class="form-control" name="name" >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Belong to unit(<span style="color: red;">*</span>)</label>
                        <div class="col-sm-10">
                        <select name="unit_id" class="form-control">
                            @foreach ($units as $item)
                                @if ($item->level != '0')
                                    <option value="{{$item->id}}">{!!$item->name?? 'Trống' !!}</option>
                                @endif
                            @endforeach
                        </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Subject</label>
                        <div class="col-sm-10">
                            <select class="form-control select2 select2-hidden-accessible"
                                    name = 'subject_id[]'
                                    multiple="" data-placeholder="Select Subjects"
                                    style="width: 100%;"
                                    data-select2-id="7"
                                    tabindex="-1"
                                    aria-hidden="true">
                                @foreach ($subjects as $value )
                                    <option value="{{$value->id}}">{!! $value->name !!}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group pull-right">
                        <button type="submit" class="btn btn-success float-right btn-round">Create</button>
                        <button type="button" class="btn btn-info float-right btn-round" value="Go back!" onclick="location.href='/admin/majors'">Return</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
