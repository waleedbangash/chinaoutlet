@extends('layout.master')
@section('page')
<h1>
    Edit User
    <small>Page</small>
  </h1>
@endsection
@section('content')
<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-md-9">
        <!-- general form elements disabled -->
        <div class="box box-warning">
          <div class="box-header">
            <h3 class="box-title">User Details</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <form role="form" action="{{route('users.update',$uid)}}" method="post">
              @csrf
              <div class="form-group">
                <label>Wallet</label>
                <input type="text" value={{$ref['wallet']}} class="form-control"name="wallet"/>
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" value="{{$ref['email']}}" class="form-control"name="email" disabled/>
              </div>
              <div class="form-group">
                <label>Name</label>
                <input type="text" value="{{$ref['name']}}" class="form-control"name="name" disabled/>
              </div>
              <div class="form-group">
                <label>Number</label>
                <input type="text" value="{{$ref['number']}}" class="form-control"name="number" disabled/>
                <input type="text" value="{{$uid}}"  name="uid" hidden>
              </div>

              <input type="submit" value="submit">
             </form>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!--/.col (right) -->
    </div>
</div>
@endsection
