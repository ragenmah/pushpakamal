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
                        <label for="phone">Phone<span class="text-danger">( * ) </span> </label>
                        <input type="text" name="phone" class="form-control"  value="{{old('phone')}}" > 
                        </div>
                        <div class="col-md-6">
                            @error('phone')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                            @enderror
                           </div>
    
                        </div>
    

                    <div class="form-group">
                    <div class="col-md-6">
                   <label for="address">Address<span class="text-danger">( * ) </span></label>
                    <input type="text" name="address" class="form-control" value="{{old('address')}}" > 
                    </div>
                    <div class="col-md-6">
                        @error('address')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                       </div>

                    </div>

                    <div class="form-group">
                        <div class="col-md-6">
                       <label for="email">Email <span class="text-danger">( * ) </span></label>
                        <input type="text" name="email" class="form-control" value="{{old('email')}}" > 
                        </div>
                        <div class="col-md-6">
                            @error('email')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                            @enderror
                           </div>
    
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                           <label for="facebook">Facebook Url </label>
                            <input type="text" name="facebook" class="form-control" placeholder="https://www.facebook.com/pagename" value="{{old('facebook')}}" > 
                            </div>
                            <div class="col-md-6">
                                @error('facebook')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @enderror
                               </div>
        
                            </div>


      
                                <div class="form-group">
                                    <div class="col-md-6">
                                   <label for="viber">Viber ID </label>
                                    <input type="text" name="viber" class="form-control" placeholder="+977-9841123456" value="{{old('viber')}}" > 
                                    </div>
                                    <div class="col-md-6">
                                        @error('viber')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                       </div>
                
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6">
                                       <label for="instagram">Instagram Url</label>
                                        <input type="text" name="instagram" class="form-control" placeholder="https://www.instagram.com/pushpakamal/" value="{{old('instagram')}}" > 
                                        </div>
                                        <div class="col-md-6">
                                            @error('instagram')
                                            <div class="alert alert-danger">
                                                {{$message}}
                                            </div>
                                            @enderror
                                           </div>
                    
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-6">
                                           <label for="youtube">Youtube link </label>
                                            <input type="text" name="youtube" class="form-control" placeholder="https://www.youtube.com/channel/characters" value="{{old('youtube')}}" > 
                                            </div>
                                            <div class="col-md-6">
                                                @error('youtube')
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



