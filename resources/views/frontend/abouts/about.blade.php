@extends('frontend.layouts.new')

@section('title') {{app_name()}} @endsection

@section('content')
<section id="aa-property-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="aa-property-header-inner">
                    {{-- <h2>About Us</h2> --}}
                    <div class="aa-title">
                        <h2>About Us</h2>
                        <span></span>
                  
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section section-ld"  style="padding-bottom: 250px">
    <div class="container">
        @if ($abouts!=null)
        <div class="row">
            <div class="col-md-6">
             <h4 class="about-title">{{$abouts->title}}</h4>
             <p class="about-text"> {{$abouts->details}} </p>
            </div>

           <div class="col-md-6">
         <a href="{{ asset('/uploads/about/' . $abouts->image) }}" target="_blank"> <img 
                 src="{{ asset('uploads/about/' . $abouts->image) }}" style="height: 300px; width:100%;border-radius:10px;"
                 alt="About image"></a>
        
           </div>
        </div>
        
        @else
            <center><p>About us is not added</p></center>
        @endif
            

    </div>
</section>


@endsection