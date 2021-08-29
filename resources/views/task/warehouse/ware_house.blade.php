@extends('layout.master')
@section('page')
<h1>
    Ware House
    <small>Page</small>
  </h1>
@endsection
@section('content')
<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
            <div class="col-sm-4">
                @if ($message = Session::get('msg'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif
            </div>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                  <th>Id</th>
                <th>Title</th>
                <th>Address</th>
                <th>Transport</th>
                <th>Action</th>

              </tr>
            </thead>
            <tbody>
                <?php
                    $i=1;?>
                @foreach ($ref as $key => $ref )

                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$ref['title']}}</td>
                        <td>{{$ref['address']}}</td>
                        <td>{{$ref['Transport']}}</td>
                        <td>
                        <a class="btn btn-primary" href="{{route('warehouse.edit',$ref['title'])}}"><i class="fa fa-edit" ></i></a>

                    </td>
               </tr>
               @endforeach
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->


@endsection
