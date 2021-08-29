@extends('layout.master')
@section('page')
<h1>
    Recommendation
    <small>Page</small>
  </h1>
@endsection
@section('content')
<div class="row">
    <div class="col-sm-12">
      <div class="box">
        <div class="box-header">
            @if ($message = Session::get('msg'))
            <div class="alert alert-info alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif
            <div class="col-sm-8">

            </div>
            <div class="col-sm-4">
                @if ($message = Session::get('error'))
                <div class="alert alert-warning alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif
            <form role="form" class="form-inline"  action="{{route('recomendation.store')}}" method="post">
                @csrf
                <div class="form-group">
                  <label>Link</label>
                  <input type="text" name="link" class="form-control"/>
                </div>
                <button type="submit" class="btn btn-info">Submit</button>
           </form>
        </div>
        <div class="box-body">
          <table id="example2" class="table teble-bordered table-hover">
            <thead>
                <tr>
                    <th>Link</th>
                 </tr>
            </thead>
            <tbody>

             @foreach ($ref as $doct)
               <tr>
                   <td>{{$doct["link"]}}</td>
               </tr>
             @endforeach
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div>
</div>

@endsection
