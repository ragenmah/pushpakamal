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
     
   <?php $color= "red" ;?>
       
        <h4 class="ml-3"><span class="text-muted" style="background-color:{{ $color}};">Contact Details</span> </h4>
       <ul class="list-group list-group-flush">
            <li class="list-group-item"><i class="fas fa-phone-alt"></i>&nbsp Phone: {{$contact->phone}}</li>
            <li class="list-group-item"><i class="fa fa-address-book" aria-hidden="true"></i>&nbsp 
                Address: {{$contact->address}}</li>
            <li class="list-group-item"><i class="fas fa-envelope-square"></i>&nbsp Email:&nbsp{{$contact->email}}</li>
            <li class="list-group-item"><i class="fas fa-phone-alt"></i>&nbsp Viber:&nbsp {{$contact->viber}}</li>
            <li class="list-group-item"><i class="fab fa-facebook-f"></i>&nbsp Facebook:&nbsp <a href="{{$contact->facebook}}" target="_blank"> <i class="fab fa-lg fa-facebook-f"></i></a></li>
            <li class="list-group-item"><i class="fab fa-instagram"></i>&nbsp Instagram:&nbsp <a href="{{$contact->instagram}}" target="_blank"><i class="fab fa-lg fa-instagram"></i> </a></li>
            <li class="list-group-item"><i class="fab fa-youtube"></i>&nbsp Youtube:&nbsp <a href="{{$contact->youtube}}" target="_blank"><i class="fab fa-lg fa-youtube"></i> </a></li>

          </ul>
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


