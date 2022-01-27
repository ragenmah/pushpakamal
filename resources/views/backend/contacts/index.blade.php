@extends('backend.layouts.app')

@section('title') {{ __($module_action) }} {{ $module_title }} @stop

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
                    <x-buttons.create route='{{ route("backend.$module_name.create") }}' title="{{__('Create')}} {{ ucwords(Str::singular($module_name)) }}"/>

                    <div class="btn-group" role="group" aria-label="Toolbar button groups">
                        <div class="btn-group" role="group">
                            <button id="btnGroupToolbar" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-cog"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupToolbar">
                                <a class="dropdown-item" href="{{route("backend.$module_name.trashed")}}">
                                    <i class="fas fa-eye-slash"></i> View trash
                                </a>
                            </div>
                        </div>
                    </div>
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
                                S.N.
                            </th>
                            <th>
                                Phone
                            </th>
                            <th>
                                Address
                            </th>
                           <th>
                              Email
                           </th>
                          
                           <th>
                            Update At
                        </th>
                            <th class="text-right">
                                Action
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                      @forelse($contacts as $key=>$contact)
                      <tr>
                          <td>{{$key+1}} </td>
                          <td>{{$contact->phone}} </td> 
                          <td>{{$contact->address}}</td>
                          <td>{{$contact->email}}</td>
                          <td>{{$contact->created_at}} </td>
                          <td class="text-right">
                            <a href='{{route("backend.$module_name.edit",$contact->id)}}' class='btn btn-sm btn-primary mt-1' data-toggle="tooltip" title="Edit {{ ucwords(Str::singular($module_name)) }}"><i class="fas fa-wrench"></i></a>
                            <a href='{{route("backend.$module_name.show",$contact->id)}}' class='btn btn-sm btn-success mt-1' data-toggle="tooltip" title="Show {{ ucwords(Str::singular($module_name)) }}"><i class="fas fa-tv"></i></a>
                        </td>
                      </tr>
                      @empty
                      <tr> <td colspan="6"><p align="center">{{"No Data Available"}}</p></td></tr>
                      
                      @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    Total {{ $contacts->total() }} {{ ucwords($module_name) }}
                </div>
            </div>
            <div class="col-5">
                <div class="float-right">
                    {!! $contacts->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@stop
