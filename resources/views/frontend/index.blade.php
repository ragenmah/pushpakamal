@extends('frontend.layouts.new')

@section('content')


    @include('frontend.includes.new.landingpage')
    @include('frontend.notices.notice')

    <div class="container-fluid">
        <section class="aa-premium-property">
            <div class="aa-title">
                <h2>Available Listings</h2>
                <span></span>
            </div>
        </section>
    </div>
  @if(!empty($premiumList))
    <div class="container-fluid ">
        <div id="mixedSlider">
            <div class="MS-content">
                @foreach ($premiumList as $row)
                    <div class="item">
                        <article class="aa-properties-item">
                            <a href="/property/{{ $row->id }}" class="aa-properties-item-img">
                                <img class="img-size owl-lazy" src="{{ asset('uploads/slider') . '/' . $row->image }}"
                                    alt="img" style="width: 100%; height:200px;">
                            </a>
                           
                            @if ($row->property_status === 'For Rent')
                                <div class="aa-tag for-rent">
                                    For Rent
                                </div>
                            @else
                                <div class="aa-tag for-sale">
                                    For Sale
                                </div>
                            @endif
                            <div class="aa-listing-tag for-golden">
                                Premium
                            </div>

                            <div class="aa-properties-item-content" {{-- style="background-color: #fff;" --}}>
                                <div class="aa-properties-code">
                                    <a href="/property/{{ $row->id }}">
                                        <h4><i class="fas fa-map-marker-alt"></i>&nbsp;{{ $row->address }}</h4>
                                    </a>
                                </div>
                                <div class="aa-properties-info ">
                                    <span><i class="fa fa-building"></i>
                                    @if ($row->floors != null)
                                    &nbsp; {{ $row->floors }} 
                                    @endif
                                </span>
                                <span><i class="fa fa-bed"></i>
                                    @if ($row->bedrooms != null)
                                        &nbsp; {{ $row->bedrooms + $row->living_rooms }}
                                        
                                    @endif
                                </span>
                                <div><i class="fas fa-map"></i> 
                                    @if ($row->land_area != null)
                                        Area:{{ $row->land_area }}
                                    @endif
                                </div>
                                    {{-- @if ($row->kitchens != null)
                                    <span><i class="fa fa-utensils"></i>&nbsp; {{ $row->kitchens }}  </span>
                                @endif
                                @if ($row->bathrooms != null)
                                    <span><i class="fa fa-bath"></i>&nbsp;{{ $row->bathrooms }}  </span>
                                @endif --}}
                                    {{-- @if ($row->living_rooms != null)
                                    <span><i class="fa fa-couch"></i>&nbsp;{{ $row->living_rooms }}  </span>
                                @endif --}}
                                </div>

                                <div class="aa-properties-about">

                                    <?php //regex price
                                    $price = preg_replace('/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i', "$1,", $row->price);
                                    ?>
                                    <div class="price-detail">
                                        <span class="aa-price">
                                            Rs.{{ $price }}
                                            @if($row->negotiable_status=="yes")<span>(Negotiable)</span>@endif
                                        </span>
                                        <span class="badge">{{ $row->code }}</span>
                                    </div>
                                </div>

                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
            <div class="MS-controls">
                <button class="MS-left">
                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                </button>
                <button class="MS-right">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                </button>
            </div>
        </div>
    </div>
    @else
    <center> No list available</center>
    @endif


    <!--Property -->
    <section id="aa-latest-property">
        <div class="container">
            <div class="aa-latest-property-area">
                <div class="aa-title">
                    <h2>Properties</h2>
                    <span></span>
                    {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit ea nobis quae vero voluptatibus.
                    </p> --}}
                </div>
                <div class="aa-latest-properties-content">
                    <div class="row">
                        @foreach ($data as $row)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                <article class="aa-properties-item">
                                    <a href="/property/{{ $row->id }}" class="aa-properties-item-img">
                                        <img class="img-size" src="{{ asset('uploads/slider') . '/' . $row->image }}"
                                            alt="img" style="width: 100%; height:200px;">
                                    </a>
                                    @if ($row->property_status === 'For Rent')
                                    <div class="aa-tag for-rent">
                                        For Rent
                                    </div>
                                    @else
                                        <div class="aa-tag for-sale">
                                            For Sale
                                        </div>
                                    @endif
                                    <div class="aa-properties-item-content">
                                        <div class="aa-properties-code">
                                            <a href="/property/{{ $row->id }}">
                                                <h4><i class="fas fa-map-marker-alt"></i>&nbsp;{{ $row->address }}</h4>
                                            </a>
                                        </div>


                                        <div class="aa-properties-info ">
                                            @if ($row->floors != null)
                                                <span><i class="fa fa-building"></i>&nbsp;{{ $row->floors }} </span>
                                            @endif
                                            @if ($row->bedrooms != null)
                                                <span><i class="fa fa-bed"></i>&nbsp;
                                                    {{ $row->bedrooms + $row->living_rooms }} </span>
                                            @endif
                                            @if ($row->land_area != null)
                                                <div><i class="fas fa-map"></i> Area:{{ $row->land_area }}</div>
                                            @endif
                                            {{-- @if ($row->kitchens != null)
                                                <span><i class="fa fa-utensils"></i>&nbsp; {{ $row->kitchens }}  </span>
                                            @endif
                                            @if ($row->bathrooms != null)
                                                <span><i class="fa fa-bath"></i>&nbsp;{{ $row->bathrooms }}  </span>
                                            @endif --}}
                                            {{-- @if ($row->living_rooms != null)
                                                <span><i class="fa fa-couch"></i>&nbsp;{{ $row->living_rooms }}  </span>
                                            @endif --}}
                                        </div>

                                        <div class="aa-properties-about">

                                            <?php //regex price
                                            $price = preg_replace('/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i', "$1,", $row->price);
                                            ?>
                                            <div class="price-detail">
                                                <span class="aa-price">
                                                    Rs.{{ $price }}
                                                    @if($row->negotiable_status=="yes")<span>(Negotiable)</span>@endif
                                                </span>
                                                <div class="badge">{{ $row->code }}</div>
                                            </div>
                                          
                                        </div>

                                    </div>
                                </article>
                            </div>
                        @endforeach
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <article class="aa-properties-item">
                                <center><img src="{{ asset('img/services/athome.svg') }}" alt="img"
                                        style="width: 120px; height:160px;">
                                    <div class="aa-properties-item-content">
                                        <div class="aa-properties-code">
                                            <h4>View all properties here.</h4>
                                        </div>

                                        <div class="aa-properties-about">
                                            <a href="/properties" class="btn-show-more" style="width:150px;">Show more</a>
                                        </div>
                                </center>



                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- / property -->

    <!-- Service section -->
    <section id="aa-service">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-service-area">
                        <div class="aa-title">
                            <h2>Our Services</h2>
                            <span></span>

                        </div>
                        <!-- service content -->
                        <div class="aa-service-content">
                            <div class="row ">
                                <div class="col-md-4">
                                    <div class="aa-single-service">
                                        <div class="aa-service-icon">
                                            <span> <img src="{{ asset('img/services/buyhouse.svg') }}" alt="sale property"
                                                    width="120px" height="120px"></span>

                                        </div>
                                        <div class="aa-single-service-content">
                                            <h4><a href="/sale">Property buy</a></h4>
                                            <p>We have properties that are on sell. </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="aa-single-service">
                                        <div class="aa-service-icon">
                                            <span> <img src="{{ asset('img/services/housesearching.svg') }}"
                                                    alt="housesearch" width="120px" height="120px"></span>
                                        </div>
                                        <div class="aa-single-service-content">
                                            <h4><a href="/rent">Property Rent</a></h4>
                                            <p>We provide best properties on rent.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="aa-single-service">
                                        <div class="aa-service-icon">
                                            <span> <img src="{{ asset('img/services/addfile.svg') }}" alt="add property"
                                                    width="120px" height="120px"> </span>
                                        </div>
                                        <div class="aa-single-service-content">
                                            <h4><a href="/pricing">Add Property</a></h4>
                                            <p>Add your listing in pushpakamal.</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Service section -->

    <!-- Popular property -->
    <section id="aa-latest-property">
        <div class="container">
            <div class="aa-latest-property-area">
                <div class="aa-title">
                    <h2>Popular Properties</h2>
                    <span></span>
                    {{-- <p>We have the latest properties
                    </p> --}}
                </div>
                <div class="aa-latest-properties-content">
                    <div class="row">
                        <?php $dataPopular = \App\Models\Slider::where('visit', '>=', 5)->orderBy('visit', 'DESC')
                            ->take(7)
                            ->get(); ?>
                        @foreach ($dataPopular as $row)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                <article class="aa-properties-item">
                                    <a href="/property/{{ $row->id }}" class="aa-properties-item-img">
                                        <img src="{{ asset('uploads/slider') . '/' . $row->image }}" alt="img"
                                            style="width: 100%; height:200px;">
                                    </a>
                                    @if ($row->property_status === 'For Rent')
                                    <div class="aa-tag for-rent">
                                        For Rent
                                    </div>
                                    @else
                                        <div class="aa-tag for-sale">
                                            For Sale
                                        </div>
                                    @endif
                                    <div class="aa-properties-item-content">
                                        <div class="aa-properties-code">
                                            <a href="/property/{{ $row->id }}">
                                                <h4><i class="fas fa-map-marker-alt"></i>&nbsp;{{ $row->address }}</h4>
                                            </a>
                                        </div>

                                        <div class="aa-properties-info ">
                                            @if ($row->floors != null)
                                                <span><i class="fa fa-building"></i>&nbsp;{{ $row->floors }} </span>
                                            @endif
                                            @if ($row->bedrooms != null)
                                                <span><i class="fa fa-bed"></i>&nbsp;
                                                    {{ $row->bedrooms + $row->living_rooms }} </span>
                                            @endif
                                            @if ($row->land_area != null)
                                                <div><i class="fas fa-map"></i> Area:{{ $row->land_area }}</div>
                                            @endif
                                            {{-- @if ($row->kitchens != null)
                                                <span><i class="fa fa-utensils"></i>&nbsp; {{ $row->kitchens }}  </span>
                                            @endif
                                            @if ($row->bathrooms != null)
                                                <span><i class="fa fa-bath"></i>&nbsp;{{ $row->bathrooms }}  </span>
                                            @endif --}}
                                        </div>

                                        <div class="aa-properties-about">
                                            {{-- <div><i class="far fa-address-card"></i></i> Code: {{ $row->code }}</div> --}}

                                            <?php //regex price
                                            $price = preg_replace('/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i', "$1,", $row->price);
                                            ?>
                                            <div class="price-detail">
                                                <span class="aa-price">
                                                    Rs.{{ $price }}
                                                    @if($row->negotiable_status=="yes")<span>(Negotiable)</span>@endif
                                                </span>
                                                <span class="badge">{{ $row->code }}</span>
                                            </div>
                                        </div>

                                    </div>
                                </article>
                            </div>
                        @endforeach
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <article class="aa-properties-item">
                                <center><img src="{{ asset('img/services/athome.svg') }}" alt="img"
                                        style="width: 120px; height:160px;">
                                    <div class="aa-properties-item-content">
                                        <div class="aa-properties-code">
                                            <h4>View all popular properties here.</h4>
                                        </div>

                                        <div class="aa-properties-about">
                                            <a href="/popular" class="btn-show-more">Show more</a>
                                        </div>
                                </center>


                        </div>
                        </article>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- / Popular property -->

    <!-- Promo Banner Section -->
    <section id="aa-promo-banner" style="display: none;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-promo-banner-area">
                        <h3>Find Your Best Property</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, ex illum corporis quibusdam
                            numquam quisquam optio explicabo. Officiis odit quia odio dignissimos eius repellat id!</p>
                        <a href="#" class="aa-view-btn">View Details</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Promo Banner Section -->

    <!-- Recent property -->
    <section id="aa-latest-property">
        <div class="container">
            <div class="aa-latest-property-area">
                <div class="aa-title">
                    <h2>Recent Properties</h2>
                    <span></span>
                    {{-- <p>Check out our recent properties
                    </p> --}}
                </div>
                <div class="aa-latest-properties-content">
                    <div class="row">
                        <?php $dataRecent = \App\Models\Slider::where('deleted_at', null)
                            ->orderBy('created_at', 'DESC')
                            ->take(7)
                            ->get(); ?>
                        @foreach ($dataRecent as $row)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                <article class="aa-properties-item">
                                    <a href="/property/{{ $row->id }}" class="aa-properties-item-img">
                                        <img src="{{ asset('uploads/slider') . '/' . $row->image }}" alt="img"
                                            style="width: 100%; height:200px;">
                                    </a>
                                    @if ($row->property_status === 'For Rent')
                                    <div class="aa-tag for-rent">
                                        For Rent
                                    </div>
                                    @else
                                        <div class="aa-tag for-sale">
                                            For Sale
                                        </div>
                                    @endif
                                    <div class="aa-properties-item-content">
                                        <div class="aa-properties-code">
                                            <a href="/property/{{ $row->id }}">
                                                <h4><i class="fas fa-map-marker-alt"></i>&nbsp;{{ $row->address }}</h4>
                                            </a>
                                        </div>


                                        <div class="aa-properties-info ">
                                            @if ($row->floors != null)
                                                <span><i class="fa fa-building"></i>&nbsp;{{ $row->floors }} </span>
                                            @endif
                                            @if ($row->bedrooms != null)
                                                <span><i class="fa fa-bed"></i>&nbsp;
                                                    {{ $row->bedrooms + $row->living_rooms }} </span>
                                            @endif
                                            @if ($row->land_area != null)
                                                <div><i class="fas fa-map"></i> Area:{{ $row->land_area }}</div>
                                            @endif
                                            {{-- @if ($row->kitchens != null)
                                                <span><i class="fa fa-utensils"></i>&nbsp; {{ $row->kitchens }}  </span>
                                            @endif
                                            @if ($row->bathrooms != null)
                                                <span><i class="fa fa-bath"></i>&nbsp;{{ $row->bathrooms }}  </span>
                                            @endif --}}

                                        </div>

                                        <div class="aa-properties-about">
                                            {{-- <div><i class="far fa-address-card"></i></i> Code: {{ $row->code }}</div> --}}
                                            <?php //regex price
                                            $price = preg_replace('/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i', "$1,", $row->price);
                                            ?>
                                            <div class="price-detail">
                                                <span class="aa-price">
                                                    Rs.{{ $price }}
                                                    @if($row->negotiable_status=="yes")<span>(Negotiable)</span>@endif
                                                </span>
                                                <span class="badge">{{ $row->code }}</span>
                                            </div>
                                        </div>

                                    </div>
                                </article>
                            </div>
                        @endforeach
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <article class="aa-properties-item">
                                <center>
                                    <img src="{{ asset('img/services/athome.svg') }}" alt="img"
                                        style="width: 120px; height:160px;" />
                                    <div class="aa-properties-item-content">
                                        <div class="aa-properties-code">
                                            <h4>View all recent properties here.</h4>
                                        </div>

                                        <div class="aa-properties-about">
                                            <a href="/recent" class="btn-show-more">Show more
                                            </a>
                                        </div>
                                    </div>
                                </center>

                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Recent property -->

    <!-- Client Testimonial -->
    <section id="aa-client-testimonial">
        <div class="container">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="aa-client-testimonial-area">
                            <div class="aa-title">
                                <h2>Client Reviews</h2>
                                <span></span>
                                <p></p>
                            </div>
                            <!-- testimonial content -->
                            <div class="aa-testimonial-content">
                                <!-- testimonial slider -->
                                <ul class="aa-testimonial-slider">
                                    <li>
                                        <div class="aa-testimonial-single">
                                            <div class="aa-testimonial-img">
                                                <img src="{{ asset('img/testimonials/1.jpg') }}" alt="testimonial img">
                                            </div>
                                            <div class="aa-testimonial-info">
                                                <p>if you wanted any new properties, this would be the best place in town.
                                                </p>
                                            </div>
                                            <div class="aa-testimonial-bio">
                                                <p>NIROJ PRASAIN</p>
                                                {{-- <span>Web Designer</span> --}}
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="aa-testimonial-single">
                                            <div class="aa-testimonial-img">
                                                <img src="{{ asset('img/testimonials/3.jpg') }}" alt="testimonial img">
                                            </div>
                                            <div class="aa-testimonial-info">
                                                <p>Best place to buy or sell properties. I will recommended others to visit
                                                    pushpakamal.</p>
                                            </div>
                                            <div class="aa-testimonial-bio">
                                                <p>SHISHIR POKHEREL</p>
                                                {{-- <span>Web Designer</span> --}}
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="aa-testimonial-single">
                                            <div class="aa-testimonial-img">
                                                <img src="{{ asset('img/testimonials/2.webp') }}" alt="testimonial img">
                                            </div>
                                            <div class="aa-testimonial-info">
                                                <p>Overall I was satisfied with the services that was provided to us.
                                                    Management was very helpful with solving our needs.</p>
                                            </div>
                                            <div class="aa-testimonial-bio">
                                                <p>MAMATA SHRESTHA</p>
                                                {{-- <span>Web Designer</span> --}}
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Client Testimonial -->

@endsection
@push('after-scripts')
    <!-- Custom js -->
    {{-- <script src="{{ asset('js/frontend/new/custom.js') }}"></script> --}}
    <script src="{{ asset('js/frontend/Carousel-Multislider/js/multislider.js') }}"></script>
    <script>
        $('#mixedSlider').multislider({
            continuous: false,
            slideAll: false,
            interval: 5000,
            duration: 500,
            hoverPause: true,
            pauseAbove: null,
            pauseBelow: null
        })
    </script>
@endpush
