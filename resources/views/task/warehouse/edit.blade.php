@extends('layout.master')
@section('page')
<h1>
    Edit Ware House
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
            <h3 class="box-title">Ware House</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <form role="form" action="{{route('warehouse.update')}}" method="post">
              @csrf

              <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control"  value="{{$ref['address']}}" name="address" placeholder="" />
              </div>
              <div class="form-group">
                <label>Transport</label>
                <input type="text" class="form-control"  value="{{$ref['Transport']}}" name="Transport" placeholder="" />
              </div>
              <div class="form-group">
                <label>Title</label>
                <input type="text" value="{{$ref['title']}}" class="form-control"name="title" disabled/>
              </div>
              <input type="submit" value="submit">
             </form>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!--/.col (right) -->
    </div>
</div>
@endsection
