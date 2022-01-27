@extends('frontend.layouts.new')

@section('content')

    <!-- Start Proerty header  -->
    {{-- <section id="aa-property-header">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-property-header-inner">
            <h2>Search Result for "{{$word}}"</h2>
            <ol class="breadcrumb">
            <li><a href="/">HOME</a></li>            
            <li class="active">Search</li>
          </ol>
          </div>
        </div>
      </div>
    </div>
  </section> --}}
    <!-- End Proerty header  -->

    <!-- Start Properties  -->
    <section id="aa-properties">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="aa-properties-content">
                        <div class="aa-properties-content-body">
                            {{-- <div style="display: flex;flex-direction: row;justify-content: space-between;align-items: start;"> --}}
                            <div class="display-flex">
                                <h2 class="default-heading">Search Result for "{{ $search['keyword'] }}"</h2>
                                <div id="sorting">
                                    {{-- <span class="text-muted">Sort by</span> --}}
                                    <select name="sort" class="dropdown-select" id="sortBy">
                                        <option value="sortBy"><b>SORT BY</b></option>
                                        <option value="latest"><b>LATEST</b></option>
                                        <option value="oldest"><b>OLDEST</b></option>
                                        <option value="highprice"><b>HIGH PRICE</b></option>
                                        <option value="lowprice"><b>LOW PRICE</b></option>
                                    </select>
                                </div>
                            </div>
                            {{-- <ul class="aa-properties-nav"> --}}
                            <div style="display: none" class="sortForClass" value="Search"></div>    
                            <div class="row sort-data">
                                @forelse ($dataSearched as $row )
                                    {{-- <li> --}}
                                    <div class="col-md-4">
                                        <article class="aa-properties-item">
                                            <a href="/property/{{ $row->id }}" class="aa-properties-item-img">
                                                <img src="{{ asset('uploads/slider') . '/' . $row->image }}" alt="img"
                                                    style="width: 100%; height:200px;">
                                            </a>
                                           
                                            @if ($row->property_status === "For Rent")
                                            <div class="aa-tag for-rent" value="For Rent">For Rent</div>
                                            @else
                                            <div class="aa-tag for-sale" value="For Sale">For Sale</div>
                                            @endif
                                            <div class="aa-properties-item-content">
                                                <div class="aa-properties-code">
                                                    <a href="/property/{{ $row->id }}">
                                                        <h4><i class="fas fa-map-marker-alt"></i>&nbsp;{{ $row->address }}
                                                        </h4>
                                                    </a>
                                                </div>
                                                <div class="aa-properties-info ">
                                             
                                                    <span><i class="fa fa-building"></i>
                                                        @if ($row->floors != null)
                                                           &nbsp;{{ $row->floors }} 
                                                        @endif
                                                      </span>
                                                        <span><i class="fa fa-bed"></i>
                                                        @if ($row->bedrooms != null)
                                                           &nbsp; {{ $row->bedrooms+ $row->living_rooms }}  
                                                        @endif
                                                      </span>
                                                        <span><i class="fa fa-utensils"></i>
                                                        @if ($row->kitchens != null)
                                                            &nbsp; {{ $row->kitchens }}  
                                                        @endif
                                                      </span>
                                                        <span><i class="fa fa-bath"></i>
                                                        @if ($row->bathrooms != null)
                                                            &nbsp;{{ $row->bathrooms }} 
                                                        @endif
                                                      </span>                                                              
                                                </div>
                                                

                                                <div class="aa-properties-about">
                                                    {{-- <div><i class="far fa-address-card"></i></i> Code: {{ $row->code }}</div> --}}
                                                    <div style=" display: flex;
                                                    justify-content: space-between;
                                                    align-items: flex-start;">
                                                    @if ($row->land_area != null)
                                                    <div><i class="fas fa-map"></i> Area:{{ $row->land_area }}</div>
                                                    @endif
                                                    <span class="badge">{{ $row->code }}</span>
                                                    </div>
                                                    <?php //regex price
                                                    $price = preg_replace('/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i', "$1,", $row->price);
                                                    ?>
                                                    <div class="price-detail">
                                                        <span class="aa-price">
                                                            Rs.{{ $price }}
                                                            @if($row->negotiable_status=="yes")<span>(Negotiable)</span>@endif
                                                        </span>
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    {{-- </li> --}}
                                @empty
                                    <span class="text-center text-danger display-3">No Result</span>
                                @endforelse
                            </div>
                            {{-- <center><span>{{$dataSearched->links()}}</span></center> --}}
                            {{-- </ul> --}}
                        </div>
                        <!-- Start properties content bottom -->
                        <div class="aa-properties-content-bottom">
                            <nav>
                                {{ $dataSearched->appends(Request::all())->links() }}
                            </nav>
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
    <!-- Custom js -->
    {{-- <script src="{{ asset('js/frontend/new/custom.js')}}"></script> --}}
@endpush
