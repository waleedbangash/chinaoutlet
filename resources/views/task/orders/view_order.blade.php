@extends('layout.master')
@section('page')
<h1>
    Order
    <small>Page</small>
  </h1>
@endsection

@section('content')

<div class="row" >
      <div class="modal fade" id="myModal" id="EditUser" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Change Status</h4>
        </div>
        <div class="modal-body">
            <form action="{{route('status_update')}}" id="profileForm" method="post">
               @csrf
          <select name="status" id="">
            <option value="-1">Select Status</option>
            <option value="1"> 1 - Payment Pending</option>
            <option value="2">2 - WareHouse Pending</option>
             <option value="3">3 - My WareHouse</option>
            <option value="4">4 - Delivered Reviews</option>
          </select>
          <input type="text" name="key" id="key" value=""/>
          <input type="text" name="uid" id="uid" value=""/>
          <div class="modal-footer">
            <input type="submit" class="btn btn-default" value="submit">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </form>
    </div>
      </div>

    </div>
  </div>
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
            @if ($message = Session::get('msg'))
            <div class="alert alert-info alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif
            @if ($message = Session::get('error'))
            <div class="alert alert-error alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif

            <div class="col-sm-4 col-sm-offset-8">
                <div class="form-group">
                    <input id="myInput" type="text" class="form-control" placeholder="Search..">
                </div>
             </div>

        </div><!-- /.box-header -->
        <div class="box-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Order_id</th>
                    <th>No.Of Products</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($ref as $key => $reff )

              <tr>
                    <td>{{$key}}</td>
                    <td>{{count($reff[$key])}}</td>
                    <td id="key">

                         @if($reff['status'] == 1)

                            {{$reff['status']}} - Payment Pending

                        @elseif($reff['status'] == 2)
                        {{$reff['status']}} - Warehouse Pending

                        @elseif($reff['status'] == 3)

                        {{$reff['status']}} - My Warehouse

                        @elseif($reff['status'] == 4)

                            {{$reff['status']}} - Delivered Reviews
                           @endif

                    <button onclick="setKey({{$key}},'{{$uid}}')" id="submit"  data-toggle="modal" data-target="#myModal">Edit</a></td>
                    <td>

                        <a class="btn btn-success" href="{{url('showdetail',[$key,$uid])}}"><i class="fa fa-eye"></i></a>


                    </td>

               </tr>
               @endforeach
            </tbody>

          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
      <script type="text/javascript">
        $("#submit").click(function () {});

        function setKey(key,uid){
            $(".modal-body #key").val(key);
            $(".modal-body #uid").val(uid);

        }
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
{{-- search bar scriptt --}}
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
