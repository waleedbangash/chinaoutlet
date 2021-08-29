@extends('layout.master')
@section('page')
<h1>
    Edit Exchange
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
            <h3 class="box-title">Exchanges</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <form role="form" action="{{route('exchange.update')}}" method="post">
              @csrf
                @foreach ($ref as $key => $value )
                <div class="form-group">
                    <label>Yuan</label>
              <input type="text" name="yuan" value="{{$value['yuan']}}"  class="form-control"  />
              </div>
              <div class="form-group">
                <label>USD</label>
                <input type="text" name="usd" class="form-control"  value="{{$value['usd']}}" placeholder=""/>
              </div>
              @endforeach
              <input type="submit" value="submit">
             </form>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!--/.col (right) -->
    </div>
</div>
@endsection
