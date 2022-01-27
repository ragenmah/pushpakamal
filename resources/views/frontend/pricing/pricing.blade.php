@extends('frontend.layouts.new')

@push('after-styles')
<link rel="stylesheet" href="{{ asset('css/pricing.css') }}">
@endpush
@section('content')

<!-- Start Proerty header  -->
<section id="aa-property-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                
                <div class="aa-property-header-inner">
                    <div class="aa-title">
                        <h2>Pricing</h2>
                        <span></span>
                  
                    </div>
                    {{-- <h2>Pricing</h2> --}}
                    {{-- <ol class="breadcrumb">
                        <li><a href="/">HOME</a></li>
                        <li class="active">PRICE</li>
                    </ol> --}}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Proerty header  -->
<section id="pricing" class="pricing-section">
    <div class="container " data-aos="fade-up">
        <div class="aa-properties-details">
            <div class="col-lg-3 col-md-6 col-xs-12 pricing-box" >
                <div class="aa-properties-info border-top-radius-20 border-bottom-radius-20" style="background-color: #cdf6f2; ">
                    <div class="header border-top-radius-20 " style="background-color: #07d5c0; ">
                        <div class="pricing-header-text">Normal Listing</div>
                    </div>

                    <div class="pricing-price-basic"><span>Rs. Free </span></div>
                    <div class="pricing-body">
                    <ul>
                        <li>High Quality image of property</li>
                        <li>Property Description</li>
                        <li>Facebook Sponsored Promotion for 15 days</li>
                        <li>Suitable For 4 months</li>
                    </ul>
                    </div>
                    <a href="#" class="btn btn-basic border-bottom-radius-20">Buy Now</a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-xs-12 pricing-box">
                <div class="aa-properties-info border-top-radius-20 border-bottom-radius-20" style="background-color: #d0edb2;">
                    <div class="header border-top-radius-20 " style="background-color: #65c600;">
                        <div  class="pricing-header-text">Premium Listing</div>
                    </div>
                    <div class="pricing-price-premium"><span> Rs. 5,000 </span></div>
                    <div class="pricing-body">
                    <ul>
                        <li>
                            High Quality image of property
                        </li>
                        <li>Property Description</li>
                        <li>Facebook Sponsored Promotion for 15 days</li>
                        <li>Suitable For 4 months</li>
                    </ul>
                    </div>
                    <a href="#" class="btn btn-premium border-bottom-radius-20 ">Buy Now</a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-xs-12 pricing-box">
                <div class="aa-properties-info border-top-radius-20 border-bottom-radius-20" style="background-color: #ffddba;">
                    <div class="header border-top-radius-20" style="background-color: #ff901c;">
                        <div class="pricing-header-text">Golden Listing</div>
                    </div>
                    <div class="pricing-price-golden"><span> Rs. 10,000</span></div>
                    <div class="pricing-body">
                    <ul>
                        <li>High Quality image of property</li>
                        <li>Property Description</li>
                        <li>Facebook Sponsored Promotion for 15 days</li>
                        <li>Suitable For 4 months</li>
                    </ul>
                    </div>
                    <a href="#" class="btn btn-golden border-bottom-radius-20">Buy Now</a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-xs-12 pricing-box">
                <div class="aa-properties-info border-top-radius-20 border-bottom-radius-20" style="background-color: #ffb2d4;">
                    <div class="header border-top-radius-20" style="background-color: #ff0071;">
                        <div class="pricing-header-text">Ultimate Listing</div>
                    </div>
                    <div class="pricing-price-ultimate"><span> Rs.15,000</span></div>
                    <div class="pricing-body">
                    <ul>
                        <li>High Quality image of property</li>
                        <li>Property Description</li>
                        <li>Facebook Sponsored Promotion for 15 days</li>
                        <li>Suitable For 4 months</li>
                    </ul>
                    </div>
                    <a href="#" class="btn btn-ultimate border-bottom-radius-20">Buy Now</a>
                </div>
            </div>

        </div>

    </div>

</section>
@endsection
