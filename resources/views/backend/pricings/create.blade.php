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
                
                <form action="{{route("backend.$module_name.store")}}" method="post" >
                    @csrf


                    <div class="form-group">
                        <div class="col-md-6">
                        <label for="listing_type">Listing Type<span class="text-danger">( * ) </span> </label>
                        <input type="text" name="listing_type" class="form-control"  value="{{old('listing_type')}}" > 
                        </div>
                        <div class="col-md-6">
                            @error('listing_type')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                            @enderror
                           </div>
    
                        </div>
    

                    <div class="form-group">
                    <div class="col-md-6">
                   <label for="price">Price<span class="text-danger">( * ) </span></label>
                    <input type="text" name="price" class="form-control" value="{{old('price')}}" > 
                    </div>
                    <div class="col-md-6">
                        @error('price')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                       </div>

                    </div>

                    <div class="form-group">
                        <div class="col-md-6">
                       <label for="title_color">Choose Title Color<span class="text-danger">( * ) </span></label>
                        <input type="color" name="title_color"  value="#ff0000" > 
                        </div>
                        <div class="col-md-6">
                            @error('title_color')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                            @enderror
                           </div>
    
                        </div>

                    <div class="form-group">
                        <div class="col-md-6">
                       <label for="image_details">Image Details<span class="text-danger">( * ) </span> </label>
                        <input type="text" name="image_details" class="form-control"  value="{{old('image_details')}}" > 
                        </div>
                        <div class="col-md-6">
                            @error('image_details')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                            @enderror
                           </div>
    
                        </div>


  
                            <div class="form-group">
                                <div class="col-md-6">
                               <label for="property_details">Property Details<span class="text-danger">( * ) </span></label>
                                <input type="text" name="property_details" class="form-control" value="{{old('property_details')}}" > 
                                </div>
                                <div class="col-md-6">
                                    @error('property_details')
                                    <div class="alert alert-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                   </div>
            
                                </div>

                    <div class="form-group">
                        <div class="col-md-6">
                       <label for="time_span">Time Span <span class="text-danger">( * ) </span></label>
                        <input type="text" name="time_span" class="form-control" placeholder="suitable for 8 months" value="{{old('time_span')}}" > 
                        </div>
                        <div class="col-md-6">
                            @error('time_span')
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



