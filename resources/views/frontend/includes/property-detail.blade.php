@extends('frontend.layouts.new')

@push('after-styles')
@endpush

@section('content')
  <!-- Start Proerty header  -->

  <section id="aa-property-header" style="display: none;">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-property-header-inner">
            <h2>Properties Details</h2>
            <ol class="breadcrumb">
            <li><a href="/">HOME</a></li>            
            <li class="active">Property Details</li>
          </ol>
          </div>
        </div>
      </div>
    </div>
  </section> 
  <!-- End Proerty header  -->
  <!-- Start Properties  -->
  <section id="aa-properties">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="aa-properties-content">            
            <!-- Start properties content body -->
            <div class="aa-properties-details">
             <div class="aa-properties-details-img">
               <img src="{{asset('uploads/slider').'/'.$slider->image}}" alt="img">
               @foreach ($slider->galleries as $row)
                   <img src="{{$row->thumbnail}}" alt="img">
               @endforeach
             </div>
             <div class="aa-properties-info">
             
              <h2>
                {{$slider->address}} 
                <span class="badge badge-success">{{$slider->code}}</span>
                <div>
                  
                  @if ($slider->property_status === 'For Rent')
                  <div class="badge" style="background-color: #042e77;">
                      For Rent
                  </div>
              @else
                  <div class="badge "style="background-color: #3fc35f; ">
                      For Sale
                  </div>
              @endif
              <div class="badge" style="background-color: #03245e;">
                Posted : {{$postedat}} 
            </div>
                </div>
              </h2>
             
             
              <div class="display-flex-price" style="justify-content: start">
                              
                  <?php 
                       $price = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $slider->price);
                   ?>
                  <span class="aa-price" style="
                  color: #042e77; 
                  display: flex;
                  justify-content: start;
                  ">Rs.{{$price}} 
                    @if($slider->negotiable_status=="yes")<span style="
                    font-size:2rem; color:#104297;">(Negotiable)</span>@endif</span>
                  
                 <div class="row display-flex" style="color: #012970; padding-bottom:10px;" >
                  <div class="col-md-4" style="display:flex;justify-content:start;align-items: center;flex-direction:column">
                      
                    <i class="fa fa-building"></i><h5 class="">{{ $slider->floors }} Floors</h5>
  
                  </div>
  
                  <div class="col-md-4"style="display:flex;justify-content:start;align-items: center;flex-direction:column">
                     <i class="fa fa-bed"></i> <h5 class="">{{ $slider->bedrooms + $slider->living_rooms }} Rooms</h5>
                  </div>
  
                  <div class="col-md-4" style="display:flex;justify-content:start;align-items: center;flex-direction:column">
                   <i class="fa fa-utensils"></i>
                    
                     <h5 class=""> {{ $slider->kitchens }} Kitchens</h5>
                  </div>
{{--   
                  <div class="col-md-4">
                    <i class="fa fa-couch"></i><h5>Rooms</h5>
                      <p class="">{{ $slider->living_rooms }}</p>
                  </div> --}}
  
                  <div class="col-md-4" style="display:flex;justify-content:start;align-items: center;flex-direction:column">
                    <i class="fa fa-bath"></i>
                     
                       <h5 class="">{{ $slider->bathrooms }} Bathrooms</h5>
                  </div>
              </div>   
              </div>
                        
                           
              <div class="panel panel-info panel-info-style" >
                {{-- <div class="panel-heading">Overview</div> --}}
                <div class="panel-body">   
                  <div class="row">
                  <div class="col-md-12">
                      <h4 class="ml-2"><span class="text-muted"> Overview</span> </h4>
                      <hr class="hor-line">
                    </div>
                 
              </div>
  
              <div class="row ml-1">
  
                  <div class="col-md-4 property-detail-title">
                      <h5>Area & Other Details</h5>
                      <p><span>Property Id:</span> &nbsp;{{$slider->code}}</p>
                      <p><span>Land Area:</span> &nbsp;{{ $slider->land_area }} </p>
                      <p><span>Face Toward:</span> &nbsp;{{ $slider->face_towards }} </p>
  
                  </div>
  
                  <div class="col-md-4 property-detail-title">
                      <h5>Accessibility </h5>
                      <p><span>Location:</span>&nbsp{{ $slider->address }} </p>
                      <p><span>Main Road Distance:</span>&nbsp{{ $slider->main_road_distance }} </p>
                      <p><span>Road Description:</span>&nbsp{{ $slider->road_description }}</p>
  
                  </div>
  
                  @isset($slider->floors)
                      <div class="col-md-4 property-detail-title">
                          <h5>Room & Floor Details </h5>
                          <p><span>Floors:</span>&nbsp{{ $slider->floors }} </p>
                          <p><span>Bedrooms:</span>&nbsp{{ $slider->bedrooms }} </p>
                          <p><span>Kitchens:</span>&nbsp{{ $slider->kitchens }}</p>
                          <p><span>Living Rooms:</span>&nbsp{{ $slider->living_rooms }} </p>
                          <p><span>Bathrooms:</span>&nbsp{{ $slider->bathrooms }} </p>
                      </div>
                  @endisset
  
  
  
              </div></div>
              </div>
              <div class="panel panel-info panel-info-style" >
                {{-- <div class="panel-heading">Overview</div> --}}
                <div class="panel-body">
                  <div class="row">
                  <div class="col-md-12">
                      <h4 class="ml-2"><span class="text-muted"> Other Details</span> </h4>
                      <hr class="hor-line">
                    </div>
              </div>
  
              <div class="row ml-1">
  
                  <div class="col-md-4 property-detail-title">
                      <h5>Contact Details</h5>

                      <p><span>Contacts:</span>&nbsp <i class="fas fa-phone-alt"></i>&nbsp
                        {{ $slider->phone }}</p>
                      <p><span>Type:</span>&nbsp {{ $slider->property_type }} </p>
                    </div>             
              </div>
            </div>
              </div>
               

              <div class="panel panel-info panel-info-style" >
                {{-- <div class="panel-heading">Overview</div> --}}
                <div class="panel-body">
                  <div class="row">
                  <div class="col-md-12">
                      <h4 class="ml-2"><span class="text-muted"> Propery Features</span> </h4>
                      <hr class="hor-line">
                    </div>
              </div>
  
              <div class="row ml-1">
  
                  <div class="col-md-4 property-detail-title">
                      {{-- <h5><u>Propery Features</u></h5> --}}

                      <ul>
                        <li>{{$slider->bedrooms}} Bedrooms</li>
                        <li>{{$slider->living_rooms}} Living Rooms</li>
                        <li>{{ $slider->floors }} Floors</li>
                        <li>{{ $slider->bathrooms }} Bathrooms</li>
                        <li>{{ $slider->kitchens }} Kitchens</li>
                         {{-- <li>Air Condition</li>
                        <li>Belcony</li>
                        <li>Gym</li>
                        <li>Garden</li>
                        <li>CCTV</li>
                        <li>Children Play Ground</li>
                        <li>Comunity Center</li>
                        <li>Security System</li> --}}
                      </ul>
                    </div>             
              </div>
            </div>
              </div>
              
               </div>
             <!-- Properties social share -->
             <div class="aa-properties-social" style="display: none;">
               <ul>
                 <li>Share</li>
                 <li><a href="#"><i class="fab fa-lg fa-facebook"></i></a></li>
                 <li><a href="#"><i class="fab fa-lg fa-twitter"></i></a></li>
                 <li><a href="#"><i class="fab fa-lg fa-google-plus"></i></a></li>
                 <li><a href="#"><i class="fab fa-lg fa-pinterest"></i></a></li>
               </ul>
             </div>
            </div>           
          </div>
        </div>
        <!-- Start properties sidebar -->
        <div class="col-md-4">
          @include('frontend.includes.new.properties-side-bar')
        </div>
      </div>
    </div>
  </section>
  <!-- / Properties  -->
@endsection

@push('after-scripts')

@endpush
