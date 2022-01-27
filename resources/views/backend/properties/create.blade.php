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

        <div class="row mt-4">
            <div class="col">
                
                <form action="{{route("backend.properties.store")}}" method="post">
                    @csrf

                    <div class="form-group">
                        <div class="col-md-6">
                       <label for="property_type">Property Type </label>
                       <select name="property_type" class="form-control">
                       <option value="">Select Property Type </option>
                       <option value="Commercial">Commercial </option>
                       <option value="Residental">Residental </option>
                       </select>

                        </div>
                        <div class="col-md-6">
                            @error('property_type')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                            @enderror
                           </div>
    
                        </div>

                                <div class="form-group">
                                <div class="col-md-6">
                                <label for="accomodation_status">Accomodation Status </label>
                                <select name="accomodation_status" id="accomodation_status" class="form-control"> 
                                <option value="">Select Accomodation Status </option>
                                 <option value="yes">yes </option>
                                 <option value="no">no</option>

                                </select>

                                   </div>
                                   <div class="col-md-6">
                                    @error('accomodation_status')
                                    <div class="alert alert-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                   </div>
                                   </div>
                         
                                     
                    <div class="form-group">
                        <div class="col-md-6">
                    <button type="submit" class="btn btn-success">Save </button>
                        </div>
                    </div>
                      </form>
            </div>
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


