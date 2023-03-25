@extends('layouts.app')
@section('content')

    <title>Unit Edit</title>

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
            <h4 class="sub-title">EDIT UNIT</h4>
            <div class=" box box-info">
                <div class="box-body">
                    <form action="{{route('units.update', $unit)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <textarea id="editor" required type="text" class="form-control" name="name" value="{{$unit->name}}">{{$unit->name}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Level</label>
                            <div class="col-sm-10">
                                <input required name="level" type="text" class="form-control" style="font-weight: bold" value="{{$unit->level}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Head of unit</label>
                            <div class="col-sm-10">
                                <select name="head_of_unit_id" class="form-control">
                                            <option value="">None</option>
                                    @foreach ($users as $item)
                                            <option value="{{$item->id}}" @if($item->id == $unit->head_of_unit_id) selected @endif>{!!$item->name?? 'None' !!}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group pull-right">
                            <button type="submit" class="btn btn-success float-right btn-round">Update</button>
                            <button type="button" class="btn btn-info float-right btn-round" value="Go back!" onclick="location.href='/admin/units'">Return</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
