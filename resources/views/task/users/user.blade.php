@extends('layout.master')
@section('page')
<h1>
    User
    <small>Page</small>
  </h1>
@endsection
@section('content')
<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
            @if ($message = Session::get('msg'))
            <div class="alert alert-warning alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif

                <div class="col-sm-4 ">
                    <div class="form-group">
                        <input id="myInput" type="text" class="form-control" placeholder="Search..">
                    </div>
                 </div>


        </div><!-- /.box-header -->
        <div class="box-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Email</th>
                <th>Name</th>
                <th>Number</th>
                 <th>View_Order</th>
                <th>Wallet</th>
                <th>Action</th>

              </tr>
            </thead>
            <tbody>
                @foreach ($ref as $key => $ref)
                <tr>
                    <td>{{$ref['email']}}</td>
                    <td>{{$ref['name']}}</td>
                    <td>{{$ref['number']}}</td>
                    {{-- <td>{{$ref['uid']}}</td> --}}
                    <td><a href="{{url('view_order',$ref['uid'])}}">view</a></td>
                    <td>{{$ref['wallet']}}</td>
                    <td>
                    <a class="btn btn-primary" href="{{route('users.edit',$ref['uid'])}}"><i class="fa fa-edit" ></i></a>
                    </td>
               </tr>
               @endforeach
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->

      <script>
        $(document).ready(function(){
          $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#example2 tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });
        </script>
@endsection
