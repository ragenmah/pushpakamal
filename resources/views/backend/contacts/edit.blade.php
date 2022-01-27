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
                    <i class="{{ $module_icon }}"></i>  {{ $module_title }} <small class="text-muted">{{ __($module_action) }}</small>
                </h4>
                <div class="small text-muted">
                    @lang(":module_name Management Dashboard", ['module_name'=>Str::title($module_name)])
                </div>
            </div>
            <!--/.col-->
            <div class="col-4">
                <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                    <a href="{{ route("backend.$module_name.show", $$module_name_singular->id) }}" class="btn btn-primary btn-sm ml-1" data-toggle="tooltip" title="Show Details"><i class="fas fa-tv"></i> Show</a>
                </div>
            </div>
            <!--/.col-->
        </div>
        <!--/.row-->

        <hr>

        <div class="row mt-4">
            <div class="col">

                
                <form action="{{route('backend.contacts.update',$contact->id)}}" method="post">
                    @csrf
                    @method('PUT')

                 
                    <div class="form-group">
                        <div class="col-md-6">
                        <label for="phone">Phone<span class="text-danger">( * ) </span> </label>
                        <input type="text" name="phone" class="form-control"  value="{{$contact->phone}}" > 
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
                    <input type="text" name="address" class="form-control" value="{{$contact->address}}" > 
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
                        <input type="text" name="email" class="form-control" value="{{$contact->email}}" > 
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
                            <input type="text" name="facebook" class="form-control" placeholder="https://www.facebook.com/pagename" value="{{$contact->facebook}}" > 
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
                                    <input type="text" name="viber" class="form-control" placeholder="+977-9841123456" value="{{$contact->viber}}" > 
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
                                        <input type="text" name="instagram" class="form-control" placeholder="https://www.instagram.com/pushpakamal/" value="{{$contact->instagram}}" > 
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
                                            <input type="text" name="youtube" class="form-control" placeholder="https://www.youtube.com/channel/characters" value="{{$contact->youtube}}" > 
                                            </div>
                                            <div class="col-md-6">
                                                @error('youtube')
                                                <div class="alert alert-danger">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                               </div>
                        
                                            </div>
                                             
                                            

                   

                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Update </button>
                            </div>
                        </div>
                   
               

                
                  <div class="col-8">
                        <div class="float-right">
                            @can('delete_'.$module_name)
                            <a href="{{ route("backend.$module_name.destroy",$contact->id) }}" class="btn btn-danger" data-method="DELETE" data-token="{{csrf_token()}}" data-toggle="tooltip" title="{{__('labels.backend.delete')}}"><i class="fas fa-trash-alt"></i></a>
                            @endcan
                            <a href="{{ route("backend.$module_name.index") }}" class="btn btn-warning" data-toggle="tooltip" title="{{__('labels.backend.cancel')}}"><i class="fas fa-reply"></i> Cancel</a>
                        </div>
                    </div>
                    
                </div>
                </form>

            

            </div>
        </div>
    </div>

    <div class="card-footer">
        <div class="row">
            <div class="col">
                <small class="float-right text-muted">
                    Updated: {{$$module_name_singular->updated_at->diffForHumans()}},
                    Created at: {{$$module_name_singular->created_at->isoFormat('LLLL')}}
                </small>
            </div>
        </div>
    </div>
</div>

@stop
