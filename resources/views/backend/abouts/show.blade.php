@extends('backend.layouts.app')


@section('title') {{ __($module_action) }} {{ $module_title }} @endsection

@section('breadcrumbs')
    <x-backend-breadcrumbs>
        <x-backend-breadcrumb-item route='{{ route("backend.$module_name.index") }}' icon='{{ $module_icon }}'>
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
                        <i class="{{ $module_icon }}"></i> {{ $module_title }} <small
                            class="text-muted">{{ __($module_action) }}</small>
                    </h4>
                    <div class="small text-muted">
                        @lang(":module_name Management Dashboard", ['module_name'=>Str::title($module_name)])
                    </div>
                </div>
                <!--/.col-->
                <div class="col-4">
                    <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                        <a href="{{ route("backend.$module_name.index") }}" class="btn btn-secondary btn-sm ml-1"
                            data-toggle="tooltip" title="{{ $module_title }} List"><i class="fas fa-list-ul"></i>
                            List</a>
                    </div>
                </div>
                <!--/.col-->
            </div>
            <!--/.row-->

            
            
            <hr>
           <div class="row">
               <div class="col-md-6">
                <h4 class="card-title">{{$about->title}}</h4>
                <p class="card-text pt-4"> {{$about->details}} </p>
               </div>

              <div class="col-md-6">
            <a href="{{ asset('/uploads/about/' . $about->image) }}" target="_blank"> <img class="card-img-top pb-3"
                    src="{{ asset('uploads/about/' . $about->image) }}" style="height: 300px; width:400px"
                    alt="Card image cap"></a>
           
              </div>
           </div>
                   
            <hr>
                <div class="row">
                <a href="{{ route("backend.$module_name.index") }}" class="btn btn-warning" data-toggle="tooltip"
                    title="{{ __('labels.backend.cancel') }}"><i class="fas fa-reply"></i> Go Back</a>
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


