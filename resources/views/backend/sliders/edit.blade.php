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
                        <a href="{{ route("backend.$module_name.show", $$module_name_singular->id) }}"
                            class="btn btn-primary btn-sm ml-1" data-toggle="tooltip" title="Show Details"><i
                                class="fas fa-tv"></i> Show</a>
                    </div>
                </div>
                <!--/.col-->
            </div>
            <!--/.row-->

            <hr>

            <div class="row mt-4">
                <div class="col">
                    <form action="{{ route('backend.sliders.update', $slider->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group ">
                            <div class="col-md-6">
                                <label for="code">Code <span class="text-danger">( * ) </span></label>
                                <input type="text" name="code" id="code" class="form-control" value="{{ $slider->code }}"
                                    readonly>
                            </div>
                            <div class="col-md-12">
                                @error('code')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group d-flex justify-content-center">
                            <div class="col-md-4 d-flex flex-column">
                                <label for="image">Select Main Image </label>
                                <input type="file" name="image" onchange="readURL(this);">
                            </div>
                            <div class="col-md-8">
                                {{-- <h4>Selected Image</h4> --}}
                                <img id="previewImage" src="{{ asset('uploads/slider/' . $slider->image) }}"
                                    height="120px" width="120px" alt="your image">
                                @error('image')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="form-group d-flex justify-content-center">
                            <div class="col-md-4 d-flex flex-column">
                                <label for="gallery">Select Property Images </label>
                                <input type="file" name="gallery[]" accept="image/*" id="mulimage-photo-add" multiple>
                            </div>
                            <div class="col-md-8">
                                <div class="multiple-img-preview"></div>
                                @error('image')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <h6>Saved properties Images</h6>
                        <div class="row">

                            @foreach ($slider->galleries as $gallery)
                                <div class="col-md-3 mb-4">

                                    <div class="gallerys" style="position: relative;">
                                        @can('delete_' . $module_name)
                                            <a href="{{ route("backend.$module_name.delete", $gallery->id) }}"
                                                class="btn btn-danger" data-method="DELETE" data-token="{{ csrf_token() }}"
                                                data-toggle="tooltip" title="{{ __('labels.backend.delete') }}" style=" position: absolute;
                                                                                    top: 2px;
                                                                                    right: 2px;
                                                                                    z-index: 100;">x</a>
                                        @endcan
                                        <a href="{{ $gallery->original }}"><img src="{{ $gallery->thumbnail }}"
                                                class="w-100 pt-1"></a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <hr>
                         
                        <div class="form-group">
                            <label for="property_description">Property Description <span class="text-danger">( * ) </span></label>
                            <textarea class="form-control" name="property_description">{{$slider->property_description}}</textarea>

                            <div class="col-md-6">
                                @error('property_description')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <hr>


                        <div class="d-flex ">
                            <div class="w-100">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="land_area">Land Area <span class="text-danger">( * ) </span> </label>
                                        <input type="text" name="land_area" class="form-control" placeholder="0-5-0-0"
                                            value="{{ $slider->land_area }}">
                                    </div>
                                    <div class="col-md-12">
                                        @error('land_area')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="body">Price <span class="text-danger">( * ) </span></label>
                                        <input type="number" name="price" class="form-control"
                                            value="{{ $slider->price }}">
                                    </div>
                                    <div class="col-md-12">
                                        @error('price')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="body">Address <span class="text-danger">( * ) </span></label>
                                        <input type="text" name="address" class="form-control"
                                            value="{{ $slider->address }}">
                                    </div>
                                    <div class="col-md-12">
                                        @error('address')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="phone">Contact No. <span class="text-danger">( * ) </span></label>
                                        <input type="text" name="phone" class="form-control"
                                            value="{{ $slider->phone }}">
                                    </div>
                                    <div class="col-md-12">
                                        @error('phone')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12 d-flex flex-column">
                                        <label for="property_type"> Property Type</label>
                                        <select name="property_type" id="property_type" class="form-control">
                                            @foreach ($properties as $property)
                                                <option
                                                    {{ $property->property_type == $slider->property_type ? 'selected' : '' }}
                                                    value="{{ $property->property_type }}"
                                                    mytag="{{ $property->accomodation_status }}">
                                                    {{ $property->property_type }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        @error('property_type')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="w-100">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="face_towards">Face Towards </label>
                                        <input type="text" name="face_towards" class="form-control"
                                            value="{{ $slider->face_towards }}">
                                    </div>
                                    <div class="col-md-12">
                                        @error('face_towards')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="main_road_distance">Main road Distance </label>
                                        <input type="text" name="main_road_distance" class="form-control"
                                            value="{{ $slider->main_road_distance }}">
                                    </div>
                                    <div class="col-md-12">
                                        @error('main_road_distance')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="road_description">Road Description </label>
                                        <input type="text" name="road_description" class="form-control"
                                            value="{{ $slider->road_description }}">
                                    </div>
                                    <div class="col-md-12">
                                        @error('road_description')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12 d-flex flex-column">
                                        <label for="property_status"> Property Status</label>
                                        <select name="property_status" id="property_status" class="form-control">

                                            <option value="1"
                                                {{ $slider->property_status == 'For Sale' ? 'selected' : '' }}>
                                                For Sale
                                            </option>
                                            <option value="2"
                                                {{ $slider->property_status == 'For Rent' ? 'selected' : '' }}>
                                                For Rent
                                            </option>
                                            <option value="0"
                                                {{ $slider->property_status == 'Sold Out' ? 'selected' : '' }}>
                                                Sold Out
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-md-12">
                                        @error('property_status')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12 d-flex flex-column">
                                        <label for="negotiable_status"> Negotiable Status</label>
                                        <select name="negotiable_status" id="negotiable_status" class="form-control">
                                            <option value="">Select Status</option>
                                            <option value="yes"
                                                {{ $slider->negotiable_status == 'yes' ? 'selected' : '' }}>yes
                                            </option>
                                            <option value="no"
                                                {{ $slider->negotiable_status == 'no' ? 'selected' : '' }}>no
                                            </option>
                                        </select>

                                    </div>

                                    <div class="col-md-12">
                                        @error('negotiable_status')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div id="accomodation_details">
                            <h4 class="ml-3"><span class="text-muted">Room and Floor Details</span> </h4>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="floors">Floors </label>
                                    <input type="number" name="floors" class="form-control"
                                        value="{{ $slider->floors }}">
                                </div>
                                <div class="col-md-6">
                                    @error('floors')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="floors">Bedrooms </label>
                                    <input type="number" name="bedrooms" class="form-control"
                                        value="{{ $slider->bedrooms }}">
                                </div>
                                <div class="col-md-6">
                                    @error('bedrooms')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="floors">Kitchens </label>
                                    <input type="number" name="kitchens" class="form-control"
                                        value="{{ $slider->kitchens }}">
                                </div>
                                <div class="col-md-6">
                                    @error('kitchens')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="living_rooms">Living Rooms </label>
                                    <input type="number" name="living_rooms" class="form-control"
                                        value="{{ $slider->living_rooms }}">
                                </div>
                                <div class="col-md-6">
                                    @error('living_rooms')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="bathrooms">Bathrooms </label>
                                    <input type="number" name="bathrooms" class="form-control"
                                        value="{{ $slider->bathrooms }}">
                                </div>
                                <div class="col-md-6">
                                    @error('bathrooms')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
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
                                    @can('delete_' . $module_name)
                                        <a href="{{ route("backend.$module_name.destroy", $slider->id) }}"
                                            class="btn btn-danger" data-method="DELETE" data-token="{{ csrf_token() }}"
                                            data-toggle="tooltip" title="{{ __('labels.backend.delete') }}"><i
                                                class="fas fa-trash-alt"></i></a>
                                    @endcan
                                    <a href="{{ route("backend.$module_name.index") }}" class="btn btn-warning"
                                        data-toggle="tooltip" title="{{ __('labels.backend.cancel') }}"><i
                                            class="fas fa-reply"></i> Cancel</a>
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
                        Updated: {{ $$module_name_singular->updated_at->diffForHumans() }},
                        Created at: {{ $$module_name_singular->created_at->isoFormat('LLLL') }}
                    </small>
                </div>
            </div>
        </div>
    </div>
@stop
@push('after-scripts')

    <script>
        $(document).ready(function() {
            $("body").on('change', '#property_type', function(e) {
                var accomodation = $('option:selected', this).attr('mytag');
                if (accomodation == "yes") {
                    $('#accomodation_details').show();
                } else {
                    $("#accomodation_details input").each(function() {
                        $(this).val('');
                    });
                    $('#accomodation_details').hide();
                }
            });
            $("body").on('change', '#property_status', function(e) {
                var status_confirm = confirm("Are you sure, You want to perform this action?");
                return (status_confirm == true) ? true : false;
            });

        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#previewImage')
                        .attr('src', e.target.result)
                        .width(120)
                        .height(120);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(function() {
            // Multiple images preview in browser
            var imagesPreview = function(input, placeToInsertImagePreview) {

                if (input.files) {
                    var filesAmount = input.files.length;
                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            $($.parseHTML('<img height=120px width=120px style="margin:10px;">')).attr(
                                'src', event.target.result).appendTo(
                                placeToInsertImagePreview);
                        }
                        reader.readAsDataURL(input.files[i]);
                    }
                }

            };

            $('#mulimage-photo-add').on('change', function() {
                $(".multiple-img-preview").html("");
                imagesPreview(this, 'div.multiple-img-preview');
            });
        });
    </script>

@endpush
