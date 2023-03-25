@extends('layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->

    <title>Unit Index</title>


    <div class="box" style="align-items: stretch">
        <div class="box-header">
            {{-- <h3 class="box-title">User List</h3> --}}
            <p class="pull-left">
                <a href="{{route('units.create')}}" style="margin-left: 50px" class="btn btn-success waves-effect waves-light form-control pull-right" style="float: none;margin: 5px;">
                    New Unit</a>
            </p>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th style="width:10px; !important">#</th>
                    <th>Name</th>
                    <th>Level</th>
                    <th>Head of unit</th>
                    <th class="tabledit-toolbar-column" style="text-align: center;">Tools</th>
                </tr>
                </thead>
                <tbody>

                @foreach($units as $u)
                    <tr>
                        <td style="width:10px;">{{ $u['id']}}</td>
                        <td>{!! $u['name'] !!}</td>
                        <td>{{ $u['level']}}</td>
                        <td>{{ $u['username'] ?? "None"}}</td>
                        <td class="tabledit-toolbar-column" style="text-align: center;">
                            <a href="{{route('units.edit', $u['id'])}}">
                                <form action="{{ route('units.edit',  $u['id'])}}" class="tabledit-edit-button btn btn primary waves-effect waves-light">
                                    @csrf
                                    @method('GET')
                                    <button class="btn btn-primary btn" type="submit" id="del-confirm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                        </svg>
                                    </button>
                                </form></a>
                            <a href="{{route("units.destroy",$u['id'])}}"  onclick="return confirm('Are you sure you want to delete?')">
                                <form action="{{route("units.destroy",$u['id'])}}" method="post" class="tabledit-edit-button btn btn primary waves-effect waves-light float-left">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn" type="submit" onclick="delete_confirm()">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/></svg>
                                    </button>
                                </form>
                            </a>
                        </td>
                    </tr>
                @endforeach


                </tbody>
                <tfoot>
                <tr>
                    {{-- <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th> --}}
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
    </div>


    <!-- Edit With Button card end -->
    <!-- Editable-table js -->
    {{-- <script type="text/javascript" src={{asset("admin/files\assets\pages/edit-table\jquery.tabledit.js")}}></script>
    <script type="text/javascript" src={{asset("admin/files\assets\pages/edit-table/editable.js")}}></script> --}}

    {{-- sweet alert Thông báo khi xóa bản ghi --}}
    <script type="text/javascript">

        $('.delete-confirm').on('click', function (e) {
            e.preventDefault();
            const url = $(this).attr('href');
            swal.fire({
                title: 'Are you sure?',
                text: 'This record and it`s details will be permanantly deleted!',
                icon: 'warning',
                buttons: ["Cancel", "Yes!"],
            }).then(function(value) {
                if (value) {
                    window.location.href = url;
                }
            });
        });
    </script>

    <link href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
@endsection
