@extends('layout.master')
@section('page')
<h1>
    Order Detail
    <small>Page</small>
  </h1>

@endsection
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
@section('content')
@if ($ref['status']==4)
<div class="container">
    <div class="row clearfix  badge badge-primary text-wrap"  style="width: 79vw;">
        <div class="col-lg-4 col-md-4 col-sm-4">
            @foreach ($ref[$orderNo] as $key => $reff)
            <div class="card product_item">
                <div class="card-header">
                     <h4 style="color: black">consignee</h4>
                 </div>
                <div class="body text-center" >
                          <h5  class="font-weight-bold">Id: {{$ref["consignee"]["key"]}}</h5>
                       <h5  class="font-weight-bold">Name: {{$ref["consignee"]["name"]}}</h5>
                       <h5  class="font-weight-bold">Phone.No: {{$ref["consignee"]["phoneNumber"]}}</h5>
                     </div>
            </div>
        </div>
        @endforeach
        <div class="col-lg-4 col-md-4 col-sm-4">
            @foreach ($ref[$orderNo] as $key => $reff)
            <div class="card product_item">
                <div class="card-header">
                     <h4 style="color: black">Logistic</h4><br>

                    </div>
                <div class="body text-center" >
                          <h5  class="font-weight-bold">Time Estimate: {{$ref["logistic"]["time_estimate"]}}</h5>
                       <h5  class="font-weight-bold">Title: {{$ref["logistic"]["title"]}}</h5>
                 </div>
            </div>
        </div>
        @endforeach
        <div class="col-lg-4 col-md-4 col-sm-4">
            @foreach ($ref[$orderNo] as $key => $reff)
            <div class="card product_item">
                <div class="card-header">
                     <h4 style="color: black">Ware House</h4><br>

                    </div>
                <div class="body text-center" >
                          <h5  class="font-weight-bold">Time Estimate: {{$ref["warehouse"]["Transport"]}}</h5>
                          <h5  class="font-weight-bold">Address: {{$ref["warehouse"]["address"]}}</h5>
                          <h5  class="font-weight-bold">Title: {{$ref["warehouse"]["title"]}}</h5>
                 </div>
            </div>
        </div>
        @endforeach
    </div>

</div>

@endif
<br>
<div class="container  badge badge-primary text-wrap"  style="width: 79vw;" >
    <div class="row clearfix" >
        @foreach ($ref[$orderNo] as $key => $reff)
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card product_item">
                <div class="body">
                    <div class="cp_img">
                        <img src={{$reff["image"]}} alt="Product" class="img-fluid">
                    </div>
                    <div class="product_details">
                        <h5  class="font-weight-bold text-center" style=" width: 22vw; white-space: pre-line;">Title: {{$reff["title"]}}</h5>
                        <h5  class="font-weight-bold">Original: ¥{{$reff["originalPrice"]}}</h5>
                        <h5  class="font-weight-bold">USD: ${{$reff["convertedPrice"]}}</h5>
                        <h5  class="font-weight-bold">Ordered: {{$reff["productQuantity"]}}</h5>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
</div>
@endsection
