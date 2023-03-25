@extends('layouts.app')
@section('content')

    <title>Unit Create</title>

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
            <h4 class="sub-title">NEW UNIT</h4>
            <div class=" box box-info">
                <div class="box-body">
                    <form action="{{route('units.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Name(<span style="color: red;">*</span>)</label>
                            <div class="col-sm-10">
                                <input required type="text" class="form-control" name="name" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">level(<span style="color: red;">*</span>)</label>
                            <div class="col-sm-10">
                                <input required name="level" type="text" class="form-control" style="font-weight: bold" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Head of unit</label>
                            <div class="col-sm-10">
                                <select name="head_of_unit_id" class="form-control">
                                            <option value="">None</option>
                                    @foreach ($users as $item)
                                            <option value="{{$item->id}}">{!!$item->name?? 'Trống' !!}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group pull-right">
                            <button type="submit" class="btn btn-success float-right btn-round">Create</button>
                            <button type="button" class="btn btn-info float-right btn-round" value="Go back!" onclick="location.href='/admin/units'">Return</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
