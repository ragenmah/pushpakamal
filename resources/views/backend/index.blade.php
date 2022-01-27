@extends('backend.layouts.app')
<!-- Add ChartJs -->        
<script src="{{ asset('js/dist/chart.min.js')}}"></script>
@section('title') @lang("Dashboard") @endsection

@section('breadcrumbs')
<x-backend-breadcrumbs/>
@endsection

@section('content')

<!-- / card -->

<div class="row">
    <div class="col-sm-6 col-lg-4">
        <div class="card text-white bg-gradient-primary">
            <div class="card-body">
                <div class="text-value-lg">Total no. of Properties</div>
               
                <div class="progress progress-white progress-xs my-2">
                    <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="{{$total_prop}}" aria-valuemin="0" aria-valuemax="{{$total_prop}}"></div>
                </div>
                <div class="text-center">{{$total_prop}}</div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-4">
        <div class="card text-white bg-gradient-warning">
            <div class="card-body">
                <div class="text-value-lg">Total no. of Sales</div>
                
                <div class="progress progress-white progress-xs my-2">
                    <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="text-center">{{$total_sales}}</div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-4">
        <div class="card text-white bg-gradient-danger">
            <div class="card-body">
                <div class="text-value-lg">Total no. of Active Properties</div>
                
                <div class="progress progress-white progress-xs my-2">
                    <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="text-center">{{$total_active}}</div>
            </div>
        </div>
    </div>

  

</div>


<div class="row">

<div class="card col-md-6">
<p class="card-title">  </p>

   <div class="card-body ">

<canvas id="mychart" > </canvas>

</div>
</div>

<div class="card col-md-6">
 <p class="card-title">  </p>
<div class="card-body">
<canvas id="mychart2" > </canvas>


</div>

</div>

</div>


<div class="row">

<div class="card col-md-12 ">
 <p class="card-title">  </p>
<div class="card-body ">
 
  <canvas id="mychart3"></canvas>
</div>
</div>

</div>

@include('backend.script')
@endsection
