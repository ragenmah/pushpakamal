@extends ('backend.layouts.app')

@section ('title', ucfirst($module_name) . ' ' . ucfirst($module_action))

@section('breadcrumbs')
<x-backend-breadcrumbs>
    <x-backend-breadcrumb-item type="active" icon='{{ $module_icon }}'>{{ $module_title }}</x-backend-breadcrumb-item>
</x-backend-breadcrumbs>
@stop

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
                <div class="float-right">
                    <a href="{{ route("backend.$module_name.index") }}" class="btn btn-secondary mt-1 btn-sm" data-toggle="tooltip" title="{{ ucwords($module_name) }} List"><i class="fas fa-list"></i> List</a>
                </div>
            </div>
            <!--/.col-->
        </div>
        <!--/.row-->

        <div class="row mt-4">
            <div class="col">
                <table id="datatable" class="table table-bordered table-hover table-responsive-sm">
                    <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                Image
                            </th>
                            <th>
                               Land Area
                            </th>
                            <th>
                                Price
                             </th>
                            <th>
                                Updated At
                            </th>
                            
                            <th class="text-right">
                                Action
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($$module_name as $module_name_singular)
                        <tr>
                            <td>
                                {{ $module_name_singular->id }}
                            </td>
                            <td>
                                <img class="img-thumbnail img-responsive"
                            src="{{asset('uploads/slider/'.$module_name_singular->image)}}" style="height: 50px; width:70px" alt="">
                            </td>
                            <td>
                                {{$module_name_singular->land_area}}
                            </td>
                            <td>
                                {{$module_name_singular->price}}
                            </td>
                            <td>
                                {{ $module_name_singular->updated_at->diffForHumans() }}
                            </td>
                            
                            <td class="text-right">
                                <a href="{{route("backend.$module_name.restore", $module_name_singular->id)}}" class="btn btn-warning btn-sm" data-method="PATCH" data-token="{{csrf_token()}}" data-toggle="tooltip" title="{{__('labels.backend.restore')}}"><i class='fas fa-undo'></i> {{__('labels.backend.restore')}}</a>
                               
                                    <form id="delete-form-{{ $module_name_singular->id }}"
                                        action="{{ route("backend.$module_name.remove", $module_name_singular->id) }}"
                                        style="display: none;" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="force_delete" value="1">
                                    </form>
                                   
                                    <button type="button" class="btn btn-danger btn-sm ml-2" onclick="if(confirm('Are you sure? You want to permanently delete this?')){
                                            event.preventDefault();
                                            document.getElementById('delete-form-{{ $module_name_singular->id }}').submit();
                                            }else {
                                            event.preventDefault();
                                            }">
                                        <i class="material-icons">delete</i></button>
                                      
                                
                              
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    Total {{ $$module_name->total() }} {{ ucwords($module_name) }}
                </div>
            </div>
            <div class="col-5">
                <div class="float-right">
                    {!! $$module_name->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@stop
