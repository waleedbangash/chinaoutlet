@extends('layout.master')
@section('page')
<h1>
   Dashboard
    <small>Page</small>
  </h1>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">

        <div class="inner">
          <h3>{{$orders}}</h3>
          <h4>Orders</h4>
        </div>
          <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="{{route('dashboard.detail')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green" style="height:125px;">
        <div class="inner">
          <h3>{{$users}}</h3>
          <h4 >Users Registrations</h4>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>

      </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow" style="height:125px;">
        <div class="inner">
            <div class="row">
                @foreach ($ref as $key =>$ref)


                <div class="col-sm-4">
                    <h3>¥ {{$ref['yuan']}} </h3>

                </div>

                <div class="col-sm-4  col-md-offset-2" class=>
                    <h3 class="p-3 ">$ {{$ref['usd']}}</h3>

                </div>
                @endforeach
            </div>
            <h4>Exchange</h4>
        </div>
        <div class="icon">

        </div>

      </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      {{-- <div class="small-box bg-red">
        <div class="inner">
          <h3>65</h3>
          <p>Unique Visitors</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div> --}}
    </div><!-- ./col -->
  </div><!-- /.row -->
@endsection
