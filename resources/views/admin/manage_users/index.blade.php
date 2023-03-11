@extends('layouts.app')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Users
        <small></small>
      </h1>
      <ol class="breadcrumb">
        {{-- <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li> --}}
      </ol>
    </section>
<div class="col-xs-12">
    <div class="box" style="height:1040px"">
      <div class="box-header">
        <h3 class="box-title"></h3>

        {{-- full function table --}}
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Data Table With Full Features</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Rendering engine</th>
                <th>Browser</th>
                <th>Platform(s)</th>
                <th>Engine version</th>
                <th>CSS grade</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td>Trident</td>
                <td>Internet
                  Explorer 4.0
                </td>
                <td>Win 95+</td>
                <td> 4</td>
                <td>X</td>
              </tr>
              <tr>
                <td>Trident</td>
                <td>Internet
                  Explorer 5.0
                </td>
                <td>Win 95+</td>
                <td>5</td>
                <td>C</td>
              </tr>
              <tr>
                <td>Trident</td>
                <td>Internet
                  Explorer 5.5
                </td>
                <td>Win 95+</td>
                <td>5.5</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Trident</td>
                <td>Internet
                  Explorer 6
                </td>
                <td>Win 98+</td>
                <td>6</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Trident</td>
                <td>Internet Explorer 7</td>
                <td>Win XP SP2+</td>
                <td>7</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Trident</td>
                <td>AOL browser (AOL desktop)</td>
                <td>Win XP</td>
                <td>6</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Gecko</td>
                <td>Firefox 1.0</td>
                <td>Win 98+ / OSX.2+</td>
                <td>1.7</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Gecko</td>
                <td>Firefox 1.5</td>
                <td>Win 98+ / OSX.2+</td>
                <td>1.8</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Gecko</td>
                <td>Firefox 2.0</td>
                <td>Win 98+ / OSX.2+</td>
                <td>1.8</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Gecko</td>
                <td>Firefox 3.0</td>
                <td>Win 2k+ / OSX.3+</td>
                <td>1.9</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Gecko</td>
                <td>Camino 1.0</td>
                <td>OSX.2+</td>
                <td>1.8</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Gecko</td>
                <td>Camino 1.5</td>
                <td>OSX.3+</td>
                <td>1.8</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Gecko</td>
                <td>Netscape 7.2</td>
                <td>Win 95+ / Mac OS 8.6-9.2</td>
                <td>1.7</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Gecko</td>
                <td>Netscape Browser 8</td>
                <td>Win 98SE+</td>
                <td>1.7</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Gecko</td>
                <td>Netscape Navigator 9</td>
                <td>Win 98+ / OSX.2+</td>
                <td>1.8</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Gecko</td>
                <td>Mozilla 1.0</td>
                <td>Win 95+ / OSX.1+</td>
                <td>1</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Gecko</td>
                <td>Mozilla 1.1</td>
                <td>Win 95+ / OSX.1+</td>
                <td>1.1</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Gecko</td>
                <td>Mozilla 1.2</td>
                <td>Win 95+ / OSX.1+</td>
                <td>1.2</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Gecko</td>
                <td>Mozilla 1.3</td>
                <td>Win 95+ / OSX.1+</td>
                <td>1.3</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Gecko</td>
                <td>Mozilla 1.4</td>
                <td>Win 95+ / OSX.1+</td>
                <td>1.4</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Gecko</td>
                <td>Mozilla 1.5</td>
                <td>Win 95+ / OSX.1+</td>
                <td>1.5</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Gecko</td>
                <td>Mozilla 1.6</td>
                <td>Win 95+ / OSX.1+</td>
                <td>1.6</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Gecko</td>
                <td>Mozilla 1.7</td>
                <td>Win 98+ / OSX.1+</td>
                <td>1.7</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Gecko</td>
                <td>Mozilla 1.8</td>
                <td>Win 98+ / OSX.1+</td>
                <td>1.8</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Gecko</td>
                <td>Seamonkey 1.1</td>
                <td>Win 98+ / OSX.2+</td>
                <td>1.8</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Gecko</td>
                <td>Epiphany 2.20</td>
                <td>Gnome</td>
                <td>1.8</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Webkit</td>
                <td>Safari 1.2</td>
                <td>OSX.3</td>
                <td>125.5</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Webkit</td>
                <td>Safari 1.3</td>
                <td>OSX.3</td>
                <td>312.8</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Webkit</td>
                <td>Safari 2.0</td>
                <td>OSX.4+</td>
                <td>419.3</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Webkit</td>
                <td>Safari 3.0</td>
                <td>OSX.4+</td>
                <td>522.1</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Webkit</td>
                <td>OmniWeb 5.5</td>
                <td>OSX.4+</td>
                <td>420</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Webkit</td>
                <td>iPod Touch / iPhone</td>
                <td>iPod</td>
                <td>420.1</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Webkit</td>
                <td>S60</td>
                <td>S60</td>
                <td>413</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Presto</td>
                <td>Opera 7.0</td>
                <td>Win 95+ / OSX.1+</td>
                <td>-</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Presto</td>
                <td>Opera 7.5</td>
                <td>Win 95+ / OSX.2+</td>
                <td>-</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Presto</td>
                <td>Opera 8.0</td>
                <td>Win 95+ / OSX.2+</td>
                <td>-</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Presto</td>
                <td>Opera 8.5</td>
                <td>Win 95+ / OSX.2+</td>
                <td>-</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Presto</td>
                <td>Opera 9.0</td>
                <td>Win 95+ / OSX.3+</td>
                <td>-</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Presto</td>
                <td>Opera 9.2</td>
                <td>Win 88+ / OSX.3+</td>
                <td>-</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Presto</td>
                <td>Opera 9.5</td>
                <td>Win 88+ / OSX.3+</td>
                <td>-</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Presto</td>
                <td>Opera for Wii</td>
                <td>Wii</td>
                <td>-</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Presto</td>
                <td>Nokia N800</td>
                <td>N800</td>
                <td>-</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Presto</td>
                <td>Nintendo DS browser</td>
                <td>Nintendo DS</td>
                <td>8.5</td>
                <td>C/A<sup>1</sup></td>
              </tr>
              <tr>
                <td>KHTML</td>
                <td>Konqureror 3.1</td>
                <td>KDE 3.1</td>
                <td>3.1</td>
                <td>C</td>
              </tr>
              <tr>
                <td>KHTML</td>
                <td>Konqureror 3.3</td>
                <td>KDE 3.3</td>
                <td>3.3</td>
                <td>A</td>
              </tr>
              <tr>
                <td>KHTML</td>
                <td>Konqureror 3.5</td>
                <td>KDE 3.5</td>
                <td>3.5</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Tasman</td>
                <td>Internet Explorer 4.5</td>
                <td>Mac OS 8-9</td>
                <td>-</td>
                <td>X</td>
              </tr>
              <tr>
                <td>Tasman</td>
                <td>Internet Explorer 5.1</td>
                <td>Mac OS 7.6-9</td>
                <td>1</td>
                <td>C</td>
              </tr>
              <tr>
                <td>Tasman</td>
                <td>Internet Explorer 5.2</td>
                <td>Mac OS 8-X</td>
                <td>1</td>
                <td>C</td>
              </tr>
              <tr>
                <td>Misc</td>
                <td>NetFront 3.1</td>
                <td>Embedded devices</td>
                <td>-</td>
                <td>C</td>
              </tr>
              <tr>
                <td>Misc</td>
                <td>NetFront 3.4</td>
                <td>Embedded devices</td>
                <td>-</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Misc</td>
                <td>Dillo 0.8</td>
                <td>Embedded devices</td>
                <td>-</td>
                <td>X</td>
              </tr>
              <tr>
                <td>Misc</td>
                <td>Links</td>
                <td>Text only</td>
                <td>-</td>
                <td>X</td>
              </tr>
              <tr>
                <td>Misc</td>
                <td>Lynx</td>
                <td>Text only</td>
                <td>-</td>
                <td>X</td>
              </tr>
              <tr>
                <td>Misc</td>
                <td>IE Mobile</td>
                <td>Windows Mobile 6</td>
                <td>-</td>
                <td>C</td>
              </tr>
              <tr>
                <td>Misc</td>
                <td>PSP browser</td>
                <td>PSP</td>
                <td>-</td>
                <td>C</td>
              </tr>
              <tr>
                <td>Other browsers</td>
                <td>All others</td>
                <td>-</td>
                <td>-</td>
                <td>U</td>
              </tr>
              </tbody>
              <tfoot>
              <tr>
                <th>Rendering engine</th>
                <th>Browser</th>
                <th>Platform(s)</th>
                <th>Engine version</th>
                <th>CSS grade</th>
              </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.box-body -->
        </div>

        <div class="box-tools">
          <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
            
            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

            <div class="input-group-btn">
              <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <tr>
            <th>#</th>
            <th>User Code</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th class="tabledit-toolbar-column" style="text-align: center;">Tools</th>
        </tr>
        @foreach($users as $u)
          <tr>
            <td>{{ $u->id}}</td>
            <td>{{ $u->user_code}}</td>
            <td>{{ $u->name}}</td>
            <td>{{ $u->email}}</td>
            <td>{{ $u->majors->name}}</td>
            <td class="tabledit-toolbar-column" style="text-align: center;">
              <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
              </svg></a> &nbsp &nbsp
              <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
              </svg></a>
            </td>
          </tr>
        @endforeach
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>

@endsection