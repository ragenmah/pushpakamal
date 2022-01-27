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
                
                <form action="{{route("backend.notices.store")}}" method="post">
                    @csrf
                    
                    <div class="form-group">
                    <div class="col-md-6 d-flex flex-column">
                     <label for="title">Title </label>
                     <input type="text" name="title" id="title" class="form_control" value="{{old('title')}}">
                    </div>
                    <div class="col-md-12">
                     @error('title')
                     <div class="alert alert-danger">
                         {{$message}}
                     </div>
                     @enderror
                    </div>
                    </div>

                    <div class="form-group">
                    <div class="col-md-12">
                   <label for="body">Body </label>
                    <textarea name="body" id="body" class="form-control">{{old('body')}} </textarea>
                
                    </div>

                    <div class="col-md-12">
                        @error('body')
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
@push ('after-scripts')

<script type="text/javascript" src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>

<script type="text/javascript">

CKEDITOR.replace('body', {filebrowserImageBrowseUrl: '/file-manager/ckeditor', language:'{{App::getLocale()}}', defaultLanguage: 'en'});

document.addEventListener("DOMContentLoaded", function() {

  document.getElementById('button-image').addEventListener('click', (event) => {
    event.preventDefault();

    window.open('/file-manager/fm-button', 'fm', 'width=800,height=600');
  });
});


</script>
@endpush
