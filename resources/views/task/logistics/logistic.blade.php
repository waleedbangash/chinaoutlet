@extends('layout.master')
@section('page')
<h1>
    Logistic
    <small>Page</small>
  </h1>
@endsection
@section('content')
<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">

        </div><!-- /.box-header -->
        <div class="box-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Title</th>
                <th>Estimate</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($ref as $key => $refrence)

              <tr>
                    <td>{{$refrence["title"]}}</td>
                    <td>{{$refrence["time_estimate"]}}</td>
                    <td>
                        {{-- <a class="btn btn-success" href="#"><i class="fa fa-eye"></i></a> --}}
                        <a class="btn btn-primary" href="{{url('edit_logistic',$refrence["title"])}}"><i class="fa fa-edit" ></i></a>
                    </td>

               </tr>
               @endforeach
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->


@endsection
