<aside class="aa-properties-sidebar">
    <!-- Start Single properties sidebar -->
    <div class="aa-properties-single-sidebar">
      <h3>Properties Search</h3>
      <form action="/search">
        <div class="aa-single-advance-search">
          <input type="text" name="keyword" autocomplete="off" placeholder="Enter address, town or property ID">
        </div>
        <div class="aa-single-advance-search">
          <select name ="property_location">
           <option selected="" value="0">Select Location</option>
            @foreach ($district as $row )
                <option value="{{$row['name']}}">{{$row['name']}}</option>
            @endforeach
          </select>
        </div>
        <div class="aa-single-advance-search">
          <select id="" name="">
            <option selected="" value="0">Type</option>
            <?php       
            $propertyType = \App\Models\PropertyType::where('deleted_at',null)->orderBy('property_type')->get();
            foreach($propertyType as $type) {
                ?>
                <option value="{{$type->property_type}}">{{$type->property_type}}</option>
            <?php
                }
          ?>
          </select>
        </div>
        <div class="aa-single-filter-search" style="display: none">
          <span>AREA (SQ)</span>
          <span>FROM</span>
          <span id="skip-value-lower" class="example-val">30.00</span>
          <span>TO</span>
          <span id="skip-value-upper" class="example-val">100.00</span>
          <div id="aa-sqrfeet-range" class="noUi-target noUi-ltr noUi-horizontal noUi-background">
          </div>                  
        </div>
        <div class="aa-single-filter-search">
          <span>PRICE (RS.) FROM</span>
          <span id="skip-value-lower2" class="example-val">10.00</span>
          <span>TO</span>
          <span id="skip-value-upper2" class="example-val">100.00</span>
          <div id="aa-price-range" class="noUi-target noUi-ltr noUi-horizontal noUi-background">
          </div>     
                {{-- price input --}}
            <input id="price1" name="priceStart" type="hidden">
            <input id="price2" name="priceEnd" type="hidden"> 
        </div>
        <div class="aa-single-advance-search">
          <input type="submit" value="Search" class="aa-search-btn">
        </div>
      </form>
    </div> 
    <!-- Start Single properties sidebar -->
    <div class="aa-properties-single-sidebar">
      <h3>@if(empty($status))
         Popular  
        @elseif ($status=="Popular")   
        Recent
        @else Popular
        @endif
        Properties</h3>
      @foreach ($recentproperty as $row )
      <div class="media">
        <div class="media-left">
          <a href="/property/{{$row->id}}">
            <img class="media-object" src="{{asset('uploads/slider').'/'.$row->image}}" alt="img">
          </a>
        </div>
        <div class="media-body">
          {{-- <i class="fas fa fa-map-marker-alt"></i> --}}
          <h4 class="media-heading "><a href="/property/{{$row->id}}">{{$row->address}}</a></h4>
          <div class="aa-properties-code2">
            <i class="far fa-address-card"></i></i> Code: {{$row->code}}
          </div>
          <p class="aa-properties-code2 ellipsis" ><i class="fas fa-map"></i> Area:{{ $row->land_area }}</p>       
          <?php 
                 //regex price
                $price = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $row->price);
            ?>         
           <span class="aa-price" style="
           color: #042e77; 
           display: flex;
           justify-content: start;
           align-items: flex-start;
           align-content: start">Rs.{{$price}} 
             @if($row->negotiable_status=="yes")<span style="
             font-size:1.1rem;">(Negotiable)</span>@endif</span>
        </div>              
      </div>
      @endforeach
    </div>
  </aside>