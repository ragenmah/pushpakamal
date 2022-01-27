    <section id="hero" class="hero ">
        <div class="container">
            <div class="row landing">
                <div class="col-lg-9 landing-desc">
                    <h1>
                        Looking for the best property?
                    </h1>
                    <h2>
                        Buy, Sell or Rent Properties in here!
                    </h2>
                </div>
                <div class="hero-img">
                    <img src="{{ asset('img/services/best_place.svg') }}" class="img-fluid" alt="" />
                </div>
            </div>
          <!-- Advance Search -->
          <div id="aa-advance-search">
            <div class="container-fuild">
                <div class="aa-advance-search-area">
                    <div class="form">
                        <form action="/search" name="search-form">
                            <div class="aa-advance-search-top">
                                <div class="row ">
                                    <div class="col-lg-4">
                                        <div class="aa-single-advance-search">
                                            <input type="text" name="keyword" placeholder="Enter address, town or property ID"
                                                autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="aa-single-advance-search">
                                            <select name="property_location">
                                                <option value="Select Location" selected>Select Location</option>
                                                @foreach ($district as $row)
                                                    <option value="{{ $row['name'] }}">{{ $row['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="aa-single-advance-search">
                                            <select name="property_type" style="text-transform:capitalize;">
                                                <option value="Select Property Type" selected>Select Property Type</option>
                                                <?php
                                                $propertyType = \App\Models\PropertyType::where('deleted_at', null)
                                                ->orderBy('property_type')
                                                ->get();
                                                foreach ($propertyType as $type) { ?>
                                                <option  value="{{ $type->property_type }}">{{ $type->property_type }}</option>
                                                <?php }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="aa-single-advance-search">
                                            <input class="aa-search-btn" type="submit" value="Search">
                                            {{-- <button class="btn-show-more" type="submit">Show more</button>   --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="aa-advance-search-bottom">
                                <div class="row">
                                    <div class="col-md-12" style="display: none;">
                                        <div class="aa-single-filter-search">
                                            <span>AREA (SQ)</span>
                                            <span>FROM</span>
                                            <span id="skip-value-lower" class="example-val">30.00</span>
                                            <span>TO</span>
                                            <span id="skip-value-upper" class="example-val">100.00</span>
                                            <div id="aa-sqrfeet-range"
                                                class="noUi-target noUi-ltr noUi-horizontal noUi-background">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                       
                                        <div class="aa-single-filter-search">
                                            <span>PRICE (Rs.)</span>
                                            <span>FROM</span>
                                            <?php //regex price
                                            $price1 = preg_replace('/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i', "$1,", 100000); ?>
                                            <span id="skip-value-lower2" class="example-val">{{ $price1 }}</span>
                                            <span>TO</span>
                                           
                                            <?php //regex price
                                            $price1 = preg_replace('/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i', "$1,", 900000); ?>
                                            <span id="skip-value-upper2" class="example-val">{{ $price1 }}</span>
                                            <input id="price1" name="priceStart" type="hidden">
                                            <input id="price2" name="priceEnd" type="hidden">
                                            <div id="aa-price-range"
                                                class="noUi-target noUi-ltr noUi-horizontal noUi-background">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<!-- / Advance Search -->
        </div>

    </section>
  

