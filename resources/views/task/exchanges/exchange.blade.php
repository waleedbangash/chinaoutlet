@extends('layout.master')
@section('page')
<h1>
    Exchange
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
        </div>
        <div class="box-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Yuan</th>
                    <th>USD</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($ref as $key => $ref)


              <tr>
                   <td>{{$ref['yuan']}}</td>
                    <td>{{$ref['usd']}}</td>
                     <td>
                       <a class="btn btn-primary" href="{{url('edit')}}"><i class="fa fa-edit" ></i></a>
                      </td>
                </tr>
               @endforeach
            </tbody>

          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->


@endsection
