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

            <div class="row mt-4">
                <div class="col">
                    <form action="{{ route('backend.sliders.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group d-flex">
                            <div class="col-md-6">
                                <label for="body">Code <span class="text-danger">( * ) </span></label>
                                <input type="text" name="code" id="code" class="form-control" value="{{ old('code') }}"
                                    readonly>
                                <div class="col-md-6">
                                    @error('code')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6  mt-4">
                                <button type="button" id="regenerate" class="btn btn-success"><i
                                        class="fas fa-sync-alt"></i> Regenerate </button>
                            </div>
                        </div>

                        <div class="form-group d-flex justify-content-center">
                            <div class="col-md-4 d-flex flex-column">
                                <label for="image">Select Property Main Image </label>
                                <input type="file" name="image" onchange="readURL(this);">
                            </div>
                            <div class="col-md-8">
                                {{-- <h4>Selected Image</h4> --}}
                                <img id="previewImage">
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
                        <hr>
                        <div class="form-group">
                            <label for="property_description">Property Description <span class="text-danger">( * ) </span></label>
                            <textarea class="form-control" name="property_description"></textarea>

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
                            <div class="w-100" >
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="land_area">Land Area <span class="text-danger">( * ) </span> </label>
                                        <input type="text" name="land_area" class="form-control" placeholder="0-5-0-0"
                                            value="{{ old('land_area') }}">
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
                                            value="{{ old('price') }}">
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
                                            value="{{ old('address') }}">
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
                                        <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
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
                                        <label for="property_type"> Property Type <span class="text-danger">( * )
                                            </span></label>
                                        <select name="property_type" id="property_type" class="form-control">
                                            <option value="">Select Property Type </option>
                                            @foreach ($properties as $property)
                                                <option value="{{ $property->property_type }}"
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
                            <div class=" w-100">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="face_towards">Face Towards <span class="text-danger">( * )
                                            </span></label>
                                        <input type="text" name="face_towards" class="form-control"
                                            value="{{ old('face_towards') }}">
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
                                        <label for="main_road_distance">Main road Distance <span class="text-danger">( * )
                                            </span></label>
                                        <input type="text" name="main_road_distance" class="form-control"
                                            value="{{ old('main_road_distance') }}">
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
                                        <label for="road_description">Road Description <span class="text-danger">( * )
                                            </span></label>
                                        <input type="text" name="road_description" class="form-control"
                                            value="{{ old('road_description') }}">
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
                                    <div class="col-md-12">
                                        <label for="property_status">Property Status <span class="text-danger">( * )
                                            </span></label>
                                        <select name="property_status" id="property_status" class="form-control">
                                            <option value="1">For Sale </option>
                                            <option value="2">For Rent </option>
                                            <option value="0">Sold Out </option>
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
                                    <div class="col-md-12">
                                        <label for="negotiable_status">Negotiable Status <span class="text-danger">( * )
                                            </span></label>
                                        <select name="negotiable_status" id="negotiable_status" class="form-control">
                                            <option value="">Select Status</option>
                                            <option value="yes">yes </option>
                                            <option value="no"> no </option>
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
                                    <input type="number" name="floors" class="form-control" value="{{ old('floors') }}">
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
                                        value="{{ old('bedrooms') }}">
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
                                        value="{{ old('kitchens') }}">
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
                                        value="{{ old('living_rooms') }}">
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
                                        value="{{ old('bathrooms') }}">
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

@push('after-scripts')
    <script>
        $(document).ready(function() {
            $('#accomodation_details').hide();
            // var count=parseInt(<?php echo $row_count; ?>+1);
            // var random = Math.floor(Math.random()*90000) + 10000;
            // $("#code").val(val+""+random);
            //generate code on page load
            var val = "PKN";
            var uniqueId = (new Date().getTime() + '').substr(6, 7);

            $("#code").val(val + " " + uniqueId);

            //generate code on button click

            $('#regenerate').click(function() {
                var val = "PKN";
                var uniqueId = (new Date().getTime() + '').substr(6, 7);

                $("#code").val(val + " " + uniqueId);
            });

            $("body").on('change', '#property_type', function(e) {

                var accomodation = $('option:selected', this).attr('mytag');

                if (accomodation == "yes") {

                    $('#accomodation_details').show();
                } else {
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
