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
                        @lang("Properties Management Dashboard", ['module_name'=>Str::title($module_name)])
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
            @if ($slider->property_status == 'Sold Out')
                <div class="alert alert-danger">
                    <h4> {{ $slider->property_status }} </h4>
                </div>
            @else
                <div class="alert alert-success">
                    <h4> {{ $slider->property_status }}</h4>
                </div>
            @endif
            <a href="{{ asset('/uploads/slider/' . $slider->image) }}" target="_blank"> <img class="card-img-top pb-3"
                    src="{{ asset('uploads/slider/' . $slider->image) }}" style="height: 300px; width:300px"
                    alt="Card image cap"></a>
            <hr>

            <div class="row">
                <div class="col-md-12">
                    <h4 class="ml-3"><span class="text-muted"> Property Images</span> </h4>
                </div>
            </div>
            <div class="row">
                @foreach ($slider->galleries as $gallery)
                    <div class="col-md-3 mb-4">
                        <div class="gallerys">
                            <a href="{{ $gallery->original }}"><img src="{{ $gallery->thumbnail }}"
                                    class="w-100 pt-1"></a>
                        </div>
                    </div>
                @endforeach
            </div>
            <hr>

            <h4 class="ml-3"><span class="text-muted"> Details</span> </h4>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Land Area:&nbsp {{ $slider->land_area }}</li>
                <li class="list-group-item">Price:&nbsp {{ $slider->price }}
                    @if($slider->negotiable_status=="yes")<span class="text-muted">(Negotiable)</span>@endif
                </li>
                <li class="list-group-item">Address:&nbsp{{ $slider->address }}</li>
                <li class="list-group-item">Code:&nbsp {{ $slider->code }}</li>
                <li class="list-group-item">Type:&nbsp {{ $slider->property_type }}</li>
                <li class="list-group-item">Contact:&nbsp <i class="fas fa-phone-alt"></i>&nbsp
                    {{ $slider->phone }}</li>

            </ul>
            <hr>
            <div class="row ml-2">

                <div class="col-md-2">
                    <i class="fas fa-lg fa-building"></i> <span class="ml-2">{{ $slider->floors }}</span>

                </div>

                <div class="col-md-2">
                    <i class="fas fa-lg fa-bed"></i> <span class="ml-2">{{ $slider->bedrooms }}</span>

                </div>

                <div class="col-md-2">
                    <i class="fas fa-lg fa-utensils"></i> <span class="ml-2">{{ $slider->kitchens }}</span>

                </div>

                <div class="col-md-2">
                    <i class="fas fa-lg fa-couch"></i> <span class="ml-2">{{ $slider->living_rooms }}</span>
                </div>

                <div class="col-md-2">
                    <i class="fas fa-lg fa-bath"></i> <span class="ml-2">{{ $slider->bathrooms }}</span>
                </div>




            </div>
            <hr>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                          {{$slider->property_description}}
                        </div>
                      </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-12">
                    <h4 class="ml-2"><span class="text-muted"> Property Details</span> </h4>
                </div>
            </div>

            <div class="row ml-1">

                <div class="col-md-4">
                    <h5><u>Area & Other Details</u></h5>
                    <p>Land Area: &nbsp{{ $slider->land_area }} </p>
                    <p>Face Toward: &nbsp{{ $slider->face_towards }} </p>

                </div>

                <div class="col-md-4">
                    <h5><u>Accessibility</u> </h5>
                    <p>Location: &nbsp{{ $slider->address }} </p>
                    <p>Main Road Distance: &nbsp{{ $slider->main_road_distance }} </p>
                    <p>Road Description: &nbsp{{ $slider->road_description }}</p>

                </div>

                @isset($slider->floors)
                    <div class="col-md-4">
                        <h5><u>Room & Floor Details</u> </h5>
                        <p>Floors: &nbsp{{ $slider->floors }} </p>
                        <p>Bedrooms: &nbsp{{ $slider->bedrooms }} </p>
                        <p>Kitchens: &nbsp{{ $slider->kitchen }}</p>
                        <p>Living Rooms: &nbsp{{ $slider->living_rooms }} </p>
                        <p>Bathrooms: &nbsp{{ $slider->bathrooms }} </p>
                    </div>
                @endisset



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

@push('after-scripts')


    <script>
        $(document).ready(function() {


            $('.gallerys').magnificPopup({

                type: 'image',
                delegate: 'a',
                gallery: {
                    enabled: true
                }
            })

        });

    </script>
@endpush
