@extends('layout.master')
@section('page')
<h1>
    Edit Logistics
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
            <h3 class="box-title">Logistics</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <form role="form" action="{{route('logistic.update',$key)}}" method="post">
              @csrf
              <div class="form-group">
                <label>Time Estimate</label>
                <input type="text" value="{{$snap['time_estimate']}}" class="form-control"name="time_estimate"/>
              </div>
              <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control"  value="{{$snap['title']}}" name="title" placeholder="" disabled/>
              </div>
              <input type="submit" value="submit">
             </form>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!--/.col (right) -->
    </div>
</div>
@endsection
