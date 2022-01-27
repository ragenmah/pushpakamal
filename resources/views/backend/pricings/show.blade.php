@extends('backend.layouts.app')
   

@section('title') {{ __($module_action) }} {{ $module_title }} @endsection

@section('breadcrumbs')
<x-backend-breadcrumbs>
    <x-backend-breadcrumb-item route='{{route("backend.$module_name.index")}}' icon='{{ $module_icon }}' >
        {{ $module_title }}
    </x-backend-breadcrumb-item>
    <x-backend-breadcrumb-item type="active">{{ __($module_action) }}</x-backend-breadcrumb-item>
</x-backend-breadcrumbs>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-8">
                <h4 class="card-title mb-0">
                    <i class="{{ $module_icon }}"></i> {{ $module_title }} <small class="text-muted">{{ __($module_action) }}</small>
                </h4>
                <div class="small text-muted">
                    @lang(":module_name Management Dashboard", ['module_name'=>Str::title($module_name)])
                </div>
            </div>
            <!--/.col-->
            <div class="col-4">
                <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                    <a href="{{ route("backend.$module_name.index") }}" class="btn btn-secondary btn-sm ml-1" data-toggle="tooltip" title="{{ $module_title }} List"><i class="fas fa-list-ul"></i> List</a>
                </div>
            </div>
            <!--/.col-->
        </div>
        <!--/.row-->
   <hr>
     
       
        <h4 class="ml-3"><span class="text-muted" >Pricing</span> </h4>

        <div class="row">
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
       <ul class="list-group list-group-flush">
            <li class="list-group-item" style="background:{{ $pricing->title_color}};"><span style="color:white;"><h4> {{$pricing->listing_type}} </h4></span></li>
            <li class="list-group-item" style="background:{{ $pricing->title_color}};"><span style="color:white;"><h4>{{$pricing->price}}</h4></span></li>
            <li class="list-group-item">  {{$pricing->image_details}}</li>
            <li class="list-group-item">{{$pricing->property_details}}</li>
          
            <li class="list-group-item">{{$pricing->time_span}}  </li>
           

          </ul>
                </div>
        </div>
        </div>
          <hr>
         
       
        <div class="row">
            <a href="{{ route("backend.$module_name.index") }}" class="btn btn-warning" data-toggle="tooltip" title="{{__('labels.backend.cancel')}}"><i class="fas fa-reply"></i> Go Back</a>
        </div>

    </div>
    

    <div class="card-footer">
        <div class="row">
            <div class="col">
               

            </div>
        </div>
    </div>
</div>
@stop


